function s() {
    var i = document.getElementById('password3').value;
    var j = document.getElementById('password1').value;
    if (i.length < 4 || j.length < 4) {
        document.getElementById('change_pw').disabled = true;
    } else {
        document.getElementById('change_pw').disabled = false;
    }
}

function ss_() {
    var n = document.getElementById('foto').files.item(0).name;
    if (n.value == "") {
        document.getElementById('change_profil').disabled = true;
    } else {
        document.getElementById('change_profil').disabled = false;
    }
}

function s_() {
    var u = document.getElementById('username');
    var ue = document.getElementById('username_');
    var t = document.getElementById('tempat_lahir');
    var te = document.getElementById('tempat_lahir_');
    var nl = document.getElementById('nama_lengkap');
    var nle = document.getElementById('nama_lengkap_');
    var a = document.getElementById('alamat');
    var ae = document.getElementById('alamat_');
    var k = document.getElementById('kodepos');
    var ke = document.getElementById('kodepos_');
    if (u.value == ue.value && t.value == te.value && nl.value == nle.value && a.value == ae.value && k.value == ke.value) {
        document.getElementById('change_profil').disabled = true;
    } else {
        document.getElementById('change_profil').disabled = false;
    }
}