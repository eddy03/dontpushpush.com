<div class="modal fade bs-example-modal-lg" id="documentList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Senarai Dokumen</h4>
            </div>
            <div class="modal-body" id="senaraiDokumen"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-refresh fa-fw"></i> Lagi
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times fa-fw"></i> Tutup
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='# CPST #'>
            H1
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='## CPST ##'>
            H2
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='### CPST ###'>
            H3
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='#### CPST ####'>
            H4
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='##### CPST #####'>
            H5
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='###### CPST ######'>
            H6
        </button>
    </div>
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='<p class="text-left">,~CPST,</p>'>
            <i class="fa fa-align-left fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='<p class="text-center">,~CPST,</p>'>
            <i class="fa fa-align-center fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='<p class="text-justify">,~CPST,</p>'>
            <i class="fa fa-align-justify fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='<p class="text-right">,~CPST,</p>'>
            <i class="fa fa-align-right fa-fw"></i>
        </button>
    </div>
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='* CPST,* ,* '>
            <i class="fa fa-list-ul fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='1. CPST,2. ,3. '>
            <i class="fa fa-list-ol fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='\CPST'>
            <i class="fa fa-list-ol text-danger"></i><i class="fa fa-exclamation fa-fw text-danger"></i>
        </button>
    </div>
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='*CPST*'>
            <i class="fa fa-italic fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='**CPST**'>
            <i class="fa fa-bold fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='\CPST'>
            <i class="fa fa-italic text-danger"></i><i class="fa fa-exclamation fa-fw text-danger"></i>
        </button>
    </div>
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='<http://CPST.com/>'>
            <i class="fa fa-link fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='[CPST](http://dontpushpush.com/)' data-options="LINKS">
            <i class="fa fa-link fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='![CPST](http://dontpushpush.com/img.jpg/)' data-options="DOKUMEN" data-loadURL="{{ url('administrator/document') }}">
            <i class="fa fa-file-o fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='> CPST,> ,> ,> '>
            <i class="fa fa-quote-left fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject=',,* * *,,CPST'>
            <i class="fa fa-arrows-h fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='~CPST'>
            <i class="fa fa-code fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='````CPST,````'>
            <i class="fa fa-file-code-o fa-fw"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='`CPST`'>
            <i class="fa fa-code fa-fw text-danger"></i>
        </button>
        <button type="button" class="btn btn-default markdown-shortcut" data-inject='`` `CPST` ``'>
            <i class="fa fa-code text-danger"></i><i class="fa fa-exclamation fa-fw text-danger"></i>
        </button>
    </div>
    <div class="btn-group btn-group-sm" role="group" aria-label="...">
        <button type="button" class="btn btn-danger markdown-shortcut" data-inject='DELETE' data-options="DELETE">
            <i class="fa fa-eraser fa-fw"></i>
        </button>
    </div>
</div>