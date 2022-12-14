<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div class="header"></div>
        <div class="main">
            <div class="js">
                <table>
                    <tr><th colspan="2">Brote</th></tr>
                    <?php for($i=0; $i<count($breadArray); $i++): ?>
                        <tr>
                            <td><?= $breadArray[$i]->getLabel(); ?></td>
                            <td><img src="<?= $breadArray[$i]->getImg(); ?>" alt="<?= $breadArray[$i]->getLabel() ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <table>
                    <tr><th colspan="2">Käse</th></tr>
                    <?php for($i=0; $i<count($cheeseArray); $i++): ?>
                        <tr>
                            <td><?= $cheeseArray[$i]->getLabel(); ?></td>
                            <td><img src="<?= $cheeseArray[$i]->getImg(); ?>" alt="<?= $breadArray[$i]->getLabel() ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <table>
                    <tr><th colspan="2">Fleisch</th></tr>
                    <?php for($i=0; $i<count($meatArray); $i++): ?>
                        <tr>
                            <td><?= $meatArray[$i]->getLabel(); ?></td>
                            <td><img src="<?= $meatArray[$i]->getImg(); ?>" alt="<?= $breadArray[$i]->getLabel() ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <table>
                    <tr><th>Saucen</th></tr>
                    <?php for($i=0; $i<count($sauceArray); $i++): ?>
                        <tr>
                            <td><?= $sauceArray[$i]->getLabel(); ?></td>
                            <td><img src="<?= $sauceArray[$i]->getImg(); ?>" alt="<?= $breadArray[$i]->getLabel() ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </table>
/                <table>
                    <tr><th colspan="2">Beilagen</th></tr>
                    <?php for($i=0; $i<count($vegetablesArray); $i++): ?>
                        <tr>
                            <td><?= $vegetablesArray[$i]->getLabel(); ?></td>
                            <td><img src="<?= $vegetablesArray[$i]->getImg(); ?>" alt="<?= $breadArray[$i]->getLabel() ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <table><tr><td><a href="login"><button type="button">Zurück zum Login</button></a></td></tr></table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>