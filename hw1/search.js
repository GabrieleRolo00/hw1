document.querySelector("form").addEventListener("submit", search);

function search(event){

  const form = document.querySelector("form");
    // Invia richiesta con POST
    const form_data = {method: 'post', body: new FormData(form)};

  fetch("http://localhost/esercizi/hw1/elabora_search.php",form_data).then(onResponse, onError).then(onJSON);

  event.preventDefault();
}

function onResponse(response)
{
  return response.json();
 
}

function onError(response){
  console.log(response);
}

function onJSON(json){


  search_container.innerHTML = "";
  ris.innerHTML = "";
  ris.textContent = "Trovati "+json.length +" risultati";
  title.innerHTML = "";
  if(json.length==0) title.textContent = "Case in vendita a: ";
  else
    title.textContent = "Case in vendita a: "+json[0].citta;

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

const search_container = document.querySelector(".search_container");
const ris = document.querySelector("#risultati");
const title = document.querySelector("#title");