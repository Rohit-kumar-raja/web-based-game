<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Matches;
use App\Models\Participated_user;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Exception;

class ParticipatedUserController extends Controller
{

    public $page_name = 'Participated User';
    public function index()
    {
        $data = Participated_user::orderByDesc('id')->get();
        return view('participate_user.index', ['data' => $data, 'page' => $this->page_name]);
    }


    public function status($id)
    {
        $status = Participated_user::find($id);
        if ($status->status == 1) {
            Participated_user::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('status', 'Status Successfully Deactivated');
        } else {
            Participated_user::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('status1', 'Status Successfully Activated');
        }
    }
    // getting
    public function destroy($id)
    {
        $image_name = Participated_user::find($id);
        $image_name = $image_name->images;
        try {
            unlink(public_path('upload/Participated_user/' . $image_name));
        } catch (Exception $e) {
        }
        Participated_user::destroy($id);
        return redirect()->back()->with(['delete' => 'Data Successfully Deleted']);
    }

    public function delete_wallet($id)
    {
        Wallet::destroy($id);
        Participated_user::where('wallet_id',$id)->update(['wallet_id'=>0]);
        return redirect()->back()->with(['delete' => 'Wallet Amount Created To The User Successfully ']);
    }


    public function onematch($id)
    {
        $data =  Matches::where('id', $id)->get();
        return
            view('matches.index', ['data' => $data, 'page' => 'Matches']);
    }

    public function onecontest($id)
    {
        $data =  Contest::where('id', $id)->get();
        return view('contest.index', ['data' => $data, 'page' => 'Contest']);
    }

    public function onewallet($id)
    {
        $data =  Wallet::where('id', $id)->get();
        return view('wallet.index', ['data' => $data]);
    }
}
