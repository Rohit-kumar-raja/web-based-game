<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestWinnerRank;
use App\Models\Matches;
use App\Models\Participated_user;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Exception;
use PhpParser\Node\Expr\Print_;

class MatchesController extends Controller
{

    // page of the show into the front of the admin panel 
    public  $page_name = 'Matches';
    public function index()
    {
        $data = Matches::orderByDesc('id')->get();
        return view('matches.index', ['data' => $data, 'page' => $this->page_name]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'teamoneimg' => 'max:2048',
            'teamtwoimg' => 'max:2048',
        ]);

        $id =   Matches::insertGetId($request->except('_token'));
        if ($request->file('teamoneimg') && $request->file('teamtwoimg')) {
            Matches::where('id', $id)->update([
                'teamoneimg' => $this->insert_image($request->file('teamoneimg'), 'matches'),
                'teamtwoimg' => $this->insert_image($request->file('teamtwoimg'), 'matches')
            ]);
        }
        return redirect()->back()->with(['store' => 'Data successfully Saved ']);
    }

    public function status($id)
    {
        $status = Matches::find($id);
        if ($status->status == 1) {
            Matches::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('status', 'Status Successfully Deactivated');
        } else {
            Matches::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('status1', 'Status Successfully Activated');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Matches::find($id);
        return view('matches.update', ["data" => $data, 'page' => $this->page_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'teamoneimg' => 'max:2048',
            'teamtwoimg' => 'max:2048',
        ]);


        $id = $request->id;
        Matches::where('id', $id)->update($request->except("_token", 'teamoneimg', 'teamtwoimg'));
        if ($request->file('teamoneimg')) {
            $this->update_images('matches', $id, $request->file('teamoneimg'), 'matches', 'teamoneimg');
        }
        if ($request->file('teamtwoimg')) {
            $this->update_images('matches', $id, $request->file('teamtwoimg'), 'matches', 'teamtwoimg');
        }

        return redirect()->route('matches')->with(['update' => "Data successfully Updated"]);
    }

    public function destroy($id)
    {
        try {
            $image_name = Matches::find($id);
            $image_name = $image_name->images;
            try {
                unlink(public_path('upload/Matches/' . $image_name));
            } catch (Exception $e) {
            }
            Matches::destroy($id);
            return redirect()->back()->with(['delete' => 'Data Successfully Deleted']);
        } catch (Exception $e) {
            return redirect()->back()->with(['delete' => 'First you have to delete  Contest Related to the this matches ']);
        }
    }

    public function fetch_api(Request $request)
    {
        $url = $request->url;
        $string = file_get_contents("https://cric-api.vercel.app/i?url=" . $url);
        $data = json_decode($string);
        return response()->json($data);
    }

    public function winner_rank($contest_id)
    {
        $total_winner_percentage = array();
        $winner_rank = ContestWinnerRank::where('contest_id', $contest_id)->get();
        foreach ($winner_rank as $rank) {
            for ($i = $rank->from; $i <= $rank->to; $i++) {
                array_push($total_winner_percentage, $rank->prize_amount);
            }
        }
        return  $total_winner_percentage;
    }



    public function winner_deside($matches_id)
    {


        $status = Matches::find($matches_id);
        if ($status->winner_status == 1) {
            return redirect()->back();
        } else {
            $contest =  Contest::where('matches_id', $matches_id)->get();
            // dd($contest);
            foreach ($contest as $con) {
                // gettting the data from participated user of
                $participated_user = Participated_user::where('contest_id', $con->id)->orderByDesc('total_run')->get();
                $participated_user_total_amount = Participated_user::where('contest_id', $con->id)->orderByDesc('total_run')->sum('participate_amount');
                $total_no_of_participated_user = Participated_user::where('contest_id', $con->id)->orderByDesc('total_run')->count();

                $total_winner_percentage = $this->winner_rank($con->id);
                $total_winner_percentage_count = count($total_winner_percentage);


                if ($total_winner_percentage_count > $total_no_of_participated_user) {
                    for ($i = 0; $i < $total_no_of_participated_user; $i++) {
                        print_r(json_decode(json_encode($participated_user[$i])));
                        Wallet::insert([
                            'user_id' => $participated_user[$i]->user_id,
                            'debit' => 0,
                            'credit' => $participated_user_total_amount * ($total_winner_percentage[$i] / 100),
                            'balance' => ((int)Wallet::where('user_id', $participated_user[$i]->user_id)->first()->balance ?? '0') + ((int)$participated_user_total_amount * ($total_winner_percentage[$i] / 100)),
                            'withdraw_status' => 1,
                            'api_info' => "Contest Winning Amount",
                            'status' => 1,

                        ]);
                    }
                } else {
                    for ($i = 0; $i < $total_winner_percentage_count; $i++) {
                        print_r(json_decode(json_encode($participated_user[$i])));
                        Wallet::insert([
                            'user_id' => $participated_user[$i]->user_id,
                            'debit' => 0,
                            'credit' => $participated_user_total_amount * ($total_winner_percentage[$i] / 100),
                            'balance' => ((int)Wallet::where('user_id', $participated_user[$i]->user_id)->first()->balance ?? '0') + ((int)$participated_user_total_amount * ($total_winner_percentage[$i] / 100)),
                            'withdraw_status' => 1,
                            'api_info' => "Contest Winning Amount",
                            'status' => 1,

                        ]);
                    }
                }
            }
            
            Matches::where('id', $matches_id)->update(['winner_status' => '1']);
            return redirect()->back()->with('status1', 'Matches Successfully Completed');
        }
    }
}
