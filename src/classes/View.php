<?php
class View
{
    public function render()
    {
        //print all screen?
    }

    public function getTodos()
    {
        require_once "../templates/head.php";
        echo "<h1>THIS IS THE BEGINNING!</h1>";
        require_once "../templates/footer.php";
    }



}