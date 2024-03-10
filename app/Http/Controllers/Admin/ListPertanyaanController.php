<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kuis;
use App\Models\pertanyaan;
use Illuminate\Http\Request;

class ListPertanyaanController extends Controller
{
    public function store(Request $request) {
        $inputan = $request->all();
        pertanyaan::create($inputan);
        return back();
    }

    public function destroy($id){
        pertanyaan::find($id)->delete();
        return back();
    }
}
