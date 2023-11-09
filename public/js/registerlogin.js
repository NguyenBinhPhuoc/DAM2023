var register = document.getElementById("register");
var register1 = document.querySelectorAll(".auth-form__switch-btn")[1];
var login = document.getElementById("login");
var login1 = document.querySelectorAll(".auth-form__switch-btn")[0];
var back = document.querySelectorAll(".btn--normal");
var modalOverlay = document.querySelector(".modal__overlay");
var btnSubmit = document.querySelectorAll(".btn--submit")[0];
var btnSubmit1 = document.querySelectorAll(".btn--submit")[1];
let formValidation = document.querySelectorAll(".auth-form__input");

var a = document.getElementsByClassName('auth-form__switch-btn');


formValidation.forEach((e) => {
  e.addEventListener("mousedown", (event) => {
    var deleteBlock = event.target.nextElementSibling;
    deleteBlock.classList.remove("block");
  });
});

btnSubmit1.addEventListener("click", () => {
  let formValidation3 = document.querySelectorAll(".auth-form__input")[3];
  let formValidation4 = document.querySelectorAll(".auth-form__input")[4];
  let require3 = document.querySelectorAll(".require")[3];
  let require4 = document.querySelectorAll(".require")[4];
  if (formValidation3.value == "") {
    require3.classList.add("block");
  }
  if (formValidation4.value == "") {
    require4.classList.add("block");
  }
});

btnSubmit1.addEventListener("click", () => {
  let formValidation3 = document.querySelectorAll(".auth-form__input")[3];
  let formValidation4 = document.querySelectorAll(".auth-form__input")[4];
  let register = document.getElementById("register");
  let login = document.getElementById("login");
  let logined = document.getElementById("logined");
  let modal = document.querySelector(".modal");
  let modalOverlay = document.querySelector(".modal__overlay");
  let authForm = document.querySelector(".auth-form");
  let authForm1 = document.querySelectorAll(".auth-form")[1];
  if (formValidation3.value == "abc" && formValidation4.value == "123") {
    register.setAttribute("style", "display: none");
    login.setAttribute("style", "display: none");
    logined.setAttribute("style", "display: inline-flex");
    modal.classList.remove("active__flex");
    modalOverlay.classList.remove("active");
    authForm.classList.remove("active");
    authForm1.classList.remove("active");
  }
});

btnSubmit.addEventListener("click", () => {
  let formValidation = document.querySelectorAll(".auth-form__input")[0];
  let formValidation1 = document.querySelectorAll(".auth-form__input")[1];
  let formValidation2 = document.querySelectorAll(".auth-form__input")[2];
  let require = document.querySelectorAll(".require")[0];
  let require1 = document.querySelectorAll(".require")[1];
  let require2 = document.querySelectorAll(".require")[2];
  if (formValidation.value == "") {
    require.classList.add("block");
  }
  if (formValidation1.value == "") {
    require1.classList.add("block");
  }
  if (formValidation2.value == "") {
    require2.classList.add("block");
  }
});

modalOverlay.addEventListener("click", () => {
  let modal = document.querySelector(".modal");
  let modalOverlay = document.querySelector(".modal__overlay");
  let authForm = document.querySelector(".auth-form");
  let authForm1 = document.querySelectorAll(".auth-form")[1];
  modal.classList.remove("active__flex");
  modalOverlay.classList.remove("active");
  authForm.classList.remove("active");
  authForm1.classList.remove("active");
});

back.forEach((e) => {
  e.addEventListener("click", () => {
    let modal = document.querySelector(".modal");
    let modalOverlay = document.querySelector(".modal__overlay");
    let authForm = document.querySelector(".auth-form");
    let authForm1 = document.querySelectorAll(".auth-form")[1];
    modal.classList.remove("active__flex");
    modalOverlay.classList.remove("active");
    authForm.classList.remove("active");
    authForm1.classList.remove("active");
  });
});

register.addEventListener("click", () => {
  let modal = document.querySelector(".modal");
  let modalOverlay = document.querySelector(".modal__overlay");
  let authForm = document.querySelector(".auth-form");
  let authForm1 = document.querySelectorAll(".auth-form")[1];
  modal.classList.add("active__flex");
  modalOverlay.classList.add("active");
  authForm.classList.add("active");
  authForm1.classList.remove("active");
});

register1.addEventListener("click", () => {
  let modal = document.querySelector(".modal");
  let modalOverlay = document.querySelector(".modal__overlay");
  let authForm = document.querySelector(".auth-form");
  let authForm1 = document.querySelectorAll(".auth-form")[1];
  modal.classList.add("active__flex");
  modalOverlay.classList.add("active");
  authForm.classList.add("active");
  authForm1.classList.remove("active");
});

login.addEventListener("click", () => {
  let modal = document.querySelector(".modal");
  let modalOverlay = document.querySelector(".modal__overlay");
  let authForm1 = document.querySelectorAll(".auth-form")[1];
  let authForm = document.querySelectorAll(".auth-form")[0];
  modal.classList.add("active__flex");
  modalOverlay.classList.add("active");
  authForm.classList.remove("active");
  authForm1.classList.add("active");
});

login1.addEventListener("click", () => {
  let modal = document.querySelector(".modal");
  let modalOverlay = document.querySelector(".modal__overlay");
  let authForm1 = document.querySelectorAll(".auth-form")[1];
  let authForm = document.querySelectorAll(".auth-form")[0];
  modal.classList.add("active__flex");
  modalOverlay.classList.add("active");
  authForm.classList.remove("active");
  authForm1.classList.add("active");
});
