@extends('layouts.app')

@section('content')

<style>
    .table td{
        border: #bce8f1 solid 1px !important;
    }

    .table th{
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
                           Daftar Tiket
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file-text"></i> Daftar Tiket
                            </li>
                        </ol>
                    </div>
                </div>

                <a href="{{ url('/tambahtiket') }}" class="btn btn-primary btn-lg" role="button">Buat Tiket</a>
                @if(Session::has('message'))
                    <span class="label label-danger">{{ Session::get('message') }}</span>
                @endif
                <p></p>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>Event</th>
                            <th>Nama Tiket</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th></th>
                        </tr>
                        <?php $no=1; ?>
                        @foreach ($tiket as $data)
                        <tr>
                            <td align="center">{{ $no++ }}</td>
                            <td align="center">{{ $data->nama_event }}</td>
                            <td align="center">{{ $data->nama_tiket }}</td>
                            <td align="center">{{ $data->jumlah }}</td>
                            <td align="center">{{ $data->harga }}</td>
                            <td align="center">{{ $data->deskripsi }}</td>
                            <td align="center" width="200px">
                                <a href="edittiket/{{$data->id}}"><i class="fa fa-edit"></i>&nbspUbah</a>&nbsp&nbsp&nbsp
                                <a href="hapustiket/{{$data->id}}"><i class="fa fa-trash-o"></i>&nbspHapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
@endsection
