<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kuis;
use Illuminate\Http\Request;

class ListKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kuis = kuis::all();
        return view('pages.admin.listKuis', compact('kuis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tambahKuis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputan['nama_kuis'] = $request->nama_kuis;
        $inputan['deskripsi'] = $request->deskripsi;
        kuis::create($inputan);

        return redirect()->route('listKuis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kuis = kuis::find($id);
        
        return view('pages.admin.listPertanyaan', compact('kuis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kuis = kuis::find($id);
        return view('pages.admin.editKuis', compact('kuis'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputan = $request->all();
        kuis::find($id)->update($inputan);
        return redirect()->route('listKuis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kuis::find($id)->delete();
        return back();
    }
}
