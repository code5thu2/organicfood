tinymce.init({
    selector: 'textarea#content',
    // theme : "advanced",
    height: 350,
    width: "",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
    ],
    toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code",
    toolbar2: "styleselect formatselect fontselect fontsizeselect",
    image_advtab: true,
    menubar: false,
    code_dialog_height: 400,
    encoding: 'html',
    entity_encoding: 'raw', //Sửa lỗi khi hiển thị code có dấu tiếng việt
    schema: 'html5',
    toolbar_items_size: 'small',
    relative_urls: false,
    cleanup_on_startup: false,
    trim_span_elements: false,
    verify_html: false,
    cleanup: false,
    convert_urls: false,
    element_format: 'html',
    remove_script_host: false,
    force_br_newlines: true,
    force_p_newlines: false,
    forced_root_block: '',
    filemanager_title: "Quản lý ảnh",
    external_filemanager_path: base_url() + "/file/",
    external_plugins: {
        "filemanager": base_url() + "/file/plugin.min.js",
    },
    filemanager_access_key: akey(),
});
