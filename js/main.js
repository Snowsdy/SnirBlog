document.getElementById('inscription').style.display = "none";

// Variable connexion : correspond à la div du Login.
let connexion = document.getElementById('login');

// Variable inscription : correspond à la div Sign up / Inscription.
let inscription = document.getElementById('inscription');

// Variable connexion_btn : correspond au button dans le menu 'Se connecter'.
let connexion_btn = document.getElementById('login_btn');

// Variable inscription_btn : corrrespond au button dans le menu 'Créer un compte'.
let inscription_btn = document.getElementById('signUp_btn');

let btn = document.getElementById('button');
let span = document.getElementById('close');

connexion_btn.onclick = function(){
    connexion.style.display = "flex";
}
inscription_btn.addEventListener("click", function () {
    inscription.style.display = "flex";
})