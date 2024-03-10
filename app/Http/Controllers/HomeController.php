<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use App\Models\kuis;
use App\Models\pertanyaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kuis = kuis::all();
        return view('pages.homepage.index', compact('kuis'));
    }

    public function kuis($idKuis) {
        $kuis = kuis::find($idKuis);
        return view('pages.homepage.kuis', compact('kuis'));
    }

    public function soal($idKuis, $idPertanyaan){
        $pertanyaan = pertanyaan::where('id_kuis', $idKuis)->find($idPertanyaan);
        return view('pages.homepage.soal', compact('idKuis', 'pertanyaan'));
    }

    public function proses(Request $request, $idKuis, $idPertanyaan) {
        $user = auth()->user()->id_user;
        $pertanyaan = pertanyaan::find($idPertanyaan);
        $inputan['id_user']  = $user;
        $inputan['id_pertanyaan'] = $pertanyaan->id_pertanyaan;
        $inputan['answer'] = $request->answer;
        $inputan['correct'] = $pertanyaan->correct == $request->answer ? 'ya' : 'tidak';
        jawaban::create($inputan);

        $pertanyaanSelanjutnya = pertanyaan::where('id_kuis', $idKuis)
                                           ->where('id_pertanyaan', '>', $idPertanyaan)
                                           ->first();

        if($pertanyaanSelanjutnya) {
            return redirect()->route('kuis.soal', ['idKuis' => $idKuis, 'idPertanyaan' => $pertanyaanSelanjutnya->id_pertanyaan]);
        } else {
            return redirect()->route('kuis.berhasil', $idKuis);
        }

    }

    public function berhasil($idKuis) {
        $kuis = kuis::find($idKuis);
        $user = auth()->user()->id_user;

        $answer = jawaban::where('id_user', $user)->whereHas('pertanyaan', function($q) use ($idKuis) {
            $q->where('id_kuis', $idKuis);
        })->get();

        $score = $answer->filter(function($answer) {
            return $answer->correct == 'ya';
        })->count();

        return view('pages.homepage.berhasil', compact('kuis', 'score'));
    }
}
