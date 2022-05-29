const createForm = document.querySelector('#formCreate'),
      nome = createForm.querySelector('#nome'),
      prezzo = createForm.querySelector('#prezzo'),
      citta = createForm.querySelector('#citta'),
      indirizzo = createForm.querySelector('#indirizzo');
      descrizione = createForm.querySelector('#descrizione');
      textErr = createForm.querySelector('#textErr');

      createForm.querySelector("#btnCreate").addEventListener("click", validazione);

function validazione(event){


    let err = false;
    if(nome.value == ""){
        createForm.classList.add('error');
        err = true;
        
        event.preventDefault();
    }

    if(prezzo.value == "" || isNaN(prezzo.value)){
        createForm.classList.add('error');
        err = true;
        event.preventDefault();
    }

    if(citta.value == ""){
        createForm.classList.add('error');
        err = true;
        event.preventDefault();
    }

    if(indirizzo.value == ""){
        createForm.classList.add('error');
        err = true;
        event.preventDefault();
    }

    if(descrizione.value == ""){
        createForm.classList.add('error');
        err = true;
        event.preventDefault();
    }

    if(err){
        textErr.textContent = "Inserire tutti i dati correttamente";
    }else{

        textErr.textContent = "";
    }
    
}