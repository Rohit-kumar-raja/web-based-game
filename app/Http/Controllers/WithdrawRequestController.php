<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Exception;

class WithdrawRequestController extends Controller
{
    public function index()
    {
        $data =  WithdrawRequest::where('status',1)->orderByDesc('id')->get();
        return view('withdraw_request.index', ['data' => $data]);
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

    public function withdraw_request_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $withdraw_request = WithdrawRequest::find($id);
        $user_id = $withdraw_request->user_id;
        $request_amount = $withdraw_request->amount;
        $balance = ((int)Wallet::where('user_id', $user_id)->sum('credit')) - ((int)Wallet::where('user_id', $user_id)->sum('debit'));

        if ($status == 'success') {
            if ($balance >= $request_amount) {
                Wallet::insert([
                    'user_id' => $user_id,
                    'debit' => $request_amount,
                    'credit' => 0,
                    'balance' => ((int)Wallet::where('user_id', $user_id)->first()->balance ?? '0') - (int)$request_amount,
                    'withdraw_status' => 'Withdraw- Success',
                    'api_info' => "Contest Withdraw request",
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')

                ]);
                WithdrawRequest::where('id', $id)->update(['status' => 0]);
            } else {
                Wallet::insert([
                    'user_id' => $user_id,
                    'debit' => 0,
                    'credit' => 0,
                    'balance' => ((int)Wallet::where('user_id', $user_id)->first()->balance ?? '0'),
                    'withdraw_status' => 'Withdraw- Rejected Due to insufficiant Fund',
                    'api_info' => "Contest Withdraw request",
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                WithdrawRequest::where('id', $id)->update(['status' => 0]);
            }
        } else {
            Wallet::insert([
                'user_id' => $user_id,
                'debit' => 0,
                'credit' => 0,
                'balance' => ((int)Wallet::where('user_id', $user_id)->first()->balance ?? '0'),
                'withdraw_status' => 'Withdraw- Rejected By Admin',
                'api_info' => "Contest Withdraw request",
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')

            ]);
            WithdrawRequest::where('id', $id)->update(['status' => 0]);
        }
    }
}
