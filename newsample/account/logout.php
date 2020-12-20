<?php
setcookie("username", "", time() - 3600);
header("location: ../shoes_shop.php");
