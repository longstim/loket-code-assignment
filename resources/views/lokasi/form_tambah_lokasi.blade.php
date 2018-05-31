@extends('layouts/app')

@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Tambah Lokasi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-file-text"></i>  <a href="{{ url('/lokasi') }}">Daftar Lokasi</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Tambah Lokasi
                        </ol>
                    </div>
                </div>
     
            <div class="col-xs-5" >
                {{ Form::open(['url' => '/prosestambahlokasi']) }}

                {!! csrf_field() !!}

                @if(Session::has('message'))
                    <span class="label label-danger">{{Session::get('message')}}</span>
                    <p></p>
                @endif

                <label>Nama Lokasi</label>
                {{ Form::text('namalokasi', '', ['placeholder'=>'Nama Lokasi','class' => 'form-control']) }}
                <p></p>

                {{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>             
       
    </div>
</div>
@stop