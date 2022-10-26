<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Exception;

class WithdrawRequestController extends Controller
{
    public function index()
    {
        $data =  WithdrawRequest::orderByDesc('id')->get();
        return view('withdraw_request.index', ['data' => $data]);
    }

    public function approved()
    {
    }
    public function padding()
    {
    }
    public function reject()
    {
    }



    public function status($id)
    {
        $status = WithdrawRequest::find($id);
        if ($status->status == 1) {
            WithdrawRequest::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('status', 'Status Successfully Deactivated');
        } else {
            WithdrawRequest::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('status1', 'Status Successfully Activated');
        }
    }

    public function destroy($id)
    {
        $image_name = WithdrawRequest::find($id);
        $image_name = $image_name->images;
        try {
            unlink(public_path('upload/WithdrawRequest/' . $image_name));
        } catch (Exception $e) {
        }
        WithdrawRequest::destroy($id);
        return redirect()->back()->with(['delete' => 'Data Successfully Deleted']);
    }
}
