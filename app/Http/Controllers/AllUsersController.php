<?php

namespace App\Http\Controllers;

use App\Models\AllUsers;
use Exception;
use Illuminate\Http\Request;

class AllUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allusers = AllUsers::all();
        return view('allusers.index', ['data' => $allusers, 'url' => $this->web_url()]);
    }
    public function oneuser($id)
    {
        $allusers = AllUsers::where('id', $id)->get();
        return view('allusers.index', ['data' => $allusers, 'url' => $this->web_url()]);
    }


    public function status($id)
    {
        $status = AllUsers::find($id);
        if ($status->status == 1) {
            AllUsers::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('status', 'Status Successfully Deactivated');
        } else {
            AllUsers::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('status1', 'Status Successfully Activated');
        }
    }





    public function destroy($id)
    {
        try {
            $image_name = AllUsers::find($id);
            $image_name = $image_name->images;
            try {
                unlink(public_path('upload/allusers/' . $image_name));
            } catch (Exception $e) {
            }
            AllUsers::destroy($id);
            return redirect()->back()->with(['delete' => 'Data Successfully Deleted']);
        } catch (Exception $e) {
            return redirect()->back()->with(['delete' => 'First you have to delete Related parent data']);
        }
    }
}
