<?php

include ('header.php');

?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
               Manage Categories 👇
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
        <label class="label">Category Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="ROMANCE" name="category">
        </div>
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
        foreach ($this->listCat as $catName) {

            echo '<p><a href="?page=categories&delete=' . $catName['category_id'] . '"><img src="./src/public/img/delete.png" alt=""></i></a>' . $catName['category_list'] . '</p>';

        }
    ?>
  </ul>
</div>






<?php

include ('footer.php');


?>