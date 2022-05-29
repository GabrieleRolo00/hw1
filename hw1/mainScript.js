//------- AGGIORNA INDEX


aggiorna('popular');
aggiorna('new');

function aggiorna(tipo){
  fetch("http://localhost/esercizi/hw1/curl_index.php?tipo="+tipo).then(onResponse).then(onJSON); 
}

function onResponse(response)
{
  return response.json();
 
}

function onJSON(json){
  

  for(casa of json){ 

    const article = document.createElement('article');
    const card_img = document.createElement('img');
    const link = document.createElement('a');
    const card_data = document.createElement('div');
    const card_like = document.createElement('div');
    const card_price = document.createElement('h3');
    const price = document.createElement('h3');
    const simbolo = document.createElement('span');
    const card_title = document.createElement('h3');
    const card_description = document.createElement('p');



    article.classList.add('popular_card');
    article.classList.add('swiper-slide');

    card_img.classList.add('card_img');
    card_data.classList.add('card_data');
    card_like.classList.add('card_like');
    card_price.classList.add('card_price');
    card_title.classList.add('card_title');
    card_description.classList.add('card_description');



    simbolo.textContent = "€";
    card_price.appendChild(simbolo);
    price.textContent = casa.prezzo;
    card_price.appendChild(price);

    if(casa.like !=null){
      const simbolo_cuore = document.createElement('i');
      if(casa.like){
        simbolo_cuore.classList.add("bx");
        simbolo_cuore.classList.add("bxs-heart");
      }else{
        simbolo_cuore.classList.add("bx");
        simbolo_cuore.classList.add("bx-heart");
      }
      simbolo_cuore.addEventListener('click', aggiungiPref);

      card_like.appendChild(card_price);
      card_like.appendChild(simbolo_cuore);
    }else{

      card_like.appendChild(card_price);
    }
    

    

    

    link.href = "post.php?img="+casa.img+"&prezzo="+casa.prezzo+"&title="+casa.nome+"&descrizione="+casa.descrizione+"&indirizzo="+casa.indirizzo+"&id="+casa.id_casa+"";

    card_title.textContent = casa.nome;
    card_description.textContent = ""+casa.descrizione;
    
    link.appendChild(card_title);
    link.appendChild(card_description);


    card_data.appendChild(card_like);
    card_data.appendChild(link);
    

    card_img.src = casa.img;

    article.appendChild(card_img);
    article.appendChild(card_data);


    if(casa.tipo=='popular'){
      div_swiper_popular.appendChild(article);
    }else{
      div_swiper_new.appendChild(article);
    }
    


    
  }

  //-------SWIPER------

  if(json[0].tipo=='popular')
  {
    const popular_container = document.querySelector('.popular_container');
    var swiperPopular = new Swiper(".popular_container", {
  
    spaceBetween: 32,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    loop: true,
  
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  }else{
    
var swiperNews = new Swiper(".news_container", {

  spaceBetween: 32,
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  loop: true,
  
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });  

  }
  

}

const div_swiper_popular = document.querySelector('.popular_container .swiper-wrapper');
const div_swiper_new = document.querySelector('.news_container .swiper-wrapper');
  

//-------- LIKES


function aggiungiPref(event)
{

  let url = event.path[2].childNodes[1].href
  let id;

  let cuore = event.path[0];

  s0 = url.split("?");

    s1 = s0[1].split("&");
    for (var i=0;i<s1.length;i++) {

        s2 = s1[i].split("=");

        if (s2[0] == 'id') {
            id = s2[1];
        }
    }

  if(cuore.classList.contains("bx-heart")){
    cuore.classList.remove("bx-heart");
    cuore.classList.add("bxs-heart");
    setCookie('idCasaPref',id,1);

    fetch("http://localhost/esercizi/hw1/add_like.php");

  }else{
    cuore.classList.remove("bxs-heart");
    cuore.classList.add("bx-heart");
    setCookie('idCasaPref',id,1);

    fetch("http://localhost/esercizi/hw1/remove_like.php");

  }

}


function eraseCookie(name) {   
  document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function setCookie(name,value,days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}


//mappa

const map_key = 'jknOd1EYAMx7IdoAB5J51TtW3EtGyceK';
const div_map = document.querySelector('.mappa');
const api = 'http://localhost/esercizi/hw1/get_coordinates.php';
const full_address="Viale Alcide De Gasperi, 29, 95127 Catania CT italia";	

fetch(api+'?full_address='+full_address).then(onResponse).then(									//esegue la fetch delle coordinate
          function(json){
            loadmap(div_map,json.lat,json.lng);													//quando arrivono crea la mappa
          }
);

function onResponse(response) {
	return response.json();
}


function loadmap(div_map,lat,lng){
  L.mapquest.key=map_key;
  const this_map=L.mapquest.map(
    div_map, {
      center: [lat, lng],																//la mappa viene centrata a queste coordinate
      layers: L.mapquest.tileLayer('map'),											//stile della mappa (map,satellite,ecc);
      zoom: 12															//zoom iniziale
    }
  );
      L.marker([lat, lng], {																	//crea un marker alle coordinate lat, lng
        icon: L.mapquest.icons.marker(),
        draggable: false
      }).bindPopup('Ci trovi qui').addTo(this_map);											//al click mostra il messaggio 'ci trovi qui'
}






