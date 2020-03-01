console.log("Connected!");

// document.addEventListener('DOMContentLoaded', function() {
//   var elems = document.querySelectorAll('.collapsible');
//   var instances = M.Collapsible.init(elems, accordion);
// });

// Or with jQuery

$(document).ready(function(){
  $('.collapsible').collapsible();
});

// $(document).ready(function(){
//   $('#doneBtn').parent.addClass('stike');
// });

const pw1 = document.getElementById('pw1');
const pw2 = document.getElementById('pw2');
const message = document.getElementById('message');
const regBtn = document.getElementById('regBtn');
const search = document.getElementById('search');
const searchBtn = document.getElementById('searchBtn');


let check = function() {
  if (pw1.value == 0){
    document.getElementById('message').innerText = '';
  }
  else if (pw1.value == pw2.value) {
    message.style.color = 'green';
    message.innerText = 'Passwords are matching';
  } else {
    message.style.color = 'red';
    message.innerText = 'Passwords are not matching';
  }
}

let enableReg = function () {
  if (pw1.value == pw2.value && pw1.value.length >= 8) {
    regBtn.disabled = false;
  }
}

let disableReg = function () {
  if (pw1.value != pw2.value || pw1.value.length < 8 || pw1.value.length < 8) {
    regBtn.disabled = true;
  }
}

let enableSearch = function () {
  if (search.value.length > 0) {
    searchBtn.disabled = false;
  }
}

let disableSearch = function () {
  if (search.value.length < 1) {
    searchBtn.disabled = true;
  }
}