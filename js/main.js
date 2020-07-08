document.getElementById('inscription').style.display = "none";
document.getElementById('login').style.display = "none";

// Variable connexion : correspond à la div du Login.
let connexion = document.getElementById('login');

// Variable inscription : correspond à la div Sign up / Inscription.
let inscription = document.getElementById('inscription');

// Variable connexion_btn : correspond au button dans le menu 'Se connecter'.
let connexion_btn = document.getElementById('login_btn');

// Variable inscription_btn : corrrespond au button dans le menu 'Créer un compte'.
let inscription_btn = document.getElementById('signUp_btn');

let btn = document.getElementById('button');
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];

connexion_btn.onclick = function(){
    connexion.style.display = "flex";
}
inscription_btn.addEventListener("click", function(){
    inscription.style.display = "flex";
})

span.onclick = function() {
    connexion.style.display = "none";
}

span2.onclick = function() {
    inscription.style.display = "none";
}