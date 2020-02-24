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
        //we could skip the above 4 and just put the $config[key] directly below
        $this->conn = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pw);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<hr>Connected Successfully!<hr>";
    }


}
?>