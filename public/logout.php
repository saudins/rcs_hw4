<?php
session_start();
session_unset();
session_destroy();
setcookie("uid", "", time() - 3600);
header('Location: /');