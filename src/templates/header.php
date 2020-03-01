<header>

<?php

if (isset($_SESSION['id'])) {
?>

    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo right">ToDo App</a>
    <ul>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </nav>

<?php
} else {
?>

    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo right">ToDo App</a>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
    </nav>

<?php
}
?>
</header>

