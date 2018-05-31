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

class LokasiController extends Controller
{
   public function index()
   {
		return view('lokasi.lokasi');
   }

   public function daftarlokasi()
   {
   		$lokasi=DB::table('lokasi')->get();

   		return view('lokasi.lokasi', compact('lokasi'));
   }

   public function tambahlokasi(Request $request)
   {
      return view('lokasi.form_tambah_lokasi');
   }

   public function prosestambahlokasi(Request $request)
   {
      if(empty(Input::get('namalokasi')))  
      { 
         return Redirect::to('/tambahlokasi')->with('message','Isi data "Lokasi" dengan lengkap!');
      }
      else
      {
        $data = array(
        'nama_lokasi' => Input::get('namalokasi'),
        );

        DB::table('lokasi')->insert($data);
      }

      return Redirect::to('lokasi')->with('message','Berhasil menambah Lokasi!');
   }

   public function editlokasi($idlokasi)
   {
      $lokasi = DB::table('lokasi')->where('id','=',$idlokasi)->first();

      return View('lokasi.form_edit_lokasi', compact('lokasi'));
   }

    public function proseseditlokasi(Request $request)
   {
      if(empty(Input::get('namalokasi')))  
      { 
          return redirect()->back()->with('message','Isi data "Event" dengan lengkap!');
      }
      else
      {
        $data = array(
        'nama_lokasi' => Input::get('namalokasi'),
        );
      }

      DB::table('lokasi')->where('id','=',Input::get('idlokasi'))->update($data);

      return Redirect::to('lokasi')->with('message','Berhasil mengubah data!');
   }

   public function hapuslokasi($idlokasi)
   {
      $data = DB::table('lokasi')->where('id','=',$idlokasi)->delete();

      return Redirect::to('lokasi')->with('message','Berhasil menghapus data!');
   }
}
