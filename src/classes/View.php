<?php
class View
{
    public function render()
    {
        //function to print all screen later? 
    }

    public function getTodos()
    {
        require_once "../src/templates/head.php";
        echo "<h1>THIS IS THE BEGINNING!</h1>";


        require_once "../src/templates/footer.php";
    }



}