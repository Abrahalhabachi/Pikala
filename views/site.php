<header>
<nav>
    <ul>
        <li><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=user">Account Management</a></li>
        <li><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=page4">How it Works</a></li>
        <li><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=page5">About Us</a></li>
        <li><a href="<?=$_SERVER['SCRIPT_NAME']?>?p=page6">Share your Bike</a></li>
    </ul>
    <form action="<?=$_SERVER['PHP_SELF'].'?p=home';?>" method="post">
        <input type="submit" name="submitLogout" value="logout">
    </form>
</nav>
</header>

<main>

<?php
switch($page)
{
case 'user':

$user = user($_SESSION['user']);
include (VIEWPATH.'pages/user.php');
break;

case 'page4':

include (VIEWPATH.'pages/page4.php');
break;

case 'page5':

include (VIEWPATH.'pages/page5.php');
break;


case 'page6':

include (VIEWPATH.'pages/page6.php');
break;

case 'result':
include (VIEWPATH.'result.php');
break;

case 'home':
include (VIEWPATH.'home.php');
break;

default:
include (VIEWPATH.'home.php');
break;
    
}


?>

</main>

<footer>

</footer>