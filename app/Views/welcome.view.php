<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Sandwichsurf</title>
</head>
<body>
    <div class="container">
        <div class="header"><?php include 'app/Controllers/inc/header.inc.php'; ?></div>
        <div class="main">
            <div class="text">
                <p>Willkommen bei Sandwichsurf. Hier können Sie Ihr Sandwich nach Wunsch erstellen und bei uns abholen.</p>
                <p>Vielen Dank für Ihren Auftrag</p>
            </div>
            <div class="buttons">
                <a href="orders">
                    <button type="button">Weiter zur Bestellung</button>
                </a>
            </div>
        </div>
        <div class="footer"><?php include 'app/Controllers/inc/footer.inc.php' ?></div>
    </div>
</body>
</html>