<div class="container-1000px">
<form action="#" method="post" class="personal-data">

<div class="left">
<div class="img">
    <img src="<?=ROOTPATH?>assets/images/login_icon.png" alt="<?=$_SESSION['user'][2]?>">
</div>
</div>

<div class="right">
    <div>
        <label for="fname">Vorname</label>
        <input type="text" name="fname" id="fname" value="<?= htmlspecialchars($_SESSION['user'][2])?>"> 
    </div>
    <div>
        <label for="lname">Nachname</label>
        <input type="text" name="lname" id="lname" value="<?= htmlspecialchars($_SESSION['user'][3])?>">
    </div>
    <div>
        <label for="email">E-Mail</label>
        <input type="text" name="email" id="email" value="<?= htmlspecialchars($_SESSION['user'][1])?>">
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<?= htmlspecialchars($_SESSION['user'][4])?>">
    </div>
    
    <input type="submit" value="Neue Daten speichern" name="submitNewData">
</div>

</form>
</div>