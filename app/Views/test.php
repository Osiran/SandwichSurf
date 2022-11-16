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
                <form action="" id="bread">
                    <p>Choose your bread:</p>
                      <input type="radio" class="bread" name="fav_language" value="Ciabatta">
                      <label for="html">Ciabatta</label><br>
                      <input type="radio" class="bread" name="fav_language" value="Glutenfrei">
                      <label for="css">Glutenfrei</label><br>
                      <input type="radio" class="bread" name="fav_language" value="Vollkorn">
                      <label for="javascript">Vollkorn</label>
                        <input type="radio" class="bread" name="fav_language" value="Weissbrot">
                      <label for="javascript">Weissbrot</label>
                    
                </form>
                <form action="" id="sauce">
                <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">Chicken</label><input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">Chicken</label>
                </form>
                <form action="" id="meat">
                <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">Chicken</label>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">Roast-Beef</label>
                </form>
                <form action="" id="vegetables">
                <input type="radio" id="javascript" name="1" value="JavaScript">
                      <label for="javascript">Blue</label>
                    <input type="radio" id="javascript" name="2" value="JavaScript">
                      <label for="javascript">Chicken</label>
                    <input type="radio" id="javascript" name="3" value="JavaScript">
                      <label for="javascript">Beef</label>
                </form>
                <form action="" id="cheese">
                <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">Chicken</label>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                      <label for="javascript">Chicken</label>
                </form>
            </div>
        </div>
        <input type="submit" value="Submit">
        <div class="footer"><?php include 'app/Controllers/inc/footer.inc.php'; ?></div>
        <script src="public/js/app.js"></script>

    </div>

</body>

</html>