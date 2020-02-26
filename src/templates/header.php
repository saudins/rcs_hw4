<header>

<?php

if (isset($_SESSION['id'])) {
    ?>
    <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <!-- <li>About</li> -->
        <!-- <li><a href="register.php">Register</a></li> -->
    </ul>
    </nav>
    <!-- <a href="logout.php">Logout</a> -->
<?php
} else {
    ?>
    <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <!-- <li>About</li> -->
        <li><a href="register.php">Register</a></li>
    </ul>
    </nav>

<?php
}
?>
</header>
