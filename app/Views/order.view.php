<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Bestellungen</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <?php include 'app/Controllers/inc/header.inc.php'; ?>
        </div>
        <div class="main">
            <div class="text">
                <p>Wie dürfen wir Ihr Sandwich zubereiten?</p>
            </div>
            <div class="js">
                <!-- Bread -->
                <div class="form1" id="slide1">
                    <p>Wählen sie Ihr Brot:</p>
                    <input type="radio" class="bread" name="Ciabatta" value="Ciabatta">
                    <label for="Ciabatta">Ciabatta</label><br>
                    <input type="radio" class="bread" name="Gluten-free" value="Glutenfrei">
                    <label for="css">Glutenfrei</label><br>
                    <input type="radio" class="bread" name="Whole-Bread" value="Vollkorn">
                    <label for="javascript">Vollkorn</label><br>
                    <input type="radio" class="bread" name="White Bread" value="Weissbrot">
                    <label for="javascript">Weissbrot</label><br><br>
                    <button onclick="goNext(1)">Weiter -></button>
                </div>
                <!-- Cheese -->
                <div class="form2" id="slide2">
                    <p>Wählen sie Ihren Käse:</p>
                    <input type="radio" class="cheese" name="fav_language" value="Appenzeller">
                    <label for="javascript">Appenzeller</label><br>
                    <input type="radio" class="cheese" name="fav_language" value="Cheddar">
                    <label for="javascript">Cheddar</label><br>
                    <input type="radio" class="cheese" name="fav_language" value="Emmentaler">
                    <label for="javascript">Emmentaler</label><br>
                    <input type="radio" class="cheese" name="fav_language" value="Laktose-free">
                    <label for="javascript">Laktosefrei</label><br><br>
                    <button onclick="goBack(2)">
                        <- Zurück</button>
                            <button onclick="goNext(2)">Weiter -></button>
                </div>
                <!-- Meat -->
                <div class="form3" id="slide3">
                    <p>Wählen sie Ihre Fleischsorte:</p>
                    <input type="radio" class="meat" name="Chicken" value="Chicken">
                    <label for="javascript">Chicken</label><br>
                    <input type="radio" class="meat" name="Roast-Beef value=" Roast-Beef">
                    <label for="javascript">Roast-Beef</label><br>
                    <input type="radio" class="meat" name="Ham" value="Schinken">
                    <label for="javascript">Schinken</label><br>
                    <input type="radio" class="meat" name="Tofu" value="Tofu">
                    <label for="javascript">Tofu</label><br><br>
                    <button onclick="goBack(3)">
                        <- Zurück</button>
                            <button onclick="goNext(3)">Weiter -></button>
                </div>
                <!-- Sauce -->
                <div class="form4" id="slide4">
                    <p>Wählen sie Ihre Sauce:</p>
                    <input type="radio" class="sauce" name="Cocktail" value="Cocktail">
                    <label for="javascript">Cocktail</label><br>
                    <input type="radio" class="sauce" name="Ketchup" value="Ketchup">
                    <label for="javascript">Ketchup</label><br>
                    <input type="radio" class="sauce" name="Mayonnaise" value="Mayonnaise">
                    <label for="javascript">Mayonnaise</label><br>
                    <input type="radio" class="sauce" name="Mustard" value="Senf">
                    <label for="javascript">Senf</label><br><br>
                    <button onclick="goBack(4)">
                        <- Zurück</button>
                            <button onclick="goNext(4)">Weiter -></button>
                </div>
                <!-- Vegetables (checkbox) -->
                <div class="form5" id="slide5">
                    <p>Wählen sie Ihr Brot:</p>
                    <input type="checkbox" class="vegetables" name="Pineaplle" value="Ananas">
                    <label for="javascript">Ananas</label><br>
                    <input type="checkbox" class="vegetables" name="Banana" value="Banane">
                    <label for="javascript">Banane</label><br>
                    <input type="checkbox" class="vegetables" name="Mushrooms" value="Champignon">
                    <label for="javascript">Champignon</label><br>
                    <input type="checkbox" class="vegetables" name="Cucumber" value="Gurke">
                    <label for="javascript">Gurke</label><br><br>
                    <button onclick="goBack(5)">
                        <- Zurück</button>
                            <button onclick="goNext(5)">Fertig -></button>
                </div>
                <!-- See order -->
                <div class="form6" id="slide6">
                    <p>Ihre Auswahl:</p>

                    <form action="add_order" method="POST">
                        <label for="bread">Brod:</label><br>
                        <input type="text" id="bread" name="bread"><br>
                        <label for="cheese">Käse:</label><br>
                        <input type="text" id="cheese" name="cheese"><br>
                        <label for="meat">Fleisch:</label><br>
                        <input type="text" id="meat" name="meat"><br>
                        <label for="sauce">Sauce:</label><br>
                        <input type="text" id="sauce" name="sauce"><br>
                        <label for="vegetables">Gemüse:</label><br>
                        <input type="text" id="vegetables" name="vegetables"><br><br>
                        <input type="submit" value="Bestellen ->">
                    </form>

                    <button onclick="goBack(6)">
                        <- Zurück</button>
                </div>
            </div>
            <div class="footer">
                <?php include 'app/Controllers/inc/footer.inc.php'; ?>
            </div>
        </div>
        <script src="public/js/app.js"></script>
</body>

</html>