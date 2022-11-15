<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Test</title>
</head>

<body>
    <div class="container">
        <div class="header"><?php include 'app/Controllers/inc/header.inc.php'; ?></div>
        <div class="main">
            <div class="text">
                <p>Das ist ein Text</p>
            </div>
            <div class="js">
                <form action="/action_page.php" id="bread">
                    <p>Choose your bread:</p>
                      <input type="radio" id="html" name="fav_language" value="HTML">
                      <label for="html">HTML</label><br>
                      <input type="radio" id="css" name="fav_language" value="CSS">
                      <label for="css">CSS</label><br>
                      <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">JavaScript</label>
                    <input type="submit" value="Submit">
                </form>
                <form action="" id="sauce"></form>
                <form action="" id="meat"></form>
                <form action="" id="vegetables"></form>
                <form action="" id=""></form>
            </div>
        </div>
        <div class="footer"><?php include 'app/Controllers/inc/footer.inc.php'; ?></div>
    </div>

</body>

</html>