<?php

if (!isset($_SESSION['id'])) {
    ?>

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="User" required></input>
    <input type="password" name="pw" placeholder="Password" required></input>
    <!-- <label for="rem-chk">Remember Me
    <input type="checkbox" name="rememberMe" id="rem-chk">
    </label> -->
    <button type="submit" name="loginBtn" class="btn waves-effect waves-light">LOGIN
    </button>
</form>

<?php
} else {
?>
<!-- <a href="logout.php">Logout</a> -->
<?php
}
?>