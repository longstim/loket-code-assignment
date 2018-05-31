<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
Use Redirect;
use View;

class TiketController extends Controller
{
     public function index()
   {
		return view('tiket.tiket');
   }

   public function daftartiket()
   {
     	$tiket=DB::table('tiket')
                    ->join('events', 'events.id', '=', 'tiket.event_id')
                    ->where('events.user_id', '=', Auth::user()->id)
                    ->select('tiket.*', 'events.nama_event')
                    ->get();

   		return view('tiket.tiket', compact('tiket'));
   }

   public function tambahtiket(Request $request)
   {
   	  $event = DB::table('events')
              ->where('events.user_id', '=', Auth::user()->id)
              ->get();

       return View('tiket.form_tambah_tiket', compact('event'));
   }

   public function prosestambahtiket(Request $request)
   {
      if( empty(Input::get('event')) || empty(Input::get('namatiket')) || empty(Input::get('jumlah')) || empty(Input::get('deskripsi')))  
      { 
         return Redirect::to('/tambahtiket')->with('message','Isi data "Tiket" dengan lengkap!');
      }
      else
      {
        $data = array(
        'event_id' => Input::get('event'),
        'nama_tiket' => Input::get('namatiket'),
        'jumlah' => Input::get('jumlah'),
        'harga' => Input::get('harga'),
        'deskripsi' => Input::get('deskripsi'),
        );

        DB::table('tiket')->insert($data);
      }

      return Redirect::to('tiket')->with('message','Berhasil menambah Tiket!');
   }

   public function edittiket($idtiket)
   {
      $tiket = DB::table('tiket')->where('id','=',$idtiket)->first();
      $event = DB::table('events')
              ->where('events.user_id', '=', Auth::user()->id)
              ->get();

      return View('tiket.form_edit_tiket', compact('tiket','event'));
   }

    public function prosesedittiket(Request $request)
   {
      
      if( empty(Input::get('event')) || empty(Input::get('namatiket')) || empty(Input::get('jumlah')) || empty(Input::get('deskripsi')))  
      { 
         return Redirect::to('/tambahtiket')->with('message','Isi data "Tiket" dengan lengkap!');
      }
      else
      {
        $data = array(
        'event_id' => Input::get('event'),
        'nama_tiket' => Input::get('namatiket'),
        'jumlah' => Input::get('jumlah'),
        'harga' => Input::get('harga'),
        'deskripsi' => Input::get('deskripsi'),
        );
      }

      DB::table('tiket')->where('id','=',Input::get('idtiket'))->update($data);

      return Redirect::to('tiket')->with('message','Berhasil mengubah data!');
   }

   public function hapustiket($idtiket)
   {
      $data = DB::table('tiket')->where('id','=',$idtiket)->delete();

      return Redirect::to('tiket')->with('message','Berhasil menghapus data!');
   }
}
