<?php

class Loans {

    private $title;
    private $listFilms;
    private $listLoans;
    private $newLoan;
    private $deleteLoan;
    private $model;

    public function __construct ()
    {

        $this->title = 'Manage Loans';
        $this->model = new Model();

    }

    public function manage() {


        $this->listFilms = $this->model->getAllUnarchMovies('0','0');
        $this->listLoans = $this->model->getLoans();

        if (isset($_POST['loaner']) and isset($_POST['dateLoan']) and isset($_POST['movies'])) {


            if ($_POST['loaner'] === '' OR $_POST['dateLoan'] === '') {


                $this->errorMsg ='🙈 Please fill in the fields';



            } else {

                $this->newLoan= $this->model->saveLoan($_POST['loaner'], $_POST['dateLoan'], $_POST['movies']);
                $this->successmg = '😎 Loan added';


            }


        }

        if (isset($_GET['delete'])) {
            
            $this->listFilms = $this->model->getAllUnarchMovies('0','0');
            $this->listLoans = $this->model->getLoans();
            $this->deleteLoan = $this->model->deleteLoan($_GET['delete']);
           
        }

        
        include (__DIR__ . './../view/view_loans.php');

    }



}


?>