 <?php include 'app/Controllers/inc/header.inc.php'; ?>
<p>Hier sind alle Bestellungen im Überblick</p>
    <table>
        <tr>
            <th>Bestellnummer</th>
            <th>Brot</th>
            <th>Käse</th>
            <th>Fleisch</th>
            <th>Sauce</th>
            <th>Gemüse</th>
        </tr>
    
        <?php foreach($orderArray as $order){ ?>
            <tr>
                <td><?= $order->pk_orders ?></td>
                <td><?= $order->bread ?></td>
                <td><?= $order->cheese ?></td>
                <td><?= $order->meat ?></td>
                <td><?= $order->sauce ?></td>
                <td>
                    <ul>
                        <?php foreach ($order->vegetables as $v) { ?>
                            <li><?= $v->label ?></li>
                        <?php } ?>
                    </ul>
                </td>
            </tr>
        <?php } ?>
    
    </table>
<a class="button" href="login">Zurück zum Login</a>
<?php include 'app/Controllers/inc/footer.inc.php'; ?>