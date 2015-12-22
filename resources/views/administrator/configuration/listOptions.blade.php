@extends('layouts.administrator')

@section('title', 'Konfigurasi - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <h2>Konfigurasi</h2>
    </div>
    <div class="row">
        <div class="col-xs-2">
            <button class="btn btn-default btn-block">
                <i class="fa fa-download fa-fw"></i> Backup
            </button>
        </div>
        <div class="col-xs-10">
            <div class="form-group">
                <p class="form-control-static">Muat turun backup details</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:nth-child(4)').addClass('active');
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
