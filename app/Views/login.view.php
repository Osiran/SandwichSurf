
<?php include 'app/Controllers/inc/header.inc.php'; ?>
    <p>Bitte loggen Sie sich hier ein:</p>
    <form action="loginControl" method="POST">
        <table>
            <tr>
                <td><label for="name">ID:</label></td>
                <td><input type="text" name="pk_staffId" id="pk_staffId" required></td>
            </tr>
            <tr>
                <td><label for="password">Passwort:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Absenden</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href="home"><button type="button">Zurück zur Homepage</button></a></td>
            </tr>
        </table>
        <?php foreach ($errors as $e) { ?>
            <p class="error"><?= $e ?></p>
        <?php } ?>
    </form>
<?php include 'app/Controllers/inc/footer.inc.php'; ?>