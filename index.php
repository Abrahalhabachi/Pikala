<?php

session_start();
require_once './core/path_config.php';
require_once './core/db_config.php'; 
require_once './core/register_function.php';
require_once './core/login_function.php';
require_once './core/logout_function.php';
require_once './core/add_bike_function.php';
require_once './model/user.class.php';
require_once './model/bike.class.php';


if (isset($_POST['submitLogin']))
{
    $error=true;
    $user = logIn($error);
    if(!$error)
    {
        $_SESSION['user'] = array($user->__get('id'), $user->__get('email'), $user->__get('first_name'), $user->__get('last_name'),
        $user->__get('street').' '.$user->__get('house_number').' '.$user->__get('city').' '.$user->__get('zip_code'));
    }
}

if (isset($_POST['submitRegister']))
{
    $error=true;
    $user = register($error);
}

if (isset($_POST['submitBike']))
{
    $error=true;
    $bike = add_bike($error);
}

$loggedIn = isset($_SESSION['user']);
$title = $_GET['p'] ?? 'home';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
    <link rel="stylesheet" href="assets/styles/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/font-awesome.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">
   
    <title><?=$title?></title>
</head>
<body>



<?php

$page = $_GET['p'] ?? 'home';
if($loggedIn)
{
    include (VIEWPATH.'site.php');
}
else
{
    switch($page)
    {
        case 'about':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'pages/about.php');
        break;
    
        case 'sitemap':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'pages/sitemap.php');
        break;
    
        case 'register':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'register.php');
        break;
        
        case 'login':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'login.php');
        break;

        case 'result':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'result.php');
        break;

        case 'home':
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'home.php');
        break;
    
        default:
        include (VIEWPATH.'header.php');
        include (VIEWPATH.'home.php');
        break;
            
    }
}
?>


<?php if(isset($error) && $error !== false) : ?>
            <div class="error">
                <span onclick="{this.parentNode.parentNode.removeChild(this.parentNode);}">
                    x
                </span>
                <?=$error?>
            </div>
        <?php endif; ?>

</main>
    
<footer>
    <?php
    include (VIEWPATH.'footer.php');
    ?>
</footer>

</body>
</html>