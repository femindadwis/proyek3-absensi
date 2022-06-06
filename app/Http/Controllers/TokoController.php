<?php

namespace App\Http\Controllers;

use App\Models\toko;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TokoController extends Controller
{
     
   public function index(Request $request)
   {
       //
        //
       $this->validate($request, [
           'limit' => 'integer',
       ]);

       $lists = toko::when($request->keyword, function ($query) use ($request) {
           $query->where('jabatan', 'like', "%{$request->keyword}%"); // search by jabatan
       })->paginate($request->limit ? $request->limit : 20);

       $lists->appends($request->only('keyword'));

       return view('toko.index', compact('lists'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
       return view('toko.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //
       $request->validate([
           'jabatan' => ['required', 'string', 'max:20'],

       ]);

       toko::create($request->all());

       Alert::success('Success', 'Data berhasil ditambahkan');
       return redirect()->route('MstJabatan.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       //
       $list = toko::findOrFail($id);

       return view('toko.edit', compact('list'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       //
       $request->validate([
           'jabatan' => ['required', 'string', 'max:20'],
       ]);

       toko::find($id)->update($request->all());

       Alert::success('Success', 'Data berhasil diubah');
       return redirect()->route('MstJabatan.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       //
       toko::findOrFail($id)->delete();

       Alert::success('Success', 'Data berhasil dihapus');
       return redirect()->route('MstJabatan.index');
   }
}
