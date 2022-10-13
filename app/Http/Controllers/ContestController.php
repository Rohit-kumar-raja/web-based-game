<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestWinnerRank;
use App\Models\Matches;
use Illuminate\Http\Request;
use Exception;

class ContestController extends Controller
{
    public  $page_name = 'Contest';
    public function index()
    {
        $Products = Contest::all();
        return view('contest.index', ['data' => $Products, 'page' => $this->page_name]);
    }

    public  function insert()
    {
        $matches = Matches::all();
        return view('contest.insert', ['matches' => $matches, 'page' => $this->page_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id =   Contest::insertGetId($request->except('_token', 'from', 'to', 'prize_amount'));


        for ($i = 0; $i < count($request->from); $i++) {
            ContestWinnerRank::insert([
                'from' => $request->from[$i],
                'to' => $request->to[$i],
                'prize_amount' => $request->prize_amount[$i],
                'contest_id' => $id,
                'created_at' => date('Y-m-d h:m:s')
            ]);
        }

        return redirect()->back()->with(['store' => 'Data successfully Saved ']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = Contest::find($id);
        if ($status->status == 1) {
            Contest::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('status', 'Status Successfully Deactivated');
        } else {
            Contest::where('id', $id)->update(['status' => '1']);
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
        $data = Contest::find($id);
        $matches = Matches::all();
        $rank = ContestWinnerRank::where('contest_id', $id)->get();
        return view('contest.update', ["data" => $data, 'matches' => $matches, 'rank' => $rank, 'page' => $this->page_name]);
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
        $id = $request->id;
        Contest::where('id', $id)->update($request->except('_token', 'from', 'to', 'prize_amount'));
        ContestWinnerRank::where('contest_id', $id)->delete();

        for ($i = 0; $i < count($request->from); $i++) {
            if ($request->from[$i] != '' && $request->to[$i] != '') {
                ContestWinnerRank::insert([
                    'from' => $request->from[$i],
                    'to' => $request->to[$i],
                    'prize_amount' => $request->prize_amount[$i],
                    'contest_id' => $id,
                    'created_at' => date('Y-m-d h:m:s')
                ]);
            }
        }


        return back()->with(['update' => "Data successfully Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = Contest::find($id);
        $image_name = $image_name->images;
        try {
            unlink(public_path('upload/Products/' . $image_name));
        } catch (Exception $e) {
        }
        Contest::destroy($id);
        return redirect()->back()->with(['delete' => 'Data Successfully Deleted']);
    }
}
