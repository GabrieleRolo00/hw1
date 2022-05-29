/*-----PREF AJAX ------*/
const search_container = document.querySelector("#search_container");
const main = document.querySelector(".main");

aggiorna();


function aggiorna(){
  fetch("http://localhost/esercizi/hw1/curl_pref.php").then(onResponse).then(onJSON);
}

function onResponse(response)
{
  return response.json();
 
}

function onJSON(json){



  if(json.length==0){
    const indietro = document.createElement('div');
    indietro.classList.add('indietro')
    const simbolo_i = document.createElement('i');
    const text_indietro = document.createElement('h2');

    const text = document.querySelector('#title');
    text.textContent = "Non hai preferiti";
    
    simbolo_i.classList.add('bx');
    simbolo_i.classList.add('bx-chevron-left');
    text_indietro.textContent = 'Torna indietro';

    indietro.appendChild(simbolo_i);
    indietro.appendChild(text_indietro);

    main.appendChild(indietro);

    indietro.addEventListener('click',()=>{
      history.back();
    })
  }else
    for(casa of json){ 

    const card = document.createElement('div');
    const div_img = document.createElement('div');
    const link = document.createElement('a');
    const card_img = document.createElement('img');
    const card_data = document.createElement('div');
    const simbolo = document.createElement('span');
    const card_title = document.createElement('h3');
    const card_price = document.createElement('h3');
    const price = document.createElement('h3');
    const card_description = document.createElement('p');
    
    
    card_description.textContent = ""+casa.descrizione;
    card_description.classList.add('card_description');

    card_title.textContent = casa.nome;
    card_title.classList.add('card_title');

    card_price.classList.add('card_price');
    simbolo.textContent = "€";
    card_price.appendChild(simbolo);
    price.textContent = casa.prezzo;
    card_price.appendChild(price);

    card_data.appendChild(card_title);
    card_data.appendChild(card_price);
    card_data.appendChild(card_description);
    card_data.classList.add('card_data');

    card_img.src = casa.img;
    card_img.classList.add('card_img');

    div_img.appendChild(card_img);
    div_img.classList.add('div_img');

    link.href = "post.php?img="+casa.img+"&prezzo="+casa.prezzo+"&title="+casa.nome+"&descrizione="+casa.descrizione+"&indirizzo="+casa.indirizzo+"&id="+casa.id_casa+"";

    link.appendChild(div_img);
    link.appendChild(card_data);
    card.appendChild(link);
    
    card.classList.add('card');

    search_container.appendChild(card);

  }
}

