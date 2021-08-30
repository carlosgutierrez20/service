let cerrar = document.querySelectorAll(".close")[0];
let abrir = document.getElementsByClassName("cta")[0];
let modal = document.querySelectorAll(".modal")[0];
let modalc = document.querySelectorAll(".modal-content")[0];

abrir.addEventListener("click", function(e) {
    e.preventDefault();
    modalc.style.opacity = "1";
    modalc.style.visibility = "visible";
    modal.classList.toggle("modal-close");
});