<?php
class View
{

    public function printTodos($todos) {

        require_once "../src/templates/head.php";
        require_once "../src/templates/header.php";
        require_once "../src/templates/login_inputs.php";

        if (!isset($_SESSION['id'])) {
            echo "<img id='hero' src='assets/to-do.jpeg' alt='to-do-app.jgp'>";
        } else {
            $num= $_SESSION['count'];
            $user = $_SESSION['user'];
            echo "<h1>To-Do App</h1>";
            echo "<h2>Hi, $user! You have $num to-dos</h2>";
            
            echo "<div class='add-new-todo'>";
            include_once "../src/templates/add_todo.php";
            echo "</div>";
        
            echo "<h3>My To-Do-s</h3>";
            echo "<div class='filter-buttons'>";
            echo "<form action='index.php' method='POST'>";
            echo "<button type='submit' name='allBtn' value='' class='waves-effect waves-teal btn'>All</button>";
            echo "<button type='submit' name='todayBtn' value='' class='waves-effect waves-teal btn'>For Today</button>";
            echo "<button type='submit' name='overdueBtn' value='' class='waves-effect waves-orange btn red'>Already Overdue</button>";
            echo "</form>";
            echo "</div>";

        foreach ($todos as $key => $row) { 
            
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