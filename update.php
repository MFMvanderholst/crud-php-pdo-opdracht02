<?php 
// verbinding gegevens
    include('config.php');

    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

    try {
        // Maak een nieuw PDO object zodat je verbinding hebt met de musql database
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        if ($pdo) {
            //echo "Er is verbinding";
        } else {
            echo "Interne server-error";
        }
        
    } catch (PDOException $e) {
        $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {
        // Maak een update query voor het updaten van een record
        $sql = "UPDATE pizza
                SET Bodemformaat = :Bodemformaat,
                    Saus = :Saus,
                    Toppings = :Toppings,
                    Kruiden = :Kruiden
                WHERE Id = :Id";

            
                //Roep de prepare-method aan van het PDO-object $pdo
                $statement = $pdo->prepare($sql);

                //We moeten de placeholders een waarde geven in de sql-query
                $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
                $statement->bindValue(':Bodemformaat', $_POST['Bodemformaat'], PDO::PARAM_STR);
                $statement->bindValue(':Saus', $_POST['Saus'], PDO::PARAM_STR);
                $statement->bindValue(':Toppings', $_POST['Toppings'], PDO::PARAM_STR);
                $statement->bindValue(':Kruiden', $_POST['Kruiden'], PDO::PARAM_STR);

                // We gaan de query uitvoeren op de mysql-server
                $statement->execute();

                echo "Het record is geupdate";
                header("Refresh:3 read.php");

        } catch(PDOException $e) {
            echo "Het record is niet geupdate";
            header("Refresh:3 read.php");
        }
        
        exit();
    }

    $sql = 'SELECT * FROM pizza
            WHERE Id = :Id';
    $statement = $pdo->prepare($sql);

    $statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <link rel="stylesheet" href="css/style.css">
    <!-- url titel -->
    <title>PHP-CRUD-2209a</title>
</head>
<body>
    <h1>PDO CRUD</h1>
    <!-- Formulier -->
    <form action="update.php" method="post">
        <fieldset>
            <label for="Bodemformaat">
                Bodemformaat
            </label>
            <select name="Bodemformaat" id="Bodemformaat" value="<?php echo $result->Bodemformaat; ?>">
                <option value="Maak een keuze">Maak een keuze</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
            </select>
            
            <label for="Saus">
                Saus
            </label>
            <select name="Saus" id="Saus" value="<?php echo $result->Saus; ?>">
                <option value="Maak een keuze">Maak een keuze</option>
                <option value="Tomatensaus">Tomatensaus</option>
                <option value="Extra Tomatensaus">Extra Tomatensaus</option>
                <option value="Spicy Tomatensaus">Spicy Tomatensaus</option>
                <option value="BBQ Saus">BBQ Saus</option>
                <option value="Créme Fraiche">Créme Fraiche</option>
            </select>

            <div>
                <p>Pizzatoppings</p>
                <input type="radio" id="Toppings" name="Toppings" value="vegan" value="<?php echo $result->Toppings; ?>">
                <label for="vegan">
                    vegan
                </label>

                <input type="radio" id="Toppings" name="Toppings" value="vegetarisch" value="<?php echo $result->Toppings; ?>">
                <label for="vegetarisch">
                    vegetarisch
                </label>

                <input type="radio" id="Toppings" name="Toppings" value="vlees" value="<?php echo $result->Toppings; ?>">
                <label for="vlees">
                    vlees
                </label>
            </div>

            <div>
                <p>Kruiden</p>
                <input type="checkbox" id="Kruiden" name="Kruiden" value="Peterselie" value="<?php echo $result->Kruiden; ?>">
                <label for="Peterselie">
                    Peterselie
                </label>

                <input type="checkbox" id="Kruiden" name="Kruiden" value="Oregano" value="<?php echo $result->Kruiden; ?>">
                <label for="Oregano">
                    Oregano
                </label>

                <input type="checkbox" id="Kruiden" name="Kruiden" value="Chili flakes" value="<?php echo $result->Kruiden; ?>">
                <label for="Chili flakes">
                    Chili flakes
                </label>

                <input type="checkbox" id="Kruiden" name="Kruiden" value="Zwarte peper" value="<?php echo $result->Kruiden; ?>">
                <label for="Zwarte peper">
                    Zwarte peper
                </label>
            </div>
            

            <input type="submit" value="verstuur">
        </fieldset>
    </form>
    
</body>
</html>