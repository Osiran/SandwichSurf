<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Test</title>
</head>

<body>
    <div class="container">
        <div class="header"><?php include 'app/Controllers/inc/header.inc.php'; ?></div>
        <div class="main">
            <div class="text">
                <p>Das ist ein Text</p>
            </div>
            <div class="js">
                <!-- Bread -->
                <div class="form1" id="slide1">
                    <p>Choose your bread:</p>
                    <input type="radio" class="bread" name="fav_language" value="Ciabatta">
                    <label for="html">Ciabatta</label><br>
                    <input type="radio" class="bread" name="fav_language" value="Glutenfrei">
                    <label for="css">Glutenfrei</label><br>
                    <input type="radio" class="bread" name="fav_language" value="Vollkorn">
                    <label for="javascript">Vollkorn</label><br>
                    <input type="radio" class="bread" name="fav_language" value="Weissbrot">
                    <label for="javascript">Weissbrot</label><br><br>
                    <button onclick="goNext(1)">Weiter -></button>
                </div>
                <!-- Cheese -->
                <div class="form2" id="slide2">
                    <p>Choose your cheese:</p>
                    <input type="radio" class="cheese" name="fav_language" value="Appenzeller">
                    <label for="javascript">Appenzeller</label><br>
                    <input type="radio" class="cheese" name="fav_language" value="Cheddar">
                    <label for="javascript">Cheddar</label><br>
                    <input type="radio" class="cheese" name="fav_language" value="Emmentaler">
                    <label for="javascript">Emmentaler</label><br>
                    <input type="radio" class="cheese" name="fav_language" value="Laktosefrei">
                    <label for="javascript">Laktosefrei</label><br><br>
                    <button onclick="goBack(2)"><- Zurück</button>
                    <button onclick="goNext(2)">Weiter -></button>
                </div>
                <!-- Meat -->
                <div class="form3" id="slide3">
                    <p>Choose your meat:</p>
                    <input type="radio" class="meat" name="fav_language" value="Chicken">
                    <label for="javascript">Chicken</label><br>
                    <input type="radio" class="meat" name="fav_language" value="Roast-Beef">
                    <label for="javascript">Roast-Beef</label><br>
                    <input type="radio" class="meat" name="fav_language" value="Schinken">
                    <label for="javascript">Schinken</label><br>
                    <input type="radio" class="meat" name="fav_language" value="Tofu">
                    <label for="javascript">Tofu</label><br><br>
                    <button onclick="goBack(3)"><- Zurück</button>
                    <button onclick="goNext(3)">Weiter -></button>
                </div>
                <!-- Sauce -->
                <div class="form4" id="slide4">
                    <p>Choose your sauce:</p>
                    <input type="radio" class="sauce" name="1" value="JavaScript">
                    <label for="javascript">Blue</label><br>
                    <input type="radio" class="sauce" name="2" value="JavaScript">
                    <label for="javascript">Chicken</label><br>
                    <input type="radio" class="sauce" name="3" value="JavaScript">
                    <label for="javascript">Beef</label><br><br>
                    <button onclick="goBack(4)"><- Zurück</button>
                    <button onclick="goNext(4)">Weiter -></button>
                </div>
                <!-- Vegetables -->
                <div class="form5" id="slide5">
                    <p>Choose your vegetables:</p>
                    <input type="radio" class="vegetables" name="fav_language" value="Cocktail">
                    <label for="javascript">Cocktail</label><br>
                    <input type="radio" class="vegetables" name="fav_language" value="Ketchup">
                    <label for="javascript">Ketchup</label><br>
                    <input type="radio" class="vegetables" name="fav_language" value="Mayonnaise">
                    <label for="javascript">Mayonnaise</label><br>
                    <input type="radio" class="vegetables" name="fav_language" value="Senf">
                    <label for="javascript">Senf</label><br><br>
                    <button onclick="goBack(5)"><- Zurück</button>
                    <button>Bestellen -></button>
                </div>
            </div>
        </div>
        <div class="footer"><?php include 'app/Controllers/inc/footer.inc.php'; ?></div>
        <script src="public/js/app.js"></script>

    </div>

</body>

</html>