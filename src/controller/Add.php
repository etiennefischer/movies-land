<?php

class Add {

    private $title;
    private $newMovie;
    private $updtMovie;
    private $model;
    private $successmg;
    private $detailsmsg;
    private $listApi;
    

    public function __construct ()
    {

        $this->title = 'Add a movie';
        $this->model = new Model();

    }

    public function manage() {

        $allCat = $this->model->getCat();
        //var_dump($_POST);

        if (isset($_POST['name']) and isset($_POST['poster']) and isset($_POST['rating']) and !isset($_GET['modify'])) {

                var_dump($_POST);

            if ($_POST['name'] === '' OR $_POST['poster'] === '' OR $_POST['rating'] === '') {

                if  ($_POST['name'] === '') {
                    $this->detailsmsg = '<p class="is-size-4 has-text-white has-background-danger has-text-centered">Name</p>';
                }
            
                if  ($_POST['poster'] === '') {
                    $this->detailsmsg = $this->detailsmsg . '<p class="is-size-4 has-text-white has-background-danger has-text-centered">Poster</p>';
                }
            
                if  ($_POST['rating'] === '') {
                    $this->detailsmsg = $this->detailsmsg . '<p class="is-size-4 has-text-white has-background-danger has-text-centered">Rating</p>';
                }
        
                $this->errorMsg ='🙈 Please fill in : ' . $this->detailsmsg;
        
            } else {

                if (!isset($_POST['watched'])) {

                    $_POST['watched'] = "off";
                }

                    $this->newMovie= $this->model->saveMovie($_POST['name'], $_POST['category'], $_POST['poster'], $_POST['rating'], $_POST['watched'],'0');
                    $this->successmg = '😎 Movie added';
                    //$_SESSION['profileSet'] = $_POST["name"];
                
            }
        
        }

        if (isset($_GET['modify'])) {

            $modifMovie = $this->model->getMovieId($_GET["modify"]);
            $allCat = $this->model->getCat();

            if ($modifMovie['film_is_watched'] == "on") {

                $check = "checked";

            } else {

                $check = "";

            }

            if (isset($_POST['name']) OR isset($_POST['category']) OR isset($_POST['poster']) OR isset($_POST['rating']) OR isset($_POST['watched'])) {

                if ($_POST['name'] === '' OR $_POST['rating'] === '' OR $_POST['poster'] === '') {

                    $this->successmg = 'Please fill in the fields';

                } else {

                    $this->updtMovie= $this->model->updateMovie($_POST['name'], $_POST['category'], $_POST['poster'], $_POST['rating'], $_POST['watched'],$_GET['modify']);
                    $this->successmg = '😎 Movie updated';
                    $modifMovie = $this->model->getMovieId($_GET["modify"]);
                    
                }

                
    
            } 

        }


        if (isset($_POST['apiName'])) {

            $entry = str_replace(' ', '+', $_POST['apiName']);

            $resultApi = $this->listApi = $this->model->getTMDB($entry);

            

        }

        if (isset($_GET['movie_api'])) {


            $detailApi = $this->model->getTMDBDetails($_GET['movie_api']);
            $detailVideo = $this->model->getTMDBvideo($_GET['movie_api']);
    
        }

        if (isset($_GET['api_add'])) {

            $detailApi = $this->model->getTMDBDetails($_GET['api_add']);
            $detailVideo = $this->model->getTMDBvideo($_GET['api_add']);
            $saveMovieApi = $this->model->saveMovieAPI($detailApi->original_title, 'https://image.tmdb.org/t/p/w185' . $detailApi->poster_path, $detailApi->id);
            $this->successmg = '😎 Movie added';
    
        }

        if (isset($_GET['wish'])) {

            $detailApi = $this->model->getTMDBDetails($_GET['wish']);
            $detailVideo = $this->model->getTMDBvideo($_GET['wish']);
            $saveMovieApi = $this->model->saveMovieWish($detailApi->original_title, 'https://image.tmdb.org/t/p/w185' . $detailApi->poster_path, $detailApi->id,'1');
            $this->successmg = '😎 Movie added to WishList';
    
        }




        include (__DIR__ . './../view/view_add.php');

    }


}

?>