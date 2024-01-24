document.getElementById('form').addEventListener('submit',function(e){
    e.preventDefault();

   

    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const pseudo = document.getElementById('pseudo').value;
    const email = document.getElementById('email').value;
    const mdp = document.getElementById('mdp').value;

    let nomOK = true;
    let prenomOK = true;
    let pseudoOK = true;
    let emailOK = true;

    if (nom.length < 2) {
        nomOK = false;
            document.getElementById('nomError').innerText = "le nom doit contenir au moins 2 caractères";
            document.getElementById('nomError').style.display = "block"; 
        
        }
    if (nom.length > 15) {
        nomOK = false;
            document.getElementById('nomError').innerText = "le nom doit contenir au maximum 15 caractères";
            document.getElementById('nomError').style.display = "block"; 
            
        }
    if (prenom.length < 2) {
        prenomOK = false;
            document.getElementById('prenomError').innerText = "le prénom doit contenir au moins 2 caractères";
            document.getElementById('prenomError').style.display = "block"; 
                
        }
    if (prenom.length > 15) {
        prenomOK = false;
            document.getElementById('prenomError').innerText = "le prénom doit contenir au maximum 15 caractères";
            document.getElementById('prenomError').style.display = "block"; 
                
        }
    if (pseudo.length < 2) {
        pseudoOK = false;
            document.getElementById('pseudoError').innerText = "le pseudo doit contenir au min 2 caractères";
            document.getElementById('pseudoError').style.display = "block"; 
                
        }
    if (pseudo.length > 15) {
        pseudoOK = false;
            document.getElementById('pseudoError').innerText = "le pseudo doit contenir au maximum 15 caractères";
            document.getElementById('pseudoError').style.display = "block"; 
                    
        }
    
    if (nomOK && prenomOK && pseudoOK){
        alert ('Le formulaire est valide')
    }

});
