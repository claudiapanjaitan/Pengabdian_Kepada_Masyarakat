let page;

function main_content(cont) {
    $('#content_list').hide();
    $('#content_input').hide();
    $('#content_detail').hide();
    $('#' + cont).show();
}
$(document).ready(function(){
    $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page)
    {
        $.ajax({
        url:"?page="+page,
        success:function(data){
            $('#list_result').html(data);
        }
        });
    }
});
$(window).on('hashchange', function () {
    if (window.location.hash) {
        page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            load_list(page);
        }
    }
});

function load_list(page) {
    $.get('?page=' + page, $('#content_filter').serialize(), function (result) {
        $('#list_result').html(result);
        main_content('content_list');
    }, "html");
}

function load_input(url) {
    $.get(url, {}, function (result) {
        $('#content_input').html(result);
        main_content('content_input');
    }, "html");
}


function handle_confirm(url) {
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Confirmation',
        content: 'Are you sure want to confirm this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function () {
                    $.ajax({
                        type: "PATCH",
                        url: url,
                        dataType: "json",
                        success: function (response) {
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                            } else {
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            No: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}

function handle_delete(url) {
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Delete Confirmation',
        content: 'Are you sure want to delete this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function () {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        dataType: "json",
                        success: function (response) {
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                                load_cart(localStorage.getItem("route_cart"));
                            } else {
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            No: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}

function obj_quill(obj) {
    var quill = new Quill('#' + obj, {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Type your text here...',
        theme: 'snow' // or 'bubble'
    });
    quill.on('text-change', function (delta, oldDelta, source) {
        document.querySelector("textarea[name='" + obj + "']").value = quill.root.innerHTML;
    });
}

function obj_dropzone(obj,route, amount){
    var uploadedDocumentMap = {}
    var myDropzone = new Dropzone("#"+obj, {
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route, // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: amount,
        maxFilesize: amount, // MB
        addRemoveLinks: true,
        success: function(file, response) {
            $('form').append('<input type="hidden" name="'+obj+'[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name;
            success_toastr('File Uploaded');
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="' + obj + '[]"][value="' + name + '"]').remove()
        },
        init: function () {
            this.on("maxfilesexceeded", function (file) {
                error_toastr("Maksimal File Upload " + amount + " File");
            });
        }
    });
}

function handle_destroy(url) {
    $.ajax({
        type: "DELETE",
        url: url,
        dataType: "json",
        success: function (response) {
            if (response.alert == "success") {
                success_toastr(response.message);
                load_list(1);
                load_cart(localStorage.getItem("route_cart"));
            } else {
                error_toastr(response.message);
                load_list(1);
            }
        },
    });
}

function handle_like(url) {
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        success: function (response) {
            if (response.alert == "success") {
                success_toastr(response.message);
                load_list(1);
            } else {
                error_toastr(response.message);
                load_list(1);
            }
        },
    });
}

function handle_save(tombol, form, url, method, title) {
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $(tombol).prop("disabled", true);
            $(tombol).html("Please wait");
        },
        success: function (response) {
            if (response.alert == "success") {
                success_toastr(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html(title);
                    main_content('content_list');
                    load_list(1);
                }, 2000);
            } else {
                error_toastr(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html(title);
                }, 2000);
            }
        },
    });
}

function handle_upload(tombol, form, url, method, title) {
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $(tombol).html("Please Wait");
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (response) {
                if (response.alert == "success") {
                    success_toastr(response.message);
                    $(form)[0].reset();
                    setTimeout(function () {
                        if (response.redirect) {
                            location.href = response.redirect;
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        main_content('content_list');
                        load_list(1);
                    }, 2000);
                } else {
                    error_toastr(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
