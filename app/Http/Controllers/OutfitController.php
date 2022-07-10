<?php

namespace App\Http\Controllers;
use App\Exports\OutfitExport;
use App\Models\Outfit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OutfitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:outfit-list|outfit-create|outfit-edit|outfit-delete', ['only' => ['index','show']]);
         $this->middleware('permission:outfit-create', ['only' => ['create','store']]);
         $this->middleware('permission:outfit-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:outfit-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outfits = Outfit::latest()->simplePaginate(6);


        $categories = [];
        $data = [];
        foreach($outfits as $kt) {
            $categories[] = $kt->kategori;
            $data[] = $kt->stok;
        }
        // Outfit::groupBy('kategori')->first();
        // dd($data);
        // dd(json_encode($categories));

        return view('outfits.index', ['outfits' => $outfits, 'categories' => $categories, 'data'=>$data])
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outfits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
            'detail' => 'required',
        ]);

        Outfit::create($request->all());

        return redirect()->route('outfits.index')
                        ->with('success','Outfit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function show(Outfit $outfit)
    {
        return view('outfits.show',compact('outfit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outfit = Outfit::find($id);
        return view('outfits.edit',compact('outfit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'nama' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
            'detail' => 'required',
        ]);

        $outfit = Outfit::find($id);
        $outfit->nama = $request->input('nama');
        $outfit->gambar = $request->input('gambar');
        $outfit->harga = $request->input('harga');
        $outfit->stok = $request->input('stok');
        $outfit->kategori = $request->input('kategori');
        $outfit->detail = $request->input('detail');
        $outfit->save();

        return redirect()->route('outfits.index')
                        ->with('success','outfit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();

        return redirect()->route('outfits.index')
                        ->with('success','outfit deleted successfully');
    }

    public function cari(Request $request){
        if($request->has('cari')){
            $q=$request->cari;
            $result=Outfit::where('nama','like','%' .$q.'%')->get();
            return response()->json(['data'=>$result]);
        }else{
            return view('outfits.index');
        }
    }

    public function cetak_pdf() {
        $outfit = Outfit::all();

        $pdf = PDF::loadview('outfits.outfitPdf',['outfits'=>$outfit]);
        return $pdf->stream('outfitPdf');
    }

    public function export_excel() {
        return Excel::download(new OutfitExport, 'outfit.xlsx');
	}


}
