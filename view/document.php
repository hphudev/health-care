<!-- Nạp dữ liệu -->
<script type="text/javascript">
    Swal.fire({
        // icon: "info",
        title: "Đang tải trang",
        // text: "Bạn vui lòng đợi nhé!",
        timer: 1000
    });
    Swal.showLoading();
</script>
<h2 class="text-info" style="width: 200px;">QUẢN LÝ BÀI VIẾT</h2>
<hr style="margin-bottom: 50px;">
<div class="container d-flex justify-content-center flex-column text-center" style="padding-left: 10%; padding-right: 10%;">
    <div class="" style="display:flex; position: absolute; top: 5%; right:0%; margin-top: 20px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
    </div>
    <h1>Viết bài</h1>
    <p class="fs-2">Mỗi bài viết của bạn sẽ góp một phần công sức vì sức khỏe người Việt</p>
    <div class="input-group mb-3">
        <span class="input-group-text fs-2" style="width: 15%;" id="basic-addon1">Tiêu đề bài viết</span>
        <input id="headerArticle" type="text" class="form-control fs-3" placeholder="Nhập tiêu đề bài viết" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group flex-wrap mb-3">
        <span class="input-group-text fs-2" id="basic-addon1">Mô tả</span>
        <input id="describeArticle" type="text" class="form-control fs-3" placeholder="Nhập mô tả bài viết" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="btn-group dropend">
        <button id="btnTopic" type="button" class="btn btn-danger dropdown-toggle fs-3" style="max-width: 200px;" data-bs-toggle="dropdown" aria-expanded="false">Chủ đề</button>
        <ul class="dropdown-menu fs-3 text-light" style="background-color:linen;">
            <li><a class="topicArticle dropdown-item">Sức khỏe</a></li>
            <li><a class="topicArticle dropdown-item">Đời sống</a></li>
            <li><a class="topicArticle dropdown-item">Dược phẩm</a></li>
            <li><a class="topicArticle dropdown-item">Sơ cấp cứu</a></li>
        </ul>
    </div>
    <textarea id="editor" name="editor" rows="10" cols="80">
    </textarea>

    <script type="text/javascript">
        config = {};
        config.entities_latin = false;
        config.language = 'vi';
        config.bodyClass = 'document-editor';
        config.title = '';
        // config.width = 940;
        config.height = 400;
        config.extraPlugins = 'lineheight';
        config.line_height = "0.7px; 0.9px; 1.1px; 1.3px; 1.5px";
        
        var editor = CKEDITOR.replace( 'editor', config);
        CKFinder.setupCKEditor( editor );
        // These styles are used to provide the "page view" display style like in the demo and matching styles for export to PDF.
        CKEDITOR.addCss(
				'body.document-editor { margin: 0.5cm auto; border: 1px #D3D3D3 solid; border-radius: 5px; background: white; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); }' +
				'body.document-editor, div.cke_editable { width: 700px; padding: 1cm 2cm 2cm; min-height: 700px} ' +
				'body.document-editor table td > p, div.cke_editable table td > p { margin-top: 0; margin-bottom: 0; padding: 4px 0 3px 5px;} ' +
				'blockquote { font-family: sans-serif, Arial, Verdana, "Trebuchet MS", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; } ' );
        
        CKEDITOR.on('instanceCreated', function(event) {
            var editor = event.editor;
            editor.on('instanceReady', function(e) {
                $(e.editor.element.$).removeAttr("title");
            });
        });

        // config.contentsCss = '../css/asset/ckeditor.css';
        // config.extraPlugins = "lineheight";
        // config.exportPdf_options = {
        // header_html: '<div class="styled">Header content</div>',
        // footer_html: '<div class="styled-counter"><span class="pageNumber"></span></div>',
        // header_and_footer_css: '.styled { font-weight: bold; padding: 10px; } .styled-counter { font-size: 1em; color: hsl(0, 0%, 60%); }',
        // margin_top: '5cm',
        // margin_bottom: '2cm'}
        // config.extraPlugins = 'tableresize';
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        // Using an 'Export to PDF' plugin to generate PDF.

        // CKEDITOR.plugins.print = {
        //     exec: function( editor ) {
        //         editor.execCommand( 'exportPdf' );
        //     }
        // };
        // CKEDITOR.plugins.setLang('lineheight','vi', {
        //     title: 'Line Height'
        // } );
    </script>
    <div class="" style="display:flex; position: relative; right: 3%; margin-top: 20px; margin-left: 94%; margin-bottom: 10%">
        <!-- <button type="button" class="btn btn-outline-dark fs-4" style="margin-right: 20px; min-width: 100px; border-radius: 20px; font-weight: 700">Xuất bài</button> -->
        <button id="btnSendArticle" type="button" class="btn btn-outline-success fs-4" style="min-width: 100px; border-radius: 20px; font-weight: 700">Gửi bài</button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg fs-3">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    setTimeout(() => {
        Swal.close();
    }, 250);
</script>


    
