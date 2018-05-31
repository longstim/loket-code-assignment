<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $event=DB::table('events')
                    ->join('kategori', 'kategori.id', '=', 'events.kategori_id')
                    ->join('lokasi', 'lokasi.id', '=', 'events.lokasi_id')
                    ->join('users', 'users.id', '=', 'events.user_id')
                    ->where('events.user_id', '=', Auth::user()->id)
                    ->select('events.*', 'kategori.nama_kategori','lokasi.nama_lokasi')
                    ->get();

        return view('home', compact('event'));
    }
}
