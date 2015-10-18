<div class="modal fade bs-example-modal-lg" id="preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Preview artikel</h4>
            </div>
            <div class="modal-body preview_markdown" id="preview_markdown"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-lg" id="imageSelector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Gambar</h4>
            </div>
            <div class="modal-body" id="pilihangambar"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times fa-fw"></i> Tutup
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="row articles_form">

    {!! Form::open(['route' => $formAction, 'method' => (isset($method))? $method : 'POST', 'name' => 'articlesform']) !!}
        <input type="hidden" name="is_publish" value="{{ $article->is_publish or '0' }}" />
        <div class="col-sm-10">
            <div class="form-group">
                @include('administrator.articles.partial_toolbar')
            </div>
            <div class="form-group">
                <textarea name="markdowneditor" class="form-control" onkeyup="updateMarkdown()">{{ $content or '' }}</textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-sm preview-button" data-toggle="modal" data-target="#preview" data-placement="top" title="Preview artikel">
                        <i class="fa fa-eye fa-fw"></i>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Simpan dan kemaskini artikel">
                        <i class="fa fa-save fa-fw text-success"></i>
                    </button>
                </div>
                <!--
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-sm" data-dpp-action="publish" data-toggle="tooltip" data-placement="top" title="Kemaskini dan paparkan artikel ke website">
                        <i class="fa fa-check-square-o fa-fw text-primary"></i>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-sm" data-dpp-action="unpublish" data-toggle="tooltip" data-placement="top" title="Kemaskini dan tarik paparan artikel daripada website">
                        <i class="fa fa-level-down fa-fw text-warning"></i>
                    </button>
                </div>
                -->
                @if(isset($article))
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-sm" data-dpp-action="trash" data-toggle="tooltip" data-placement="top" title="Padam artikel ini">
                        <i class="fa fa-trash-o fa-fw text-danger"></i>
                    </button>
                </div>
                @endif
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        @if(isset($article) && $article->is_publish)
                            <i class="fa fa-check-square-o fa-fw publishing"></i>
                        @else
                            <i class="fa fa-square-o fa-fw publishing"></i>
                        @endif
                        Papar
                    </div>
                </div>
                <div class="col-sm-8">
                    <input type="hidden" name="images" value="{{ $article->images or asset('images/article-icon.jpg') }}" />
                    <img id="thumbnail" src="{{ $article->images or asset('images/article-icon.jpg') }}" class="img-responsive img-thumbnail" />
                    <button type="button" class="btn btn-primary btn-sm btn-block imageButtonSelector" data-loadURL="{{ url('administrator/document') }}"><i class="fa fa-check fa-fw"></i></button>
                </div>
            </div>
            <hr />
            <div class="form-group">
                <textarea class="form-control" name="subject" required placeholder="Tajuk artikel" rows="4">{{ $article->subject or '' }}</textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="url" value="{{ $article->urls or '' }}" required placeholder="URL" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="tags" placeholder="Tags" value="{{ (isset($article))? implode(', ',$article->tags->lists('tag_name')->all()) : '' }}" />
            </div>
            <div class="form-group">
                <textarea class="form-control" name="snippet" required placeholder="Snippet" rows="6">{{ $article->snippet or '' }}</textarea>
            </div>
        </div>
    {!! Form::close() !!}
</div>