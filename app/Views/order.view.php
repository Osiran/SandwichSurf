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
                    <table>
                        <tr>
                            <th>Wählen Sie bitte ein Brot aus</th>
                        </tr>
                    </table>
                    <table>
                        <?php foreach ($breadArray as $bread) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="bread" name="bread" onclick="checkValue()" value="<?= $bread->getLabel() ?>" id="<?= $bread->getPK() ?>">
                                </td>
                                <td>
                                    <label for="<?= $bread->getPK() ?>"><?= $bread->getLabel() ?></label>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td colspan="2"><button onclick="goNext(1)" disabled>Weiter -></button></td>
                        </tr>
                    </table>
                </div>
                <!-- Cheese -->
                <div class="form2" id="slide2">
                    <table>
                        <tr>
                            <th colspan="2">Wählen Sie bitte einen Käse aus</th>
                        </tr>
                    </table>
                    <table>
                        <?php foreach ($cheeseArray as $cheese) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="cheese" name="cheese" value="<?= $cheese->getLabel() ?>" id="<?= $cheese->getPK() ?>">
                                </td>
                                <td>
                                    <label for="<?= $cheese->getPK() ?>"><?= $cheese->getLabel() ?></label>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(2)">
                                    <- Zurück</button>
                            </td>
                            <td></td>
                            <td><button onclick="goNext(2)">Weiter -></button></td>
                        </tr>
                    </table>
                </div>

                <!-- Meat -->
                <div class="form3" id="slide3">
                    <table>
                        <tr>
                            <th colspan="2">Wählen Sie bitte ein Fleisch aus</th>
                        </tr>
                    </table>
                    <table>
                        <?php foreach ($meatArray as $meat) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="meat" name="meat" value="<?= $meat->getLabel() ?>" id="<?= $meat->getPK() ?>">
                                </td>
                                <td>
                                    <label for="<?= $meat->getPK() ?>"><?= $meat->getLabel() ?></label>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(3)">
                                    <- Zurück</button>
                            </td>
                            <td></td>
                            <td><button onclick="goNext(3)">Weiter -></button></td>
                        </tr>
                    </table>
                </div>

                <!-- Sauce -->
                <div class="form4" id="slide4">
                    <table>
                        <tr>
                            <th colspan="2">Wählen Sie bitte eine Sauce aus</th>
                        </tr>
                    </table>
                    <table>
                        <?php foreach ($sauceArray as $sauce) { ?>
                            <tr>
                                <td>
                                    <input type="radio" class="sauce" name="sauce" value="<?= $sauce->getLabel() ?>" id="<?= $sauce->getPK() ?>">
                                </td>
                                <td>
                                    <label for="<?= $sauce->getPK() ?>"><?= $sauce->getLabel() ?></label>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(4)">
                                    <- Zurück</button>
                            </td>
                            <td></td>
                            <td><button onclick="goNext(4)">Weiter -></button></td>
                        </tr>
                    </table>
                </div>

                <!-- Vegetables (checkbox) -->
                <div class="form5" id="slide5">
                    <table>
                        <tr>
                            <th colspan="2">Wählen Sie bitte das Gemüse aus</th>
                        </tr>
                    </table>
                    <table>
                        <?php foreach ($vegetablesArray as $vegetable) { ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="vegetables" name="vegetables" value="<?= $vegetable->getLabel() ?>" id="<?= $vegetable->getPK() ?>">
                                </td>
                                <td>
                                    <label for="<?= $vegetable->getPK() ?>"><?= $vegetable->getLabel() ?></label>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <table>
                        <tr>
                            <td><button onclick="goBack(5)">
                                    <- Zurück</button>
                            </td>
                            <td></td>
                            <td><button onclick="goNext(5)">Fertig -></button></td>
                        </tr>
                    </table>
                </div>

                <!-- See order -->
                <div class="form6" id="slide6">
                    <form class="final" action="add_order" method="POST">
                        <table>
                            <tr>
                                <th>Ihre Auswahl:</th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>Brot:</td>
                                <td>
                                    <input type="text" name="" id="breadName" readonly>
                                    <input type="number" name="bread" id="breadId" style="display: none;">
                                </td>
                            </tr>
                            <tr>
                                <td>Käse:</td>
                                <td>
                                    <input type="text" name="" id="cheeseName" readonly>
                                    <input type="number" name="cheese" id="cheeseId" style="display: none;">
                                </td>
                            </tr>
                            <tr>
                                <td>Fleisch:</td>
                                <td>
                                    <input type="text" name="" id="meatName" readonly>
                                    <input type="number" name="meat" id="meatId" style="display: none;">
                                </td>
                            </tr>
                            <tr>
                                <td>Sauce:</td>
                                <td>
                                    <input type="text" name="" id="sauceName" readonly>
                                    <input type="number" name="sauce" id="sauceId" style="display: none;">
                                </td>
                            </tr>
                            <tr>
                                <td>Gemüse:</td>
                                <td>
                                    <input type="text" name="" id="vegetablesName" readonly>
                                    <input type="text" name="vegetables[]" id="vegetablesId" style="display: none;">
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><button type="button" onclick="goBack(6)">
                                        <- Zurück</button>
                                </td>
                                <td></td>
                                <td><button type="submit">Bestellen -></button></td>
                            </tr>
                        </table>
                    </form>
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