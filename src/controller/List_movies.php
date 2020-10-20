<?php

class List_movies {

    private $title;
    private $model;
    private $listMovies;
    private $errorMsg;

    public function __construct ()
    {

        $this->title = 'All movies';
        $this->model = new Model();
    }

    public function manage() {

        if(!isset($_GET['filter'])) {

            $this->listMovies = $this->model->getAllUnarchMovies('0','0');

        }

        if(isset($_GET['filter']) and $_GET['filter'] === 'unwatch') {
            
            $this->listMovies = $this->model->watchStatus('off','0');
            
        }

        if(isset($_GET['filter']) and $_GET['filter'] === 'watch') {
            
            $this->listMovies = $this->model->watchStatus('on','0');
            
            
        }

        if(isset($_GET['filter']) and $_GET['filter'] === 'rating') {
            
            $this->listMovies = $this->model->ratingOrd('0');
            
        }

        if(isset($_GET['filter']) and $_GET['filter'] === 'alpha') {
            
            $this->listMovies = $this->model->alphaOrd('0');
            
        }


        if ($this->listMovies == []) {

            $this->successmg = '🤷 No movies for now';
            $this->listMovies = $this->model->getAllUnarchMovies('0','0');

        }

        if($this->listMovies === false) {
            $this->errorMsg ='Sorry unable to fetch data';
        }

        //Loop all movies if api -> index


        include (__DIR__ . './../view/view_list.php');

    }


    

}



?>