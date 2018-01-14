<?php

if(isset($_POST['submitLogout']))
{
    logOut();
}

function logOut()
{
    unset($_SESSION['user']);
    session_destroy();
}
?>