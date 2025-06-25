<?php

// leggere il file data e salvarli in una variabile
$json_text = file_get_contents('./data.json');

// covertire la stringa a struttura dati, decodificando gli oggetti in array associativi.
$dischi = json_decode($json_text, true);

// var_dump($dischi);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>PHP dischi</title>
</head>
<body class="container text-center bg-dark">
    <h1 class="my-5 text-light">PHP DISCHI</h1>
    <div class="d-flex flex-wrap justify-content-between mb-5">
            <?php
                foreach($dischi as $disco) {
                    echo '<div class="card w-25 m-3 mb-5 p-3 bg-secondary text-white">';
                    foreach($disco as $key => $value) {
                        if($key == 'url_cover'){
                            echo "<img src=" . $value . " alt=" . ">";
                        }else{
                        echo "<p class='fs-5 fw-semibold'> $value </p>";
                        }
                    }
                    echo '</div>';
                }
            ?>
    </div>
    <div class="card w-75 m-3 mb-5 mx-auto p-3 bg-secondary text-white d-flex flex-column">
        <h2>aggiungi il tuo brano</h2>
        <form action="server.php" method="POSt" class="px-5 py-3 bg-secondary text-white d-flex flex-column gap-3 fs-3">
            
            <!-- titolo -->
            <label for="titolo">Titolo</label>
            <input type="text" class="form-text" id="titolo" name="titolo" required>

            <!-- artista -->
            <label for="artista">artista</label>
            <input type="text" class="form-text" id="artista" name="artista" required>

            <!-- cover -->
            <label for="cover">cover</label>
            <input type="text" class="form-text" id="cover" name="cover" required>

            <!-- anno -->
            <label for="anno">anno</label>
            <input type="text" class="form-text" id="anno" name="anno" required>

            <!-- genere -->
            <label for="genere">genere</label>
            <input type="text" class="form-text" id="genere" name="genere" required>

            <button class="mt-4 btn btn-success">invia</button>

        </form>

    </div>
    
</body>
</html>