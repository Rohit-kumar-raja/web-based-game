<?php

namespace App\Http\Controllers;

use App\Models\AllUsers;
use App\Models\Contest;
use App\Models\Matches;
use App\Models\Messages;
use App\Models\Participated_user;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    function index()
    {

        $total_user = AllUsers::count();
        $total_matches = Matches::count();
        $total_contest = Contest::count();
        $total_debit = Wallet::sum('debit');
        $total_credit = Wallet::sum('credit');
        $total_participate = Participated_user::count();


        return view('dashboard', [
            'total_user' => $total_user,
            'total_matches' => $total_matches,
            'total_contest' => $total_contest,
            'total_debit' => $total_debit,
            'total_credit' => $total_credit,
            'total_participate' => $total_participate,
        ]);
    }
}
