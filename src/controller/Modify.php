<?php

class Modify {

    private $title;
    private $movieModify;
    private $model;
    private $successmg;
    private $detailsmsg;
    

    public function __construct ()
    {

        $this->model = new Model();

    }

    public function manage() {


        // if (isset($_POST['name']) and isset($_POST['age']) and isset($_POST['city']) and isset($_POST['gender'])) {

        //         //var_dump($_POST);

        //     if ($_POST['name'] === '' OR $_POST['age'] === '' OR $_POST['city'] === '' OR $_POST['gender'] === '') {

        //         if  ($_POST['name'] === '') {
        //             $this->detailsmsg = '<p class="is-size-4 has-text-white has-background-danger has-text-centered">Name</p>';
        //         }
            
        //         if  ($_POST['age'] === '') {
        //             $this->detailsmsg = $this->detailsmsg . '<p class="is-size-4 has-text-white has-background-danger has-text-centered">Age</p>';
        //         }
            
        //         if  ($_POST['city'] === '') {
        //             $this->detailsmsg = $this->detailsmsg . '<p class="is-size-4 has-text-white has-background-danger has-text-centered">City</p>';
        //         }

        //         if  ($_POST['gender'] === '') {
        //             $this->detailsmsg = $this->detailsmsg . '<p class="is-size-4 has-text-white has-background-danger has-text-centered">Gender</p>';
        //         }
        
        //         $this->errorMsg ='🙈 Please fill in : ' . $this->detailsmsg;
        
        //     } else {

        //         if (isset($_FILES["picture"]) and !empty($_FILES["picture"]["name"])) {

        //             //var_dump($_FILES["picture"]);

        //             $imgReady = $this->model->uploadImg($_FILES);

        //             if($imgReady->error) {

        //                 $this->errorMsg = $imgReady->error;
    
        //             }
        
        //         } else {

        //             $imgReady = (object)["name"=>NULL];

        //         }
                
        //             $this->newProfile= $this->model->saveProfile($_POST['name'], $_POST['age'], $_POST['city'], $_POST['gender'],$imgReady->name,$_SESSION['logged']);
        //             $this->successmg = '😎 Profile added';
        //             $_SESSION['profileSet'] = $_POST["name"];

                
                
        //     }
        
        // }


        // if(isset($_GET['modify'])) {

        //     $modifMovie = $this->model->getMovieId($_GET["modify"]);
        //     $allCat = $this->model->getCat();

        // }
        

        
        //include (__DIR__ . './../view/view_add.php');

    }


}

?>