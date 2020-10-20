<?php

class Whishlist {

    private $title;
    private $listWhished;
    private $model;

    public function __construct ()
    {

        $this->title = 'Whishlist';
        $this->model = new Model();

    }

    public function manage() {

        $this->listWhished = $this->model->getAllWhished('0','1');

        if(isset($_POST['year'])) {

            $resultBest = $this->model->getTmdbBest($_POST['year']);

        }

        if($this->listWhished === false) {
            $this->errorMsg ='Sorry unable to fetch data';
        }

        include (__DIR__ . './../view/view_whishlist.php');

    }



}


?>