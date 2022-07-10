<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outfit;
use Illuminate\Support\Facades\DB;


class BuyController extends Controller
{
    public function index()
    {
        $outfits = Outfit::latest()->simplePaginate(6);
        return view('shop.index',compact('outfits'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function show(Outfit $outfit)
    {
        return view('shop.show', compact('outfit'));
    }

    public function destroy(Outfit $outfit)
    {
        $outfit->delete();

        return redirect()->route('shop.index')
        ->with('success', 'Outfit berhasil dihapus');
    }

    public function pembayaran()
    {
        $shops = Outfit::latest();
        return view('shop.buy',compact('shops'));
    }
}
