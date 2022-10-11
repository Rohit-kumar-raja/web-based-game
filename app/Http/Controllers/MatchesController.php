<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use Exception;

class MatchesController extends Controller
{

    // page of the show into the front of the admin panel 
    public  $page_name = 'Matches';
    public function index()
    {
        $data = Matches::all();
        return view('matches.index', ['data' => $data, 'page' => $this->page_name]);
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
        $id =   Matches::insertGetId($request->except('_token'));
        if ($request->file('teamoneimg') && $request->file('teamtwoimg')) {
            Matches::where('id', $id)->update([
                'teamoneimg' => $this->insert_image($request->file('teamoneimg'), 'matches'),
                'teamtwoimg' => $this->insert_image($request->file('teamtwoimg'), 'matches')
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
        $id = $request->id;
        Matches::where('id', $id)->update($request->except("_token", 'teamoneimg','teamtwoimg'));
        if ($request->file('teamoneimg')) {
            $this->update_images('matches', $id, $request->file('teamoneimg'), 'matches', 'teamoneimg');
        }
        if ($request->file('teamtwoimg')) {
            $this->update_images('matches', $id, $request->file('teamtwoimg'), 'matches', 'teamtwoimg');
        }

        return redirect()->route('matches')->with(['update' => "Data successfully Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->back()->with(['delete' => 'First you have to delete Related parent data']);
        }
    }

    public function fetch_api(Request $request)
    {
        $url = $request->url;
        $string = file_get_contents("https://cric-api.vercel.app/i?url=" . $url);
        $data = json_decode($string);
        return response()->json($data);
    }
}
