<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>maakzelfjepizza</title>
</head>
<body>

<h1>Maak je eigen pizza</h1>

<form action="create.php" method="post">
        <fieldset>
            <label for="Bodemformaat">
                Bodemformaat
            </label>
            <select name="Bodemformaat" id="Bodemformaat">
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
            <select name="Saus" id="Saus">
                <option value="Maak een keuze">Maak een keuze</option>
                <option value="Tomatensaus">Tomatensaus</option>
                <option value="Extra Tomatensaus">Extra Tomatensaus</option>
                <option value="Spicy Tomatensaus">Spicy Tomatensaus</option>
                <option value="BBQ Saus">BBQ Saus</option>
                <option value="Créme Fraiche">Créme Fraiche</option>
            </select>

            <div>
                <p>Pizzatoppings</p>
                <input type="radio" id="Toppings" name="Toppings" value="vegan">
                <label for="vegan">
                    vegan
                </label>

                <input type="radio" id="Toppings" name="Toppings" value="vegetarisch">
                <label for="vegetarisch">
                    vegetarisch
                </label>

                <input type="radio" id="Toppings" name="Toppings" value="vlees">
                <label for="vlees">
                    vlees
                </label>
            </div>

            <div>
                <p>Kruiden</p>
                <input type="checkbox" id="Kruiden" name="Kruiden" value="Peterselie">
                <label for="Peterselie">
                    Peterselie
                </label>

                <input type="checkbox" id="Kruiden" name="Kruiden" value="Oregano">
                <label for="Oregano">
                    Oregano
                </label>

                <input type="checkbox" id="Kruiden" name="Kruiden" value="Chili flakes">
                <label for="Chili flakes">
                    Chili flakes
                </label>

                <input type="checkbox" id="Kruiden" name="Kruiden" value="Zwarte peper">
                <label for="Zwarte peper">
                    Zwarte peper
                </label>
            </div>

            <input type="submit" value="bestel">
        </fieldset>
</form>
    
</body>
</html>