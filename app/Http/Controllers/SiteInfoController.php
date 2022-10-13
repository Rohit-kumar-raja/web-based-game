<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteInfoController extends Controller
{

    public $page_name = "Site Information";
    public function index()
    {
        $data = SiteInfo::find(1);
        return view('siteInfo.update', ["data" => $data, 'page' => $this->page_name]);
    }

    public function update(Request $request)
    {
        $id = 1;
        DB::table('site_infos')->where('id', $id)->update($request->except("_token", 'images'));

        return redirect('siteinfo')->with(['update' => "Data successfully Updated"]);
    }
}
