<?php
class View
{
    public function printTodos($todos) {

        require_once "../src/templates/head.php";
        require_once "../src/templates/header.php";
        require_once "../src/templates/login_inputs.php";

        // echo "<h1>My ToDo App</h1>";
        
        if (!isset($_SESSION['id'])) {
            echo "<img src='../../public/assets/to-do.jpeg' alt='to-do-app.jgp'>";
        } else {
            echo "<div class='add-new-todo'>";
            // echo "<h2>Hi $name</h2>";
            echo "<h2>Add new Todo</h2>";
            include_once "../src/templates/add_todo.php";
            echo "</div>";
            echo "<h2>Printing todos</h2>";
        // foreach ($todos as $todo) {
        //     echo "<br>";
        //     print_r($todo);
        // }

        $areColumnsSet = false;

        foreach ($todos as $index => $row) {
            // if (!$areColumnsSet) {
            //     echo "<div class='todos-header-cont'>";
            //     foreach ($row as $colname => $cell) {
            //         echo "<span class='col-fields'>$colname</span>";
            //     }
            //     echo "</div>";
            //     $areColumnsSet = true;
            // }
        
            echo "<div class='todos-cont'>";
            echo "<form action='index.php' method='POST'>";
            $rowid = $row['id'];
            foreach ($row as $colname => $cell) {
                switch ($colname) {
                    case "summary":
                        echo "<label for='summary'>Summary</label>";
                        echo "<input class='todos-cell' type='text' name='summary' value='$cell'></input>";
                        break;
                    case "description":
                        echo "<label for='description'>Description</label>";
                        echo "<input class='todos-cell' type='text' name='description' value='$cell'></input>";
                        break;
                    case "deadline":
                        echo "<label for='deadline'>Deadline</label>";
                        echo "<div>";
                        echo "<span class='todos-cell'>$cell</span>";
                        echo "</div>";
                    default:
                        echo "<div>";
                        echo "<span class='todos-cell'></span>";
                        echo "</div>";
                        break;
                }
            }
            echo "<div class='two-buttons'>";
            echo "<button type='submit' name='delBtn' name='delBtn' value='$rowid' class='waves-effect waves-teal btn-flat'>Delete</button>";
            echo "<button type='submit' name='updateBtn' value='$rowid' class='waves-effect waves-teal btn-flat'>Update</button>";
            echo "</div>";

            echo "</form>";
            echo "</div>";
        }

        }
                require_once "../src/templates/footer.php";
    }

    public function printRegister()
    {
        require_once "../src/templates/head.php";
        require_once "../src/templates/header.php";
        require_once "../src/templates/register_inputs.php";
        require_once "../src/templates/footer.php";

    }

    public function registerOK() {
        require_once "../src/templates/head.php";
        require_once "../src/templates/login_ok.php";
        require_once "../src/templates/footer.php";

    }
}