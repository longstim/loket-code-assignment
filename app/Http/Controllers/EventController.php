<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
Use Redirect;
use View;
use \Twitter;
use Carbon\Carbon;

class EventController extends Controller
{
   public function index()
   {
   		return view('event.event');
   }

   public function daftarevent()
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

   public function tambahevent(Request $request)
   {
      $kategori = DB::table('kategori')->get();
      $lokasi = DB::table('lokasi')->get();

      return view('event.form_tambah_event', ['kategori'=>$kategori, 'lokasi'=>$lokasi]);
   }

   public function prosestambahevent(Request $request)
   {
      if(empty(Input::get('namaevent')) || empty(Input::get('kategori')) || empty(Input::get('tanggal')) || empty(Input::get('lokasi')) || empty(Input::get('deskripsi')))  
      { 
         return Redirect::to('/tambahevent')->with('message','Isi data "Event" dengan lengkap!');
      }
      else
      {
        $id = Auth::user()->id;

        $data = array(
        'nama_event' => Input::get('namaevent'),
        'kategori_id' => Input::get('kategori'),
        'tanggal' => Input::get('tanggal'),
        'lokasi_id' => Input::get('lokasi'),
        'deskripsi' => Input::get('deskripsi'),
        'user_id' => $id,
        );

        DB::table('events')->insert($data);
      }

      return Redirect::to('event')->with('message','Berhasil membuat event!');
   }

   public function editevent($idevent)
   {
      $event = DB::table('events')->where('id','=',$idevent)->first();
      $kategori = DB::table('kategori')->get();
      $lokasi = DB::table('lokasi')->get();

      return View('event.form_edit_event', compact('event','kategori','lokasi'));
   }

    public function proseseditevent(Request $request)
   {
      if(empty(Input::get('namaevent')) || empty(Input::get('kategori')) || empty(Input::get('tanggal')) || empty(Input::get('lokasi')) || empty(Input::get('deskripsi')))  
      { 
          return redirect()->back()->with('message','Isi data "Event" dengan lengkap!');
      }
      else
      {
        $data = array(
        'nama_event' => Input::get('namaevent'),
        'kategori_id' => Input::get('kategori'),
        'tanggal' => Input::get('tanggal'),
        'lokasi_id' => Input::get('lokasi'),
        'deskripsi' => Input::get('deskripsi'),
        );
      }

      DB::table('events')->where('id','=',Input::get('idevent'))->update($data);

      return Redirect::to('event')->with('message','Berhasil mengubah data!');
   }

   public function hapusevent($idevent)
   {
      $data = DB::table('events')->where('id','=',$idevent)->delete();

      return Redirect::to('event')->with('message','Berhasil menghapus data!');
   }

   public function detailevent($idevent)
   {
      $event = DB::table('events')
                    ->join('kategori', 'kategori.id', '=', 'events.kategori_id')
                    ->join('lokasi', 'lokasi.id', '=', 'events.lokasi_id')
                    ->select('events.*', 'kategori.nama_kategori','lokasi.nama_lokasi')
                    ->where('events.id','=',$idevent)
                    ->first();

      $tiket = DB::table('tiket')->where('event_id','=',$idevent)->get();

      return View('event.detail_event', compact('event','tiket'));
   }

   public function postontwitter($idevent)
   {
      $data = DB::table('events')->where('id','=',$idevent)->first();
      $current_time = Carbon::now()->toDateTimeString();

      Twitter::postTweet(['status' => 'Please see my '.$data->nama_event.' here: '.URL::previous().' '.$current_time, 'format' => 'json']);
      return redirect()->back()->with('message','Berhasil memposting tweet!');
   }
}
