document.getElementById('inscription').style.display = "none";

let modal = document.getElementById('login');
let btn = document.getElementById('button');
let span = document.getElementById('close');

btn.addEventListener('click',(e) => {
    modal.style.display = "block";
})
span.addEventListener('click',(e) => {
    modal.style.display = "none";
}g)
