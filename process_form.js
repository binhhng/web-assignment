var form_1 = document.querySelector("#form-1");
var form_2 = document.querySelector("#form-2");
var form_3 = document.querySelector("#form-3");
var overlay = document.querySelector(".overlay");
var btnRegis = document.querySelector(".register");
var btnLogin = document.querySelector(".login");
var btnLogout = document.querySelector(".logout");
var divUser = document.querySelector(".username");
var cartLogin = document.getElementById("cartLogin");
if (btnRegis) {
    btnRegis.onclick = function() {
        form_1.classList.add('visible');
        overlay.classList.add('visible');
    }
}
if (cartLogin) {
    cartLogin.onclick = function() {
        form_2.classList.add('visible');
        overlay.classList.add('visible');
    }
}
if (btnLogin) {
    btnLogin.onclick = function() {
        form_2.classList.add('visible');
        overlay.classList.add('visible');
    }
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
        overlay.classList.add('hide');
    }
}