<?php
session_start();
session_unset();
setcookie("uid", "", time() - 3600);
header('Location: /');