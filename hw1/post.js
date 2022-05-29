const indietro = document.querySelector('.indietro');
const container = document.querySelector('.container');
const div_map = document.querySelector('.mappa');

const div_img = document.querySelector('.img');
const data = document.querySelector('.data');
const data_title = document.querySelector('.title');
const data_prezzo = document.querySelector('.prezzo');
const data_ind = document.querySelector('.indirizzo');
const data_desc = document.querySelector('.descrizione');
const title_like = document.querySelector('.title_like');

let img = document.createElement('img'), prezzo, title, descrizione,indirizzo,id;

indietro.addEventListener('click',() =>{
    history.back();
})

getFromUrl();


function getFromUrl() {

    var url;
    var text;
    url = document.location.href;


    s0 = url.split("?");

    s1 = s0[1].split("&");
    for (var i=0;i<s1.length;i++) {

        s2 = s1[i].split("=");
        if (s2[0] == 'img') {
            img.src = s2[1];
        }
        if (s2[0] == 'prezzo') {
            prezzo = ""+s2[1];
        }
        if (s2[0] == 'title') {
            title = ""+s2[1];
        }
        if (s2[0] == 'descrizione') {
            descrizione = s2[1];
        }
        if (s2[0] == 'indirizzo') {
            indirizzo = s2[1];
        }
        if (s2[0] == 'id') {
            id = s2[1];
        }
    }


    caricaPagina();
}

function caricaPagina()
{

    simbolo = document.createElement('span');
    prezzo_h2 = document.createElement('h2');
    cuore = document.createElement('i');

    title = title.replace('%20', ' ');
    data_title.textContent = title;

    title_like.appendChild(data_title);

    if(getCookie('like')){
        cuore.classList.add('bxs-heart');
        cuore.classList.add('bx');
        cuore.addEventListener('click', aggiungiPref);
        
    title_like.appendChild(cuore);

    }else if(getCookie('like')== false){
        cuore.classList.add('bx-heart');
        cuore.classList.add('bx');
        cuore.addEventListener('click', aggiungiPref);
        title = title.replace('%20', ' ');
        data_title.textContent = title;

    title_like.appendChild(data_title);
    title_like.appendChild(cuore);
    }

    

    
    descrizione = descrizione.replaceAll('%20', ' ');

    div_img.appendChild(img);
    
    
    data_desc.textContent = descrizione;
    simbolo.textContent = '€';
    data_desc.appendChild(div_map);

    prezzo_h2.textContent = prezzo;
    
    indirizzo = indirizzo.replace('%20', ' ');
    data_ind.textContent = indirizzo;

    data_prezzo.appendChild(simbolo);
    data_prezzo.appendChild(prezzo_h2);

    data.appendChild(title_like);
    data.appendChild(data_prezzo);
    data.appendChild(data_ind);
    data.appendChild(data_desc);

    container.appendChild(div_img);
    container.appendChild(data);
}


function aggiungiPref()
{


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


function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}



const map_key = 'jknOd1EYAMx7IdoAB5J51TtW3EtGyceK';
const api = 'http://localhost/esercizi/hw1/get_coordinates.php';
const full_address=indirizzo+ " italia";	

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
