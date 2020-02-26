<header>

<?php

if (isset($_SESSION['id'])) {
    ?>
    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo right">ToDo App</a>
    <ul>
        <li><a href="logout.php">Logout</a></li>
        <!-- <li>About</li> -->
        <!-- <li><a href="register.php">Register</a></li> -->
    </ul>
    </nav>
    <!-- <a href="logout.php">Logout</a> -->
<?php
} else {
    ?>
    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo right">ToDo App</a>
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

