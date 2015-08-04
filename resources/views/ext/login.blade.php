@extends('layouts.ext')

@section('title', 'Log masuk sistem - ')

@section('style')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <div class="text-center">
                <div class="page-header" style="margin-top: 0px;">
                    <h3>Log masuk</h3>
                </div>
            </div>

            {!! Form::open(['class' => 'form-horizontal']) !!}
                <div class="form-group">
                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="emel" placeholder="Email" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-default">
                            <i class="fa fa-sign-in fa-fw"></i> Log Masuk
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection