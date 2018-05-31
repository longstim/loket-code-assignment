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
                           Daftar Event
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file-text"></i> Daftar Event
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection
