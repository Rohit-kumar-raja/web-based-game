<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    function index()
    {
        $from = date('2018-01-01');
        $to = date('2018-05-02');
  

        return view('dashboard');
    }
}
