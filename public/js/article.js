$(document).ready(function() {

    //Add active navigation class
    $('.topnavigation li:first').addClass('active');

    //add tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $('.preview-button').tooltip();

    //Autosize init
    autosize($('[name="markdowneditor"]'));

    //Tags selectize init
    $('[name="tags"]').selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });

    //Refocus markdown editor after closing document list modal
    $('#documentList').on('hidden.bs.modal', function(e) {
        $('[name="markdowneditor"]').focus();
    });

    //Toolbar shortcut function
    $('.markdown-shortcut').click(function() {

        //Textarea element
        var el = $('[name="markdowneditor"]');

        //Get current caret position in textarea
        var caretPosition = el.getCursorPosition();

        //Define data to be inject
        var toBeInject = $(this).attr('data-inject');
        var options = $(this).attr('data-options');

        //Options : Erase textarea
        if(options == 'DELETE') {
            var text = "";
            var caretFocusPosition = 0;

            //Update latest value to textarea, assign new caret position and focus the textarea auto
            el.val(text).selectRange(caretFocusPosition).focus();

            //Update the textarea size
            autosize.update(el);
        }
        //Options : Generate links
        else if(options == 'LINKS') {

            //Will be change to using default modal
            bootbox.dialog({
                title: 'Perkataan dan URL',
                message: '<div class="form-group"><input type="text" name="linkPerkataan" class="form-control input-sm" placeholder="Perkataan" /></div>' +
                '<div class="form-group"><input type="text" name="linkUrl" class="form-control input-sm" placeholder="URL" /></div>',
                buttons: {
                    primary: {
                        label: 'Cipta',
                        className: 'btn-primary btn-sm',
                        callback: function() {
                            //Generate the injector string to the textarea value
                            var text = el.val().substring(0, caretPosition) + '[' + $('[name="linkPerkataan"]').val() + '](http://' + $('[name="linkUrl"]').val() + '/)' + el.val().substring(caretPosition);

                            //Update latest value to textarea, assign new caret position and focus the textarea auto
                            el.val(text).selectRange(caretPosition).focus();

                            //Update the textarea size
                            autosize.update(el);
                        }
                    }
                }
            })

        }
        //Options : Document selector
        else if(options == 'DOKUMEN') {

            //Show the modal
            $('#documentList').modal('show');

            //Query to server list of files
            $.ajax({
                url: $(this).attr('data-loadURL'),
                method: 'GET',
                success: function(data) {

                    var injectDocumentList = '';
                    var index;

                    //Generate the HTML
                    for(index = 0; index < data.length; index++) {

                        if(index % 6 == 0)
                            injectDocumentList = injectDocumentList + '<div class="row" style="display: flex; ">'

                        injectDocumentList = injectDocumentList + '<div class="col-xs-2">' +
                        '<a href="' + data[index] + '" data-lightbox="documents">' +
                        '<img src="' + data[index] + '" class="img-responsive img-thumbnail" style="display: block;margin-left: auto;margin-right: auto;" />' +
                        '</a>' +
                        '<hr />' +
                        '<div style="position: absolute; bottom: 0; left: 15px; width: 91%;">' +
                        '<button type="button" class="btn btn-success btn-xs btn-block selectThisImage" data-dismiss="modal" data-imageUrl="' + data[index] + '">' +
                        '<i class="fa fa-check fa-fw"></i>' +
                        '</button>' +
                        '</div>' +
                        '</div>';

                        if(index % 6 == 5)
                            injectDocumentList = injectDocumentList + '</div><hr />';

                    }

                    if(index % 6 != 5) {
                        injectDocumentList = injectDocumentList + '</div>';
                    }

                    //Inject HTML code to modal body
                    $('#senaraiDokumen').html(injectDocumentList);

                    //When click image selector button
                    $('.selectThisImage').click(function() {

                        //Generate the injector string to the textarea value
                        var text = el.val().substring(0, caretPosition) + '![](' + $(this).attr('data-imageUrl') + ')' + el.val().substring(caretPosition);

                        //Update latest value to textarea, assign new caret position and focus the textarea auto
                        el.val(text).selectRange(caretPosition + 2);

                        //Update the textarea size
                        autosize.update(el);
                    });

                }
            });
        }
        //Defaults
        else {
            //Define after caret position
            var caretFocusPosition = parseInt(caretPosition) + parseInt((toBeInject.search(/CPST/g) == -1)? 0 : toBeInject.search(/CPST/g));

            //Replace caret position tracker from injector string, convert , to new line, convert ~ to tabs
            toBeInject = toBeInject.replace('CPST', '').replace(/,/g, "\r\n").replace(/~/g, "\t");

            //Generate the injector string to the textarea value
            var text = el.val().substring(0, caretPosition) + toBeInject + el.val().substring(caretPosition);

            //Update latest value to textarea, assign new caret position and focus the textarea auto
            el.val(text).selectRange(caretFocusPosition).focus();

            //Update the textarea size
            autosize.update(el);
        }
    });

    //When tab was press, Prevent any default action
    $('[name="markdowneditor"]').keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            //Get caret position/selection
            var start = this.selectionStart;
            var end = this.selectionEnd;

            var $this = $(this);
            var value = $this.val();

            //Set textarea value to: text before caret + tab + text after caret
            $this.val(value.substring(0, start) + "\t" + value.substring(end));

            // put caret at right position again (add one for the tab)
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            e.preventDefault();
        }
    });

    //Publish or unpublish checkbox
    $('.publishing').click(function() {
        if($('[name="is_publish"]').val() == 1) {
            $('[name="is_publish"]').val(0);
            $(this).removeClass('fa-check-square-o').addClass('fa-square-o');
        }
        else {
            $('[name="is_publish"]').val(1);
            $(this).removeClass('fa-square-o').addClass('fa-check-square-o');
        }
    });

    $('.imageButtonSelector').click(function() {

        //Show the modal
        $('#imageSelector').modal('show');

        //Query to server list of files
        $.ajax({
            url: $(this).attr('data-loadURL'),
            method: 'GET',
            success: function(data) {

                var injectDocumentList = '';
                var index;

                //Generate the HTML
                for(index = 0; index < data.length; index++) {

                    if(index % 6 == 0)
                        injectDocumentList = injectDocumentList + '<div class="row" style="display: flex; ">'

                    injectDocumentList = injectDocumentList + '<div class="col-xs-2">' +
                    '<a href="' + data[index] + '" data-lightbox="documents">' +
                    '<img src="' + data[index] + '" class="img-responsive img-thumbnail" style="display: block;margin-left: auto;margin-right: auto;" />' +
                    '</a>' +
                    '<hr />' +
                    '<div style="position: absolute; bottom: 0; left: 15px; width: 91%;">' +
                    '<button type="button" class="btn btn-success btn-xs btn-block assignAsThumbnail" data-dismiss="modal" data-imageUrl="' + data[index] + '">' +
                    '<i class="fa fa-check fa-fw"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>';

                    if(index % 6 == 5)
                        injectDocumentList = injectDocumentList + '</div><hr />';

                }

                if(index % 6 != 5) {
                    injectDocumentList = injectDocumentList + '</div>';
                }

                //Inject HTML code to modal body
                $('#pilihangambar').html(injectDocumentList);

                //When click image selector button
                $('.assignAsThumbnail').click(function() {
                    $('#thumbnail').attr('src', $(this).attr('data-imageUrl'))
                    $('[name="images"]').val($(this).attr('data-imageUrl'));
                });

            }
        });

    });

});

//Delete?
$('[data-dpp-action="trash"]').click(function() {
    $('[name="_method"]').val('DELETE');
    $('[name="articlesform"]').submit();
});

//Update markdown preview content
var updateMarkdown = function() {
    $('#preview_markdown').html(marked($('[name="markdowneditor"]').val()));
    Prism.highlightElement($('#preview_markdown')[0]);
};
//# sourceMappingURL=article.js.map
