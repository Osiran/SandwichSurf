<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php include 'app/Controllers/inc/header.inc.php'; ?>
        </div>
        <div class="main">
            <div class="text">
                <p>Bitte loggen Sie sich hier ein:</p>
            </div>
            <div class="js">
                <form action="loginControl" method="POST">
                    <table>
                        <tr>
                            <td><label for="name">Name:</label></td>
                            <td><input type="text" name="name" id="name"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Passwort:</label></td>
                            <td><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit">Absenden</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="footer">
            <?php include 'app/Controllers/inc/footer.inc.php'; ?>
        </div>
    </div>
    <script></script>
</body>
</html>