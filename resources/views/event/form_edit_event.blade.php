@extends('layouts/app')

@section('content')

    {!! Html::style('asset/js/jquery-ui/jquery-ui.min.css') !!}

    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- jQuery UI-->
    {!! Html::script('asset/js/jquery-ui/jquery-ui.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    
    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- jQuery UI-->
    {!! Html::script('asset/js/jquery-ui/jquery-ui.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    <script type="text/javascript">
      $( function() {
        $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"}).val();
      });
    </script>

    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Ubah Event
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-file-text"></i>  <a href="{{ url('/event') }}">Daftar Event</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Ubah Event
                            </li>
                        </ol>
                    </div>
                </div>

     
            <div class="col-xs-5" >
                {{ Form::open(['url' => '/proseseditevent']) }}

                {!! csrf_field() !!}

                @if(Session::has('message'))
                    <span class="label label-danger">{{Session::get('message')}}</span>
                    <p></p>
                @endif

                {{ Form::hidden('idevent',$event->id,['class'=>'form-control'])}}
           
                <label>Nama Event</label>
                {{ Form::text('namaevent', $event->nama_event, ['placeholder'=>'Nama Event','class' => 'form-control']) }}
                <p></p>
                <label>Kategori</label>
                <div class="input-group col-xs-8">
                    <select name="kategori" class="form-control">
                        @foreach($kategori as $data)
                            <option value="{{$data->id}}"<?= $event->kategori_id == $data->id ? 'selected' : '' ; ?>>{{$data->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <p></p>
                <label>Tanggal</label>
                <div class="input-group date col-xs-6"> 
                    {!! Form::text('tanggal', $event->tanggal, ['placeholder'=>'Tanggal', 'id' => 'datepicker','class' => 'form-control']) !!} 
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>                 
                </div>
                <p></p>
                <label>Lokasi</label>
                <div class="input-group col-xs-8">
                    <select name="lokasi" class="form-control">
                        @foreach($lokasi as $data)
                            <option value="{{$data->id}}"<?= $event->lokasi_id == $data->id ? 'selected' : '' ; ?>>{{$data->nama_lokasi}}</option>
                        @endforeach
                    </select>
                </div>
                <p></p>
                <label>Deskripsi</label>
                {{ Form::textarea('deskripsi', $event->deskripsi, ['placeholder'=>'Deskripsi','class' => 'form-control', 'size' => '30x3']) }}
                <p></p>

                {{ Form::submit('Ubah', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>             
       
    </div>
</div>
@stop