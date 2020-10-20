<?php

class Archives {

    private $title;
    private $listArchMovies;
    private $model;

    public function __construct ()
    {

        $this->title = 'Archives';
        $this->model = new Model();

    }

    public function manage() {

        $this->listArchMovies = $this->model->getAllUnarchMovies('1','0');

        

        if($this->listArchMovies === false) {
            $this->errorMsg ='Sorry unable to fetch data';
        }

        include (__DIR__ . './../view/view_archive.php');

    }



}


?>