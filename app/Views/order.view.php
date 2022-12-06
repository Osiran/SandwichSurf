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
                    <?php foreach($breadArray as $bread){ ?>
                        <input type="radio" class="bread" name="bread" value="<?= $bread->getPK() ?>" id="<?= $bread->getLabel() ?>">
                        <label for="<?= $bread->getLabel() ?>"><?= $bread->getLabel() ?></label><br>
                    <?php } ?>
                    <br><br>
                    <button onclick="goNext(1)">Weiter -></button>
                </div>
                <!-- Cheese -->
                <div class="form2" id="slide2">
                    <p>Wählen sie Ihren Käse:</p>
                    <?php foreach($cheeseArray as $chesse){ ?>
                        <input type="radio" name="cheese" value="<?= $cheese->getPK() ?>" id="<?= $cheese->getLabel() ?>">
                        <label for="<?= $cheese->getLabel() ?>"><?= $cheese->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(2)">
                        <- Zurück</button>
                            <button onclick="goNext(2)">Weiter -></button>
                </div>
                <!-- Meat -->
                <div class="form3" id="slide3">
                    <p>Wählen sie Ihre Fleischsorte:</p>
                    <?php foreach($meatArray as $meat){ ?>
                        <input type="radio" name="meat" value="<?= $meat->getPK() ?>" id="<?= $meat->getLabel() ?>">
                        <label for="<?= $meat->getLabel() ?>"><?= $meat->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(3)">
                        <- Zurück</button>
                            <button onclick="goNext(3)">Weiter -></button>
                </div>
                <!-- Sauce -->
                <div class="form4" id="slide4">
                    <p>Wählen sie Ihre Sauce:</p>
                    <?php foreach($sauceArray as $sauce){ ?>
                        <input type="radio" name="sauce" value="<?= $sauce->getPK() ?>" id="<?= $sauce->getLabel() ?>">
                        <label for="<?= $sauce->getLabel() ?>"><?= $sauce->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(4)">
                        <- Zurück</button>
                            <button onclick="goNext(4)">Weiter -></button>
                </div>
                <!-- Vegetables (checkbox) -->
                <div class="form5" id="slide5">
                    <p>Wählen sie Ihr Gemüse:</p>
                    <?php foreach($vegetablesArray as $vegetable){ ?>
                        <input type="checkbox" name="vegetables" value="<?= $vegetable->getPK() ?>" id="<?= $vegetable->getLabel() ?>">
                        <label for="<?= $vegetable->getLabel() ?>"></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(5)">
                        <- Zurück</button>
                            <button onclick="goNext(5)">Fertig -></button>
                </div>
                <!-- See order -->
                <div class="form6" id="slide6">
                    <p>Ihre Auswahl:</p>

                    <form action="add_order" method="POST">
                        <label for="bread">Brot:</label><br>
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

        <!-- JS-File always import here! -->
        <script src="public/js/app.js"></script>
    </body>
    
    </html>