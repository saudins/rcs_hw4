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
        echo "<hr>Connected Successfully!<hr>";
    }

    public function getTodos() {
        $stmt = $this->conn->prepare(
            "SELECT *
            FROM todos
            WHERE user_id = 1");
        // $stmt->bindParam(':todo', $todos);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $allRows = $stmt->fetchAll();
        // var_dump($allRows);
        $this->view->printTodos($allRows);
    }

    public function addTodo() {
        $stmt = $this->conn->prepare("INSERT 
        INTO todos (summary, description, deadline, user_id)
        VALUES (:summary, :description, :deadline, :user_id)");
        $stmt->bindParam(':summary', $_POST['summary']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':deadline', $_POST['deadline']);
        $stmt->bindParam(':user_id', 1);

        $stmt->execute();
        $this->getTodos();

        // INSERT INTO `todos` (`id`, `summary`, `description`, `deadline`, `created`, `updated`, `user_id`) 
        // VALUES (NULL, 'New todo', 'Some longer description text', '2020-02-28 00:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1')
    }
    
    public function deleteTodos()
    {
        $stmt = $this->conn->prepare("DELETE FROM todos WHERE id = (:todoid)");

        $stmt->bindParam(':todoid', $_POST['delBtn']);
        $stmt->execute();
        $this->getSongs();
        //"DELETE FROM `todos` WHERE `todos`.`id` = 3"
    }

    public function updateSongs()
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
        $this->getSongs();
        //UPDATE `todos` SET `summary` = 'Finish final home work quickly' WHERE `todos`.`id` = 3
    }

}

?>