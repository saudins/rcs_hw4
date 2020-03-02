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

            if (isset($_GET['search-sum'])) {
                $filterValue = $_GET['search-sum'];
            } else {
                $filterValue = "";
            }
            
            $user = $_SESSION['user'];
            echo "<img id='hero-crop' src='assets/to-do-crop.jpg' alt='to-do-app.jgp'>";
            // echo "<h1>ToDo App</h1>";
            echo "<h2>Hi, $user!</h2>";
            
            echo "<div class='add-new-todo'>";
            include_once "../src/templates/add_todo.php";
            echo "</div>";
        
            include_once "../src/templates/search.php";

            echo "<h3>Your ToDo-s</h3>";
            include_once "../src/templates/filter_buttons.php";


            foreach ($todos as $key => $row) { 
            
            // echo "<div class='todos-cont'>";
            echo "<form action='index.php' method='POST'>";
            echo "<ul class='collapsible'>";
            echo "<li>";
            
            $rowid = $row['id'];
            
            foreach ($row as $colname => $cell) {

                    switch ($colname) {
                        case "summary":
                            echo "<div class='collapsible-header'><i class='material-icons'>assignment</i>$cell</div>";
                            echo "<div class='collapsible-body'>";
                            echo "<label for='summary'>Summary</label>";
                            echo "<input class='todos-cell' type='text' name='summary' value='$cell'></input>";
                            break;
                        case "description";
                            
                            echo "<label for='description'>Description</label>";
                            echo "<input class='todos-cell' type='text' name='description' value='$cell'></input>";
                            break;
                        case "deadline":
                            echo "<label for='deadline'>Deadline</label>";
                            echo "<div class='dead-time'>";
                            echo "<span class='todos-cell'>$cell</span>";
                            echo "</div>";
                    }
            }

            echo "<div class='action-buttons'>";
            // echo "<button type='submit' name='doneBtn' id='doneBtn' value='$rowid' class='waves-effect waves-teal btn'>Mark As Done</button>";
            echo "<button type='submit' name='delBtn' value='$rowid' class='waves-effect waves-teal btn teal lighten-2'>Delete</button>";
            echo "<button type='submit' name='updateBtn' value='$rowid' class='waves-effect waves-teal btn teal lighten-2'>Update</button>";
            echo "</div>";
            echo "</div>";
            echo "</li>";
            echo "</ul>";
            echo "</form>";
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