<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header"></div>
        <div class="main">
            <div class="js">
                <h2>Brote</h2>
                <table>
                    <?php for($i=0; $i<count($breadArray); $i++): ?>
                        <tr>
                            <td><?= $breadArray[$i]->getLabel(); ?></td>
                            <td><?= $breadArray[$i]->getImg(); ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <h2>Käse</h2>
                <table>
                    <?php for($i=0; $i<count($cheeseArray); $i++): ?>
                        <tr>
                            <td><?= $cheeseArray[$i]->getLabel(); ?></td>
                            <td><?= $cheeseArray[$i]->getImg(); ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <h2>Fleisch</h2>
                <table>
                    <?php for($i=0; $i<count($meatArray); $i++): ?>
                        <tr>
                            <td><?= $meatArray[$i]->getLabel(); ?></td>
                            <td><?= $meatArray[$i]->getImg(); ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <h2>Saucen</h2>
                <table>
                    <?php for($i=0; $i<count($sauceArray); $i++): ?>
                        <tr>
                            <td><?= $sauceArray[$i]->getLabel(); ?></td>
                            <td><?= $sauceArray[$i]->getImg(); ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <h2>Beilage</h2>
                <table>
                    <?php for($i=0; $i<count($vegetablesArray); $i++): ?>
                        <tr>
                            <td><?= $vegetablesArray[$i]->getLabel(); ?></td>
                            <td><?= $vegetablesArray[$i]->getImg(); ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>