<?php
session_start();
if ($_GET['lvl'] == 1) {
    $_SESSION['lvl'] = 1;
}elseif ($_GET['lvl'] == 2) {
    $_SESSION['lvl'] = 2;
}elseif ($_GET['lvl'] == 3) {
    $_SESSION['lvl'] = 3;
}else {
    $_SESSION['lvl'] = 4;
}

header('Location:soal.php');
?>