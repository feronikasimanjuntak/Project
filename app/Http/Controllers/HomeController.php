<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outfit;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        if($request->kategori == "semua"){
            $outfits = Outfit::get();
        } else if($request->kategori == "baju" || $request->kategori == "celana" || $request->kategori == "jaket"){
            $outfits = Outfit::where('kategori',$request->kategori)->get();
        } else{
            $outfits = Outfit::get();
        }
        return view('home',compact('outfits'));
    }

    public function search(Request $request)
    {
        $inputSearch = $request['inputSearch'];
        $keyResult = DB::table('outfits')
        ->where('nama', 'LIKE', '%'.$inputSearch.'%')
        ->get();
        echo $keyResult;
    }
}
