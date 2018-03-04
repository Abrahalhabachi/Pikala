<?php
require_once './core/add_bike_function.php';
?>


<div class="login-wrapper">
    <div class="login-modal">
        <div class="title">BIKE</div>

        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>?p=home" method="post">

        <label for="biketype">Type</label>
        <select name="biketype">
            <option value="citybike">City Bike</option>
            <option value="mountain">Mountain Bike</option>
            <option value="tandem">Tandem</option>
            <option value="utility">Utility</option>
        </select> 

        <label for="manufacturer">Manufacturer</label>
        <input type="text" name="manufacturer" id="manufacturer" placeholder="Manufacturer" required
        value="<?= isset($error) && isset($_POST['manufacturer']) ? htmlspecialchars($_POST['manufacturer']) : '' ?>">

        <label for="year">Year</label>
        <input type="number" name="year" id="year" placeholder="Year of Manufacture" required
        value="<?= isset($error) && isset($_POST['year']) ? htmlspecialchars($_POST['year']) : '' ?>">
    
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="Price" step= "0.01" required
        value="<?= isset($error) && isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?>">


        <div>
        <input type="submit" name="submitBike" value="Finish">
        </div>
            
            <div class="clear"></div>
        </form>
    </div>
</div>