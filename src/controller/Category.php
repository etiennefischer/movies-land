<?php

class Category {

    private $title;
    private $listCat;
    private $delCat;
    private $nouvCat;
    private $model;

    public function __construct ()
    {

        $this->title = 'Manage categories';
        $this->model = new Model();

    }

    public function manage() {


        $this->listCat = $this->model->getCat();

        if (isset($_POST['category'])) {

            $this->nouvCat = $this->model->addCat($_POST['category']);
            $this->listCat = $this->model->getCat();

        }


        if (isset($_GET['delete'])) {
            
            $this->delCat = $this->model->deleteCat($_GET['delete']);
            $this->listCat = $this->model->getCat();
           
        }

        if ($this->listCat == []) {

            $this->successmg = '🤷 No category for now';
            $this->listCat = $this->model->getCat();

        }

        
        include (__DIR__ . './../view/view_category.php');

    }



}


?>