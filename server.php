<?php
// controllo se form è stato inviato correttamente
if($_POST["titolo"] && $_POST["artista"] && $_POST["cover"] && $_POST["anno"] && $_POST["genere"]){

// leggere il json e salvarlo in una variabile
$json_text = file_get_contents('./data.json');

// convertire il json in array di stringhe
$dischi = json_decode($json_text, true);

// salvare in variabili i dati passati dal form
$title = $_POST["titolo"];
$artist = $_POST["artista"];
$url_cover = $_POST["cover"];
$year = $_POST["anno"];
$genre = $_POST["genere"];

// aggiungo i dati all'array
$dischi[] = [
    "titolo"=> $title,
    "artista"=> $artist,
    "url_cover"=> $url_cover,
    "anno_pubblicazione"=> $year,
    "genere"=> $genre
];

// riconvertire struttura dati in json
$json_text_updated = json_encode($dischi);

// sovrascrivere il file .json
file_put_contents('./data.json', $json_text_updated);

// infine reindirizzare l utente alla index
header('location: ./index.php');
}else{
    echo "ops! sembra esserci un errore nel form, prova a controllare se hai inserito correttamente tutti i dati";
}

?>