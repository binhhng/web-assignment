var form_1 = document.querySelector("#form-1");
var form_2 = document.querySelector("#form-2");
var overlay = document.querySelector(".overlay");
var btnRegis = document.querySelector(".register");
var btnLogin = document.querySelector(".login");
var btnLogout = document.querySelector(".logout");

btnRegis.onclick = function() {
    form_1.classList.add('visible');
    overlay.classList.add('visible');
}
btnLogin.onclick = function() {
    form_2.classList.add('visible');
    overlay.classList.add('visible');
}
overlay.onclick = function() {
    if (form_1.classList.contains('visible')) {
        form_1.classList.remove('visible');
    }
    if (form_2.classList.contains('visible')) {
        form_2.classList.remove('visible');
    }
    if (overlay.classList.contains('visible')) {
        overlay.classList.remove('visible');
    }
}
btnLogout.onclick = function() {
    $.ajax({
        type: 'POST',
        url: 'logout.php',
        dataType: "json",
        data: {},
        success: function(data) {
            //validating data output from server
            if (data.code == '200') {
                alert(data.alert);
                var btnRegis = document.querySelector(".register");
                var btnLogin = document.querySelector(".login");
                var btnLogout = document.querySelector(".logout");
                var btnUser = document.querySelector(".username");
                btnRegis.classList.add('visible');
                btnLogin.classList.add('visible');
                btnLogout.classList.remove('visible');
                btnLogout.classList.add('hide');
                btnUser.innerText = '';
            }

        }
    });
}