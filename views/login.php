<div class="login-wrapper">
    <div class="login-modal">
        <div class="img-shadow"></div>
        <div class="img"></div>
        <div class="title">LOGIN</div>

        <form action="<?=$_SERVER['PHP_SELF'].'?p=home';?>" method="post">
            <label for="loginName">Email</label>
            <input type="text" name="validationName" id="loginName" placeholder="Email address" required
            <?=isset($_POST['validationName']) ? 'value="'.htmlspecialchars($_POST['validationName']).'"' : ''?>>
            
            <label for="loginPassword">Password</label>
            <input type="password" name="validationPassword" id="loginPassword" placeholder="Password" required>
            
            <input type="submit" name="submitLogin" value="log in">
            <a href="<?=$_SERVER['PHP_SELF']?>?p=register">Create a new account</a>
            
            <div class="clear"></div>
        </form>
    </div>
</div>