<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Bestellübersicht</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php include 'app/Controllers/inc/header.inc.php'; ?>
        </div>
        <div class="main">
            <div class="text">
                <p>Hier sind alle Bestellungen im Überblick</p>
            </div>
            <div class="js">
                <!-- Hier das JS-HTML einfügen -->
                <!-- Leave the Tables at the end! -->
                <table><tr><td><a href="login"><button type="button">Zurück zum Login</button></a></td></tr></table>
            </div>
        </div>
        <div class="footer">
            <?php include 'app/Controllers/inc/footer.inc.php'; ?>
        </div>
    </div>
</body>
</html>