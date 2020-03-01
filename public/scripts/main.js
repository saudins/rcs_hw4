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

let enable = function () {
  if (pw1.value == pw2.value && pw1.value.length >= 8 && pw2.value.length) {
    regBtn.disabled = false;
  }
}

enable();