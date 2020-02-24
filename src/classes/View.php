<?php
class View
{
    public function printTodos($todos) {
        require_once "../src/templates/head.php";
        require_once "../src/templates/header.php";
        echo "<h1>My ToDo App</h1><hr>";

        echo "<h2>Printing todos</h2>";
        // foreach ($todos as $todo) {
        //     echo "<br>";
        //     print_r($todo);
        // }

        $areColumnsSet = false;

        foreach ($todos as $index => $row) {
            if (!$areColumnsSet) {
                echo "<div class='tracks-header-cont'>";
                foreach ($row as $colname => $cell) {
                    echo "<span class='col-fields'>$colname</span>";
                }
                echo "</div>";
                $areColumnsSet = true;
            }
        
        echo "<div class='todos-cont'>";
        echo "<form action='index.php' method='POST'>";
        $rowid = $row['id'];
        echo "<button type='submit' name='delBtn' value='$rowid'>Delete</button>";
        echo "<button type='submit' name='updateBtn' value='$rowid'>Update</button>";
        foreach ($row as $colname => $cell) {
            switch ($colname) {
                // case "summary":
                //     echo "<input class='track-cell' type='text' name='name' value='$cell'></input>";
                //     break;
                // case "artist":
                //     echo "<input class='track-cell' type='text' name='artist' value='$cell'></input>";
                //     break;
                default:
                    echo "<span class='track-cell'>$cell</span>";
                    break;
            }
        }
        echo "</form>";
        echo "</div>";
        }
        require_once "../src/templates/footer.php";
    }
}