@extends('layouts/app')

@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Buat Tiket
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-file-text"></i>  <a href="{{ url('/tiket') }}">Daftar Tiket</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square"></i> Buat Tiket
                        </ol>
                    </div>
                </div>
     
            <div class="col-xs-5" >
                {{ Form::open(['url' => '/prosestambahtiket']) }}

                {!! csrf_field() !!}

                @if(Session::has('message'))
                    <span class="label label-danger">{{Session::get('message')}}</span>
                    <p></p>
                @endif

                <label>Event</label>
                <div class="input-group col-xs-12">
                    <select name="event" class="form-control">
                        @foreach($event as $data)
                            <option value="{{$data->id}}">{{$data->nama_event}} </option>
                        @endforeach
                    </select>
                </div>
                <p></p>
                <label>Nama Tiket</label>
                {{ Form::text('namatiket', '', ['placeholder'=>'Nama Tiket','class' => 'form-control']) }}
                <p></p>
                <div class="input-group col-xs-6">
                    <label>Jumlah</label>
                    {{ Form::text('jumlah', '', ['placeholder'=>'Jumlah','class' => 'form-control']) }}
                    <p></p>
                    <label>Harga</label>
                    {{ Form::text('harga', '', ['placeholder'=>'Harga','class' => 'form-control']) }}
                </div>
                <p></p>
                 <label>Deskripsi</label>
                {{ Form::textarea('deskripsi', '', ['placeholder'=>'Deskripsi','class' => 'form-control', 'size' => '30x3']) }}
                <p></p>


                {{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>             
       
    </div>
</div>
@stop