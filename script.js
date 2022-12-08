var i = 0;
var txt = '   Welcome To  Knowledge-HUB...... ';
var speed = 150;

function typeWriter() 
{
  if (i < txt.length) {
    document.getElementById("welcome").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}

typeWriter();

// Get the modal
var modal = document.getElementById('signupform');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) 
{
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Get the modal
var modal = document.getElementById('loginform');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// logic for calculator
let display = document.getElementById('display');
let buttons = Array.from(document.getElementsByClassName('button'));

buttons.map(button =>{
button.addEventListener('click',(e)=>{
    switch(e.target.innerText){
        case 'C':
            display.innerText = '';
            break;
        case '=':
            try{
                display.innerText = eval(display.innerText);
            } catch {
                display.innerText = "Error"
            }
            break;
        case '←':
            if (display.innerText){
               display.innerText = display.innerText.slice(0, -1);
            }
            break;
        default:
            display.innerText += e.target.innerText;
    }
     });
});

// services visbililty based on users choice logic

function services()
{
    var x=document.getElementById('services').value;
    if(x=='calculator')
    {
        document.getElementById('calc').style.display='block';
        document.getElementById('calc').style.zIndex=1;
    }
    if(x=='services')
    {
        document.getElementById('calc').style.display='none';
    }
}



function sendMail() 
{
  alert("OTP  been sent to your registered email id !");
}



function next()
{

  sendMail();
  // window.location.href = "about.html";
  location.replace("localhost/about.html");
}

function books() {
  // window.location.href = "books.html";
  location.replace("localhost/books.html");
}

function login()
{
  document.getElementById('loginform').style.display = 'block';
  document.getElementById('signupform').style.display = 'none';
}

function signup() 
{
  document.getElementById('loginform').style.display = 'none';
  document.getElementById('signupform').style.display = 'block';
}

// var x=document.getElementById('lusername').value;
// document.getElementById("welcome").innerHTML="Hello "+x;


// drop down menu in books page
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (e) 
{
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}


// JavaScript code fro searching a book by author or title etc..
function search_book() 
{
  let input = document.getElementById('search').value
  input = input.toLowerCase();
  let x = document.getElementsByClassName('content');

  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input))
    {
      x[i].style.display = "none";
    }
    else
    {
      x[i].style.display = "library-item";
    }
  }
}



// JavaScript code fro searching a Course by Type or Name etc..
function search_course() {
  let input = document.getElementById('search').value
  input = input.toLowerCase();
  let x = document.getElementsByClassName('content');

  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      x[i].style.display = "none";
    }
    else {
      x[i].style.display = "course-item";
    }
  }
}
