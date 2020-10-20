<?php

class Details {

    private $title;
    private $listAMovie;
    private $model;

    public function __construct ()
    {

        $this->title = 'Movie info';
        $this->model = new Model();

    }

    public function manage() {

        if(isset($_GET['index']) and !isset($_GET['archive'])) {
        
        $this->listAMovie = $this->model->getMovieId($_GET["index"]);

        } // delete

        if(isset($_GET['archive'])) {

            $this->listAMovie = $this->model->setArchive('1',$_GET['index']);
            $this->successmg = '😎 Movie archived';
            $this->listAMovie = $this->model->getMovieId($_GET["index"]); // delete

        }

        if(isset($_GET['api_details'])) {

            $detailApi = $this->model->getTMDBDetails($_GET['api_details']);
            $detailVideo = $this->model->getTMDBvideo($_GET['api_details']);

        }

        //if get index -> getmovieID

        include (__DIR__ . './../view/view_details.php');

    }



}


?>