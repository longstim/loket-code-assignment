@extends('layouts/app')

@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Ubah Lokasi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-file-text"></i>  <a href="{{ url('/lokasi') }}">Daftar lokasi</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Ubah Lokasi
                            </li>
                        </ol>
                    </div>
                </div>

     
            <div class="col-xs-5" >
                {{ Form::open(['url' => '/proseseditlokasi']) }}

                {!! csrf_field() !!}

                @if(Session::has('message'))
                    <span class="label label-danger">{{Session::get('message')}}</span>
                    <p></p>
                @endif

                {{ Form::hidden('idlokasi',$lokasi->id,['class'=>'form-control'])}}

                 <label>Nama Lokasi</label>
                {{ Form::text('namalokasi', $lokasi->nama_lokasi, ['placeholder'=>'Nama Lokasi','class' => 'form-control']) }}
                <p></p>

                {{ Form::submit('Ubah', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>             
       
    </div>
</div>
@stop