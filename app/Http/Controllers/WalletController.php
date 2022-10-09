<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Exception;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = Wallet::all();
        $all_withdraw = Wallet::where('withdraw_status', 1)->sum('debit');
        $all_added = Wallet::sum('credit');
        return view('wallet.index', ['data' => $wallet, 'all_withdraw' => $all_withdraw, 'all_added' => $all_added]);
    }



    public function status($id)
    {
        $status = Wallet::find($id);
        if ($status->status == 1) {
            Wallet::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('status', 'Status Successfully Deactivated');
        } else {
            Wallet::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('status1', 'Status Successfully Activated');
        }
    }





    public function destroy($id)
    {
        $image_name = Wallet::find($id);
        $image_name = $image_name->images;
        try {
            unlink(public_path('upload/Wallet/' . $image_name));
        } catch (Exception $e) {
        }
        Wallet::destroy($id);
        return redirect()->back()->with(['delete' => 'Data Successfully Deleted']);
    }

    public function debit()
    {
        $data =  Wallet::where('debit', '!=', '')->get();
        return view('wallet.debit', ['data' => $data]);
    }
    public function credit()
    {
        $data =  Wallet::where('credit', '!=', '')->get();
        return view('wallet.credit', ['data' => $data]);
    }

    


}
