<?php
class Controller
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    private function postReq() {
        // echo "Post request<br>";
        // var_dump($_POST);

        if(isset($_POST['addBtn'])) {
            // var_dump($_POST);
            $this->model->addTodo();
        } elseif (isset($_POST['delBtn'])) {
            // var_dump($_POST);
            $this->model->deleteTodos();
        } elseif (isset($_POST['updateBtn'])) {
            $this->model->updateTodos();
        } else {
            echo "What button did you press??";
            var_dump($_POST);
        }
    }

    public function route()
    {
        //GETS are for retrieval only
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