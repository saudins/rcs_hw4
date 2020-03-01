<?php
class Controller
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    private function getReq() {

        if (basename($_SERVER['PHP_SELF']) === 'register.php') {

            $this->model->getRegister();
            return;
        }

        if (isset($_GET['search-sum'])) {
                $this->model->getTodos($_GET['search-sum']);
        } else {
            $this->model->getTodos();
        }
           
       
    }


    private function postReq() {
        // echo "Post request<br>";
        // var_dump($_POST);
        if (basename($_SERVER['PHP_SELF']) === 'register.php') {
            // echo "Processing register post";
            $this->model->addNewUser();
            return;
        }

        if(isset($_POST['addBtn'])) {
            // var_dump($_POST);
            $this->model->addTodo();
        } elseif (isset($_POST['delBtn'])) {
            // var_dump($_POST);
            $this->model->deleteTodos();
        } elseif (isset($_POST['updateBtn'])) {
            $this->model->updateTodos();
        }elseif (isset($_POST['doneBtn'])) {
            $this->model->markAsDone();
        } 
        elseif (isset($_POST['todayBtn'])) {
            $this->model->getTodosForToday();
        } elseif (isset($_POST['overdueBtn'])) {
            $this->model->getTodosOverdue();
        } elseif (isset($_POST['allBtn'])) {
            $this->model->getTodos();
        } 
        else {
            echo "What button did you press??";
            var_dump($_POST);
        }
    }


    private function checkCookie()
    {
        if (isset($_COOKIE['uid'])) {
            $_SESSION['id'] = $_COOKIE['uid']; //NOT SAFE need to encrypt and check against encrypted version!
        }
        //TODO check on safety for setting session id directly
    }

    public function route()
    {
        $this->checkCookie();
        // //GETS are for retrieval only
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->getReq();
        }
        //POSTs are for changing something
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postReq();
        }
    }
}
?>