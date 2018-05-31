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

    <style>
        #myImg {
            border-radius: 1px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .gambar {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        .modal {

            position: fixed; /* Stay in place */
            padding-top: 200px; /* Location of the box */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {    
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }

        table td{
        border: #bce8f1 solid 1px !important;
        }

        #tiket th{
            border: #a6c7ce solid 1px !important;
            text-align:center; background:#d9edf7; color:#31708f;
        }

       .modal {
            position: fixed; /* Stay in place */
            padding-top: 200px; /* Location of the box */
        }
    </style>

    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Event {{ $event->nama_event}}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                             <li>
                                <i class="fa fa-file-text"></i>  <a href="{{ url('/event') }}">Daftar Event</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-eye"></i> Detail Event
                            </li>
                        </ol>
                    </div>
                </div>
   
           @if(Session::has('message'))
           <span class="label label-danger">{{Session::get('message')}}</span>
           @endif

           <div class="table-responsive">
                <table class="table table-hover table-striped">
                        <tr>
                            <th>Nama Event</th>
                            <td>{{ $event->nama_event }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $event->nama_kategori }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $event->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $event->nama_lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $event->deskripsi }}</td>
                        </tr>
                </table>
            </div>

            <div id="myModal" class="gambar">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById('myImg');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                    }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                        modal.style.display = "none";
                    }

                modal.onclick = function() { 
                        modal.style.display = "none";
                    }

            </script>
            <div style="text-align: right;">
                <a href="{{ url('postontwitter/'.$event->id) }}" class="btn btn-primary" role="button">Post on Twitter</a>&nbsp
                <a href="{{ url('editevent/'.$event->id) }}" class="btn btn-success" role="button">Ubah</a>&nbsp
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myDialog">Hapus</a>
            </div>

            <div class="modal fade" id="myDialog" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-trash-o"></i> Konfirmasi Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin menghapus Event {{ $event->nama_event }}?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('hapusevent/'.$event->id) }}" type="button" class="btn btn-danger">OK</a>
                            <a href="#"  type="button" class="btn btn-success" data-dismiss="modal">Batal</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            <h3 class="page-header">
                Tiket            
            </h3>
            <p></p>
            <div id="tiket" class="table-responsive">
                <table class="table table-bordered table-hover" >
                    <tr>
                        <th>Nama Tiket</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th></th>
                    </tr>
                    @if(is_array($tiket) || is_object($tiket))                   
                        @foreach ($tiket as $data)
                            <tr>
                                <td align="center">{{ $data->nama_tiket }}</td>
                                <td align="center">{{ $data->jumlah }}</td>
                                <td align="right">{{ $data->harga }}</td>
                                <td align="left">{{ $data->deskripsi }}</td>
                                <td align="center" width="200px">
                                    <a href="{{ url('/edittiket/'.$data->id) }}"><i class="fa fa-edit"></i>Ubah</a>&nbsp&nbsp&nbsp
                                    <a href="{{ url('/hapustiket/'.$data->id) }}"><i class="fa fa-trash-o"></i>Hapus</a>
                                </td>
                            </tr>
                         @endforeach
                    @endif
                </table>
            </div>       
    </div>
</div>
@stop