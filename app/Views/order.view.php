
<?php include 'app/Controllers/inc/header.inc.php'; ?>
<!-- JS-File always import here! -->
<script src="public/js/app.js" defer></script>

<p>Wie dürfen wir Ihr Sandwich zubereiten?</p>

<form class="final" action="add_order" method="POST">
<!-- Bread -->
<div id="slide1">
        <h2>Wählen Sie bitte ein Brot aus</h2>
        <?php foreach ($breadArray as $bread) { ?>
            <input type="radio" name="bread" value="<?= $bread->label ?>" id="<?= $bread->pk_bread ?>">
            <label for="<?= $bread->pk_bread ?>"><?= $bread->label ?></label>  <br>
        <?php } ?>
        <button type="button" onclick="goNext(1, 'bread')">Weiter -></button>
</div>
<!-- Cheese -->
<div id="slide2">
    
        <h2 >Wählen Sie bitte einen Käse aus</h2>
        
        <?php foreach ($cheeseArray as $cheese) { ?>
           
                    <input type="radio" name="cheese" value="<?= $cheese->label ?>" id="<?= $cheese->pk_cheese ?>">
                    <label for="<?= $cheese->pk_cheese ?>"><?= $cheese->label ?></label> <br>
                
        <?php } ?>
        <button type="button" onclick="goBack(2)"> <- Zurück</button>
        <button type="button" onclick="goNext(2, 'cheese')">Weiter -></button>
</div>
<!-- Meat -->
<div id="slide3">
            <h2 colspan="2">Wählen Sie bitte ein Fleisch aus</h2>
        <?php foreach ($meatArray as $meat) { ?>
            <input type="radio" name="meat" value="<?= $meat->label ?>" id="<?= $meat->pk_meat ?>">
            <label for="<?= $meat->pk_meat ?>"><?= $meat->label ?></label> <br>
        <?php } ?>
        <button type="button" onclick="goBack(3)"> <- Zurück</button>
                    <button type="button" onclick="goNext(3, 'meat')">Weiter -></button>
       
</div>
<!-- Sauce -->
<div id="slide4">
        <h2>Wählen Sie bitte eine Sauce aus</h2>
        <?php foreach ($sauceArray as $sauce) { ?>
                    <input type="radio" name="sauce" value="<?= $sauce->label ?>" id="<?= $sauce->pk_sauce ?>">
                    <label for="<?= $sauce->pk_sauce ?>"><?= $sauce->label ?></label> <br>
        <?php } ?>
        <button type="button" onclick="goBack(4)"><- Zurück</button>
        <button type="button" onclick="goNext(4, 'sauce')">Weiter -></button>
</div>
<!-- Vegetables (checkbox) -->
<div id="slide5">
        <h2>Wählen Sie bitte das Gemüse aus</h2>
        <?php foreach ($vegetablesArray as $vegetable) { ?>
                    <input type="checkbox" name="vegetables[]" value="<?= $vegetable->pk_vegetables ?>" id="<?= $vegetable->label ?>">
                    <label for="<?= $vegetable->pk_vegetable ?>"><?= $vegetable->label ?></label> <br>
        <?php } ?>
        <button type="button" onclick="goBack(5)"><- Zurück</button>
        <button  type="button" onclick="goNext(5, 'vegetables')">Fertig -></button>
</div>
<!-- See order -->
<div id="slide6">
    
                <h2>Ihre Auswahl:</h2>
                    <label for="breadId">Brot: </label>
                    <input type="text" name="" id="breadName" readonly>
                    <input type="number" name="bread" id="breadId" style="display: none;">
                    <br>
                
                
                <label for="cheeseId">Käse: </label>
                    <input type="text" name="" id="cheeseName" readonly>
                    <input type="number" name="cheese" id="cheeseId" style="display: none;">
                    <br>
                <label for="meatId">Fleisch: </label>
                    <input type="text" name="" id="meatName" readonly>
                    <input type="number" name="meat" id="meatId" style="display: none;">
                    <br>
                <label for="sauceId">Sauce: </label>
                    <input type="text" name="" id="sauceName" readonly>
                    <input type="number" name="sauce" id="sauceId" style="display: none;">
                    <br>
                
                <label for="vegetablesId">Gemüse: </label>
                    <input type="text" name="" id="vegetablesName" readonly>
                    <input type="text" name="" id="vegetablesId" style="display: none;">
                    <br>
                <button type="button" onclick="goBack(6)"><- Zurück</button>
                
                <button type="submit">Bestellen -></button>
            
   
</div>
</form>    

<?php include 'app/Controllers/inc/footer.inc.php'; ?>