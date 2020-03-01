<?php

if (!isset($_SESSION['id'])) {
    ?>

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="User" required></input>
    <input type="password" name="pw" placeholder="Password" required></input>
    <p>
        <label for="rem-chk">
            <input type="checkbox" name="rememberMe" id="rem-chk">
            <span>Remember Me</span>
        </label>
    </p>
    <div>
        <button type="submit" name="loginBtn" class="btn waves-effect waves-light">
        <i class="material-icons right">arrow_right_alt</i>
        LOGIN
        </button>
    </div>
</form>

<?php
} else {
?>
<!-- <a href="logout.php">Logout</a> -->
<?php
}
?>