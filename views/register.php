<?php
require_once './core/register_function.php';

if(isset($error)): ?>
    <div class=error>
    <?php echo ($error); ?>
    </div>
<?php endif;
if(isset($_POST['pwd'])&&isset($_POST['pwd2'])&&($_POST['pwd2']!==$_POST['pwd']))
$error="The passwords don't match";
?>

<div class="login-wrapper">
    <div class="login-modal">
        <div class="img-shadow"></div>
        <div class="img"></div>
        <div class="title">REGISTER</div>

        <form action="<?=$_SERVER['SCRIPT_NAME']?>?p=Register" method="post">

        <label for="fname">Firstname</label>
        <input type="text" name="fname" id="fname" placeholder="Firstname" required
        value="<?=isset($error)&&isset($_POST['fname']) ? htmlspecialchars($_POST['fname']):''?>">

        <label for="lname">Lastname</label>
        <input type="text" name="lname" id="lname" placeholder="Your Lastname" required
        value="<?=isset($error)&&isset($_POST['lname']) ? htmlspecialchars($_POST['lname']):''?>">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Your Email adress" required
        value="<?=isset($error)&&isset($_POST['email']) ? htmlspecialchars($_POST['email']):''?>">
    
        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd" placeholder="Your Password" required>
    
        <label for="pwd2">Password again</label>
        <input type="password" name="pwd2" id="pwd2" placeholder="Your Password again" required>

        <label for="street">Street</label>
        <input type="text" name="street" id="street" placeholder="Name of the Street" required
        value="<?=isset($error)&&isset($_POST['street']) ? htmlspecialchars($_POST['street']):''?>">

        <label for="house number">House Number</label>
        <input type="number" name="house_n" id="house_n" placeholder="Your House Number" required
        value="<?=isset($error)&&isset($_POST['house_n']) ? htmlspecialchars($_POST['house_n']):''?>">

        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="Your City" required
        value="<?=isset($error)&&isset($_POST['city']) ? htmlspecialchars($_POST['city']):''?>">

        <label for="zip_code">Zip Code</label>
        <input type="text" name="zip_code" id="zip_code" placeholder="Your City" required
        value="<?=isset($error)&&isset($_POST['zip_code']) ? htmlspecialchars($_POST['zip_code']):''?>">
    
        <div>
        <input type="submit" name="submitRegister" value="Register">
        </div>
            
            <div class="clear"></div>
        </form>
    </div>
</div>