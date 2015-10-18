@extends('layouts.administrator')

@section('title', 'Maklumat dokumen awam - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        {!! Form::open(['route' => 'administrator.document.store', 'files' => true, 'method' => 'POST', 'name' => 'uploaddoc']) !!}
            <span class="btn btn-default btn-file pull-right" data-toggle="tooltip" data-placement="left" title="Muat naik dokumen public baru">
                <i class="fa fa-upload fa-fw"></i>
                <input type="file" name="file">
            </span>
        {!! Form::close() !!}
        <h2>Dokumen awam</h2>
    </div>

    <div class="spacer_div"></div>

    <?php $index = 0; ?>
    @foreach($files as $file)
        @if($index % 6 == 0)
        <div class="row" style="display: flex; ">
        @endif
            <div class="col-xs-2">
                <a href="{{ asset($documentPath . str_replace($path, '', $file)) }}" data-lightbox="documents">
                    <img src="{{ asset($documentPath . str_replace($path, '', $file)) }}" class="img-responsive img-thumbnail" />
                </a>
                <hr />
                <div style="position: absolute; bottom: 0; left: 15px; width: 91%;">
                    <button type="button" class="btn btn-danger btn-xs btn-block" data-dpp-token="{{ csrf_token() }}" data-dpp-url="{{ route('administrator.document.destroy', base64_encode(str_replace($path, '', $file))) }}">
                        <i class="fa fa-trash-o fa-fw"></i>
                    </button>
                </div>
            </div>
        @if($index % 6 == 5)
        </div><hr />
        @endif

        <?php $index++; ?>
    @endforeach

    @if($index % 6 != 5)
        </div>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:nth-child(2)').addClass('active');
            $('[data-toggle="tooltip"]').tooltip();

            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                $('[name="uploaddoc"]').submit();
            });
        });

        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('button[type="button"]').click(function() {

            $.ajax({
                url: $(this).attr('data-dpp-url'),
                method: 'POST',
                data: {_method: 'DELETE', _token: $(this).attr('data-dpp-token')}
            })
                .done(function( data ) {
                    if(data.success) {
                        window.location.reload();
                    }
                    else {
                        console.log(data);
                        alert('Error');
                    }
                });
        });
    </script>
@endsection