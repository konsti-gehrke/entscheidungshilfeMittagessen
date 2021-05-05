<?php

    $csv_file_path = "Essensziele.csv";

    include("connect.php");
    include("loadXMLFile.php");

    $connection = connect_db();
    load_xml_file($connection, $csv_file_path);

    $food_query = "SELECT * FROM essen";
    $essen = mysqli_query($connection, $food_query);
?>
<!DOCTYPE html>
<html lang="DE">
  <head>
    <title>
      WO / WAS ESSEN WIR DENN HEUTE?
    </title>

    <!-- CSS & JS -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h1>WO / WAS ESSEN WIR DENN HEUTE?</h1>
    <div class="container">
        <!-- Kategorien-Filter -->
        <h3>Kategorien - Filter</h3>
        <div class="btn-group" role="group" aria-label="Kategorien">
            <button class="btn btn-outline-dark option1" id="opt1choice1">Alles</button>
            <button class="btn btn-outline-dark option1" id="opt1choice2">Burger</button>
            <button class="btn btn-outline-dark option1" id="opt1choice3">Pizza/Pasta</button>
            <button class="btn btn-outline-dark option1" id="opt1choice4">Asiatisch</button>
            <button class="btn btn-outline-dark option1" id="opt1choice5">Hausmannskost</button>
            <button class="btn btn-outline-dark option1" id="opt1choice6">Sonstiges</button>
        </div>
        <div id="selection_display">
    </div>
    <hr>
    </div>
    <div class="container row">
        <!-- Entfernungs-Filter -->
        <div class="col-6">
            <h3>Entfernung</h3>
            <div class="btn-group" role="group" aria-label="Entfernung">
                <button class="btn btn-outline-dark option2" id="opt2choice1">Egal</button>
                <button class="btn btn-outline-dark option2" id="opt2choice2">nicht so weit weg</button>
                <button class="btn btn-outline-dark option2" id="opt2choice3">ganz nah dran</button>
            </div>
        </div>
        <!-- Preis-Filter -->
        <div class="col-6">
            <h3>Preis</h3>
            <div class="btn-group" role="group" aria-label="Entfernung">
                <button class="btn btn-outline-dark option3" id="opt3choice1">Egal</button>
                <button class="btn btn-outline-dark option3" id="opt3choice2">nicht zu viel</button>
                <button class="btn btn-outline-dark option3" id="opt3choice3">Ende des Monats</button>
            </div>
        </div>
  </div>
  <hr>
  <div class="container">
    <!-- Veggie-Filter -->
    <h3>Veggietauglich</h3>
    <div class="btn-group" role="group" aria-label="Veggietauglich">
        <button class="btn btn-outline-dark option4" id="opt4choice1">Egal</button>
        <button class="btn btn-outline-dark option4" id="opt4choice2">sollte schon schmecken</button>
        <button class="btn btn-outline-dark option4" id="opt4choice3">muss schon lecker sein</button>
    </div>
  </div>
  <hr>
  <div class="container">
        <div class="row">
            <h3>Ergebnisse</h3>
            <!-- Ergebnis-Liste -->
            <div class="col-6" id="ergebnisse">
                <table class="table" id="ergebnisse">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Preis</th>
                    <th scope="col">Entfernung</th>
                    <th scope="col">Veggietaugl.</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($essen as $i => $row) : ?>
                    <tr
                        data-adresse="<?php echo $row['adresse']; ?>"
                        data-kategorie="<?php echo $row['kategorie']; ?>"
                    >
                        <th scope="row"><?php echo $i+1; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['preis']; ?></td>
                        <td><?php echo $row['entfernung']; ?></td>
                        <td><?php echo $row['veggie']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <div class="col-4">
                <button class="btn btn-outline-dark">Reset</button>
                <button class="btn btn-dark">Randomize</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>