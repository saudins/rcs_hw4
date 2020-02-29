<?php
class Model
{
    private $conn = null;
    private $view;

    public function __construct($config, View $view)
    {
        $this->view = $view;
        $server = $config['server'];
        $db = $config['db'];
        $user = $config['user'];
        $pw = $config['pw'];
        $this->conn = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pw);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "<hr>Connected Successfully!<hr>";
    }

    public function getTodos() {
        $userid = 0; //we assume we are not logged in yet
        if (isset($_SESSION['id'])) {
            // die("Need to figure out what to show when user is not logged in");
            $userid = $_SESSION['id'];
            //consider not doing anything maybe
        }
        $stmt = $this->conn->prepare(
            "SELECT id, summary, description, deadline
            FROM todos
            WHERE user_id = $userid");
        // $stmt->bindParam(':todo', $todos);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $allRows = $stmt->fetchAll();
        // var_dump($allRows);
        $this->view->printTodos($allRows);
    }

    public function getCountOfAllTodos() {
        $userid = 0; //we assume we are not logged in yet
        if (isset($_SESSION['id'])) {
            // die("Need to figure out what to show when user is not logged in");
            $userid = $_SESSION['id'];
            //consider not doing anything maybe
        }
        $stmt = $this->conn->prepare(
            "SELECT *
            FROM todos
            WHERE user_id = $userid");
        // $stmt->bindParam(':todo', $todos);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $allRows = $stmt->fetchAll();
        // var_dump($allRows);
        $num_rows = mysqli_num_rows($allRows);
        return $num_rows;
    }

    public function getTodosForToday() {
        $userid = 0; //we assume we are not logged in yet
        if (isset($_SESSION['id'])) {
            // die("Need to figure out what to show when user is not logged in");
            $userid = $_SESSION['id'];
            //consider not doing anything maybe
        }
        $stmt = $this->conn->prepare(
            "SELECT id, summary, description, deadline
            FROM todos
            WHERE user_id = $userid and deadline = CURDATE()");
        // $stmt->bindParam(':todo', $todos);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $allRows = $stmt->fetchAll();
        // var_dump($allRows);
        $this->view->printTodos($allRows);
    }

    public function getTodosOverdue() {
        $userid = 0; //we assume we are not logged in yet
        if (isset($_SESSION['id'])) {
            // die("Need to figure out what to show when user is not logged in");
            $userid = $_SESSION['id'];
            //consider not doing anything maybe
        }
        $stmt = $this->conn->prepare(
            "SELECT id, summary, description, deadline
            FROM todos
            WHERE user_id = $userid and deadline < CURDATE()");
        // $stmt->bindParam(':todo', $todos);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $allRows = $stmt->fetchAll();
        // var_dump($allRows);
        $this->view->printTodos($allRows);
    }

    public function addTodo() {
       
        if (!isset($_SESSION['id'])) {
            die("Need to figure out what to show when user is not logged in");
            //consider not doing anything maybe
        }

        $stmt = $this->conn->prepare("INSERT 
        INTO todos (summary, description, deadline, user_id)
        VALUES (:summary, :description, :deadline, :user_id)");
        $stmt->bindParam(':summary', $_POST['summary']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':deadline', $_POST['deadline']);
        $stmt->bindParam(':user_id', $_SESSION['id']);

        $stmt->execute();
        $this->getTodos();

        // INSERT INTO `todos` (`id`, `summary`, `description`, `deadline`, `created`, `updated`, `user_id`) 
        // VALUES (NULL, 'New todo', 'Some longer description text', '2020-02-28 00:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1')
    }
    
    public function deleteTodos()
    {
        if (!isset($_SESSION['id'])) {
            return;
        }

        $stmt = $this->conn->prepare("DELETE FROM todos WHERE id = (:todoid)");

        $stmt->bindParam(':todoid', $_POST['delBtn']);
        $stmt->execute();
        $this->getTodos();
        //"DELETE FROM `todos` WHERE `todos`.`id` = 3"
    }

    public function updateTodos()
    {
        $stmt = $this->conn->prepare("UPDATE todos
                SET summary = (:summary),
                description = (:description),
                updated = CURRENT_TIMESTAMP()
                WHERE id = (:todoid)");

        $stmt->bindParam(':summary', $_POST['summary']); //we have <input name="name"
        $stmt->bindParam(':description', $_POST['description']); //we have <input name="artist"

        $stmt->bindParam(':todoid', $_POST['updateBtn']);
        $stmt->execute();
        $this->getTodos();
        //UPDATE `todos` SET `summary` = 'Finish final home work quickly' WHERE `todos`.`id` = 3
    }

    public function getRegister()
    {
        $this->view->printRegister();
    }

    public function getId($username)
    {
        //return user id or 0 if no such user
        $stmt = $this->conn->prepare("SELECT
        id FROM users
        WHERE (name = :name)
    ");
        $stmt->bindParam(':name', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            // var_dump($result);
            // die("For now");
            return $result[0]['id'];
        } else {
            return 0;
        }
    }

    public function getHash($username)
    {
        $stmt = $this->conn->prepare("SELECT
        hash FROM users
        WHERE (name = :name)
    ");
        $stmt->bindParam(':name', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            // var_dump($result);
            // die("For now");
            return $result[0]['hash'];
        } else {
            return 0;
        }
    }

    public function addNewUser()
    {
        if ($this->getHash($_POST['username']) != 0) {
            // die("Got this user already");
            //or possible bad hash
            header('Location: /register.php');
            exit();
        }

        if ($_POST['pw1'] !== $_POST['pw2']) {
            header('Location: /register.php');
            // echo ("Passwords don't match"); 
            exit();
        } else {
            //https://stackoverflow.com/questions/1361340/how-to-insert-if-not-exists-in-mysql
            $stmt = $this->conn->prepare("INSERT INTO `users`
            (`id`, `name`, `email`, `hash`, `created`)
            VALUES (NULL, :name, :email, :hash, current_timestamp())");
            $stmt->bindParam(':name', $_POST['username']);
            $stmt->bindParam(':email', $_POST['email']);
            $hash = password_hash($_POST['pw1'], PASSWORD_DEFAULT);
            $stmt->bindParam(':hash', $hash);

            $stmt->execute();
            $this->view->registerOK();
            }
        }
        
}

?>