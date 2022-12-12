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
                    <table><tr><th>Wählen Sie bitte ein Brot aus</th></tr></table>
                    <table>
                        <?php foreach ($breadArray as $bread) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="bread" name="bread" onclick="checkValue()" value="<?= $bread->getPK() ?>" id="<?= $bread->getLabel() ?>">
                                </td>
                                <td>
                                    <?= $bread->getLabel() ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr><td colspan="2"><button onclick="goNext(1)" disabled>Weiter -></button></td></tr>
                    </table>
                </div>
                <?php /* ?>
                <!-- Bread -->
                <div class="form1" id="slide1">
                    <p>Wählen sie Ihr Brot:</p>
                    <?php foreach ($breadArray as $bread) { ?>
                        <input type="radio" class="bread" name="bread" onclick="checkValue()" value="<?= $bread->getPK() ?>" id="<?= $bread->getLabel() ?>">
                        <label id="bread<?= $bread->getPK() ?>" for="<?= $bread->getLabel() ?>"><?= $bread->getLabel() ?></label><br>
                    <?php } ?>
                    <br><br>
                    <button onclick="goNext(1)" disabled>Weiter -></button>
                </div> <?php */; ?>
                <!-- Cheese -->

                <div class="form2" id="slide2">
                    <table><tr><th colspan="2">Wählen Sie bitte einen Käse aus</th></tr></table>
                    <table>
                        <?php foreach ($cheeseArray as $cheese) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="cheese" name="cheese" value="<?= $cheese->getPK() ?>" id="<?= $cheese->getLabel() ?>">
                                </td>
                                <td>
                                    <?= $cheese->getLabel() ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(2)"><- Zurück</button></td>
                            <td></td>
                            <td><button onclick="goNext(2)">Weiter -></button></td>
                        </tr>
                    </table>
                </div>
                <?php /* <!-- Cheese -->
                <div class="form2" id="slide2">
                    <p>Wählen sie Ihren Käse:</p>
                    <?php foreach ($cheeseArray as $cheese) { ?>
                        <input type="radio" class="cheese" name="cheese" value="<?= $cheese->getPK() ?>" id="<?= $cheese->getLabel() ?>">
                        <label id="cheese<?= $cheese->getPK() ?>" for="<?= $cheese->getLabel() ?>"><?= $cheese->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(2)">
                        <- Zurück</button>
                            <button onclick="goNext(2)">Weiter -></button>
                </div> */; ?>

                <!-- Meat -->
                <div class="form3" id="slide3">
                    <table><tr><th colspan="2">Wählen Sie bitte ein Fleisch aus</th></tr></table>
                    <table>
                        <?php foreach ($meatArray as $meat) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="meat" name="meat" value="<?= $meat->getPK() ?>" id="<?= $meat->getLabel() ?>">
                                </td>
                                <td>
                                    <?= $meat->getLabel() ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(3)"><- Zurück</button></td>
                            <td></td>
                            <td><button onclick="goNext(3)">Weiter -></button></td>
                        </tr>
                    </table>
                </div>
                <?php /* <!-- Meat -->
                <div class="form3" id="slide3">
                    <p>Wählen sie Ihre Fleischsorte:</p>
                    <?php foreach ($meatArray as $meat) { ?>
                        <input type="radio" class="meat" name="meat" value="<?= $meat->getPK() ?>" id="<?= $meat->getLabel() ?>">
                        <label id="meat<?= $meat->getPK() ?>" for="<?= $meat->getLabel() ?>"><?= $meat->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(3)">
                        <- Zurück</button>
                            <button onclick="goNext(3)">Weiter -></button>
                </div> */; ?>

                <!-- Sauce -->
                <div class="form4" id="slide4">
                    <table><tr><th colspan="2">Wählen Sie bitte eine Sauce aus</th></tr></table>
                    <table>
                        <?php foreach ($sauceArray as $sauce) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="sauce" name="sauce" value="<?= $sauce->getPK() ?>" id="<?= $sauce->getLabel() ?>">
                                </td>
                                <td>
                                    <?= $sauce->getLabel() ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(4)"><- Zurück</button></td>
                            <td></td>
                            <td><button onclick="goNext(4)">Weiter -></button></td>
                        </tr>
                    </table>
                </div>
                <?php /* <!-- Sauce -->
                <div class="form4" id="slide4">
                    <p>Wählen sie Ihre Sauce:</p>
                    <?php foreach ($sauceArray as $sauce) { ?>
                        <input type="radio" class="sauce" name="sauce" value="<?= $sauce->getPK() ?>" id="<?= $sauce->getLabel() ?>">
                        <label id="sauce<?= $sauce->getPK() ?>" for="<?= $sauce->getLabel() ?>"><?= $sauce->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(4)">
                        <- Zurück</button>
                            <button onclick="goNext(4)">Weiter -></button>
                </div> */; ?>
                <!-- Vegetables (checkbox) -->
                <div class="form5" id="slide5">
                    <table><tr><th colspan="2">Wählen Sie bitte das Gemüse aus</th></tr></table>
                    <table>
                        <?php foreach ($vegetablesArray as $vegetable) { ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="vegetables" name="vegetables" value="<?= $vegetable->getPK() ?>" id="<?= $vegetable->getLabel() ?>">
                                </td>
                                <td>
                                    <?= $vegetable->getLabel() ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(5)"><- Zurück</button></td>
                            <td></td>
                            <td><button onclick="goNext(5)">Fertig -></button></td>
                        </tr>
                    </table>
                </div>
                <?php /* <!-- Vegetables (checkbox) -->
                <div class="form5" id="slide5">
                    <p>Wählen sie Ihr Gemüse:</p>
                    <?php foreach ($vegetablesArray as $vegetable) { ?>
                        <input type="checkbox" class="vegetables" name="vegetables" value="<?= $vegetable->getPK() ?>" id="<?= $vegetable->getLabel() ?>">
                        <label for="<?= $vegetable->getLabel() ?>"><?= $vegetable->getLabel() ?></label>
                    <?php } ?>
                    <br><br>
                    <button onclick="goBack(5)">
                        <- Zurück</button>
                            <button onclick="goNext(5)">Fertig -></button>
                </div> */; ?>

                <!-- See order -->
                <div class="form6" id="slide6">
                    <form class="final" action="add_order" method="POST">
                        <table><tr><th>Ihre Auswahl:</th></tr></table>
                        <table>
                            <tr>
                                <td>Brot:</td>
                                <td><input type="text" name="bread" id="bread" readonly></td>
                            </tr>
                            <tr>
                                <td>Käse:</td>
                                <td><input type="text" name="cheese" id="cheese" readonly></td>
                            </tr>
                            <tr>
                                <td>Fleisch:</td>
                                <td><input type="text" name="meat" id="meat" readonly></td>
                            </tr>
                            <tr>
                                <td>Sauce:</td>
                                <td><input type="text" name="sauce" id="sauce" readonly></td>
                            </tr>
                            <tr>
                                <td>Gemüse:</td>
                                <td><input type="text" name="vegetables" id="vegetables" readonly></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><button type="button" onclick="goBack(6)"><- Zurück</button></td>
                            <td></td>
                                <td><button type="submit">Bestellen -></button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <?php /* <!-- See order -->
                <div class="form6" id="slide6">
                    <p>Ihre Auswahl:</p>

                    <form class="final" action="add_order" method="POST">
                        <label for="bread">Brot: <span id="breadname"></span></label><br>
                        <input type="text" id="bread" name="bread"><br>
                        <label for="cheese">Käse: <span id="cheesename"></span></label><br>
                        <input type="text" id="cheese" name="cheese"><br>
                        <label for="meat">Fleisch: <span id="meatname"></span></label><br>
                        <input type="text" id="meat" name="meat"><br>
                        <label for="sauce">Sauce: <span id="saucename"></span></label><br>
                        <input type="text" id="sauce" name="sauce"><br>
                        <label for="vegetables">Gemüse:</label><br>
                        <input type="text" id="vegetables" name="vegetables"><br><br>
                        <button type="submit">Bestellen -></button>
                    </form>

                    <button onclick="goBack(6)">
                        <- Zurück</button>
                </div> */; ?>
            </div>
            <div class="footer">
                <?php include 'app/Controllers/inc/footer.inc.php'; ?>
            </div>
        </div>

        <!-- JS-File always import here! -->
        <script src="public/js/app.js"></script>
</body>

</html>