<?php
require('config.php');

//DSN staat voor data sourcename.
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

var_dump($_POST);

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo "Er is een verbinding met de database";
} catch(PDOException $e) {
    echo "Er is helaas geen verbinding met de database.<br>
         Neem contact op met de administrator";
    echo "Systeemmelding: " . $e->getMessage();
}


//sql query gemaakt voor het inserten van een record
$sql = "INSERT INTO pizza   (Id
                            ,Bodemformaat
                            ,Saus
                            ,Toppings
                            ,Kruiden)
        VALUES              (NULL
                            ,:Bodemformaat
                            ,:Saus
                            ,:Toppings
                            ,:Kruiden)";
//Maak de query gereed met de prepare-method van het $pdo-object
$statement = $pdo->prepare($sql);
$statement->bindValue(':Bodemformaat', $_POST['Bodemformaat'], PDO::PARAM_STR);
$statement->bindValue(':Saus', $_POST['Saus'], PDO::PARAM_STR);
$statement->bindValue(':Toppings', $_POST['Toppings'], PDO::PARAM_STR);
$statement->bindValue(':Kruiden', $_POST['Kruiden'], PDO::PARAM_STR);
//Vuur de query af op de database...
$statement->execute();

// Hiermee sturen we automatisch door naar de pagina read.php
header('Location: read.php');