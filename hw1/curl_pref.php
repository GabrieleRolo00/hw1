<?php
      session_start();

    $url = 'http://localhost/esercizi/hw1/elabora_pref.php?id_utente='.$_SESSION['user'];
    
    # Creo il CURL handle per l'URL selezionato
    $ch = curl_init($url);
    # Setto che voglio ritornato il valore, anziché un boolean (default)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    # Eseguo la richiesta all'URL
    $data = curl_exec($ch);
    # Impacchetto tutto in un JSON
    $json = json_decode($data, true);
    # Libero le risorse
    curl_close($ch);
    # Riformatto l'array

    $newJson = array();
    # Riformatto l'array
    for ($i = 0; $i < count($json); $i++) {
        $newJson[] = array('id_casa' => $json[$i]['id_casa'], 'nome' => $json[$i]['nome'], 'prezzo' => $json[$i]['prezzo'], 'descrizione' => $json[$i]['descrizione'], 'img' => $json[$i]['img'], 'tipo' => $json[$i]['tipo'], 'citta' => $json[$i]['citta'], 'indirizzo' => $json[$i]['indirizzo']);
    }

    # Ritorno l'array
    echo json_encode($newJson);


?>