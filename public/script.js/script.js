const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

menuToggle.addEventListener('click',function(){
nav.classList.toggle('slide');
});

document.addEventListener("DOMContentLoaded", function () {
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        var navbar = document.getElementById("mainNav");

        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.style.backgroundColor = "#000000"; 
            navbar.style.padding = "20px";
            navbar.h3.style.color = "#898989"
        } else {
            navbar.style.backgroundColor = "transparent";
            navbar.h3.style.color = "#898989";
        }
    }
});