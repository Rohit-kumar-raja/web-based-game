<?php

namespace App\Http\Controllers;

use App\Models\AllUsers;
use Exception;
use Illuminate\Http\Request;

class AllUsersController extends Controller
{
 public $page_name='Users';
    public function index()
    {
        $allusers = AllUsers::orderByDesc('id')->get();
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

    public function document_status($id)
    {
        $document_verified = AllUsers::find($id);
        if ($document_verified->document_verified == 1) {
            AllUsers::where('id', $id)->update(['document_verified' => '0']);
            return redirect()->back()->with('status', $this->page_name.' Document UnVerified');
        } else {
            AllUsers::where('id', $id)->update(['document_verified' => '1']);
            return redirect()->back()->with('status1', $this->page_name.' Document Verified Successfully ');
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
