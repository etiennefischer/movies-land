<?php

include ('header.php');

//var_dump($this->listFilms);

?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
               Manage Loans 👇
            </h1>
            <?php if (!empty($this->errorMsg)) {
                echo '<p class="is-size-4 has-text-white has-background-danger has-text-centered">' . $this->errorMsg . '</p>';
            } 

            if (!empty($this->successmg)) {
                echo '<p class="is-size-4 has-text-white has-background-success has-text-centered">' . $this->successmg . '</p>';
            } 
            ?>
        </div>
    </div>
</section>

<form class="column is-half is-offset-one-quarter" action="" method="POST">
    
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="Peter" name="loaner">
        </div>
    </div>

    <div class="field">
        <label class="label">Date</label>
        <div class="control">
            <input class="input" type="date" name="dateLoan">
        </div>
    </div>

    <div class="select">
        <select name="movies">
        <?php 

            foreach ($this->listFilms as $films) {

                echo '<option value="' . $films['film_id'] . '">' . $films['film_name'] . '</option>';

            }

        ?>
        </select>
    </div>

    <div class="field is-grouped">
        <div class="control mt-3">
            <input class="button is-link" type="submit" value="Submit">
        </div>
    </div>
</form>


<div class="content column is-half is-offset-one-quarter">
  <ul>
    <?php
        foreach ($this->listLoans as $loanItems) {

            echo '<p><a href="?page=loans&delete=' . $loanItems['loan_id'] . '"><img src="./src/public/img/delete.png" alt=""></i></a>' . $loanItems['loan_name'] . ' - ' . $loanItems['film_name'] . ' on ' . $loanItems['loan_date'] .  '</p>';

        }
    ?>
  </ul>
</div>

<?php

include ('footer.php');


?>