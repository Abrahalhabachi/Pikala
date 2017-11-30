<?php if(isset($error)): ?>
    <div class=error>
    <?php echo ($error); ?>
    </div>
<?php endif; ?>


<form action="" method="post">

    <div>
        <label for="uname">User Name</label>
        <input type="text" name="uname" id="uname" placeholder="Enter your Username" required
        value="<?=isset($error)&&isset($_POST['uname']) ? htmlspecialchars($_POST['uname']):''?>">
    </div>

    <div>
        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd" placeholder="Enter a password" required>
    </div>

    <div>
        <label for="pwd2">Password</label>
        <input type="password" name="pwd2" id="pwd2" placeholder="Enter you password again" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your Email adress" required
        value="<?=isset($error)&&isset($_POST['email']) ? htmlspecialchars($_POST['email']):''?>">
    </div>
    <div>
    <input type="submit" name="sendForm" value="Neue Note anlegen">
    </div>
</form>