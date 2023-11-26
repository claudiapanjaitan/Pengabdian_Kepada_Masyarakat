$("body").on("contextmenu", "img", function(e) {
    return false;
});
function auth_content(cont) {
    $('#login_page').hide();
    $('#register_page').hide();
    $('#forgot_page').hide();
    $('#' + cont).show();
}
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#form_login").on('keydown', 'input', function(event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-login'));
        var val = $($this).val();
        if (val == 1) {
            $('[data-login="' + (index + 1).toString() + '"]').focus();
        } else {
            $('#tombol_login').trigger("click");
        }
    }
});
$("#email").focus();
function handle_post(tombol,form,url,title){
    $(tombol).prop("disabled", true);
    $(tombol).html("Mohon Tunggu");
    $.post(url, $(form).serialize(), function(result) {
        if (result.alert == "success") {
            Swal.fire({ text: result.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } }).then(function() {
                if(result.callback){
                    location.href = result.callback;
                }else if(result.login){
                    auth_content(result.login);
                }
            });
        }else{
            setTimeout(function () {
                $(tombol).prop("disabled", false);
                $(tombol).html(title);
            }, 1000);
            Swal.fire({ text: result.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
        }
        $(tombol).prop("disabled", false);
        $(tombol).removeAttr("data-kt-indicator");
    }, "json");
}