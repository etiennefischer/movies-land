<?php

include ('header.php');

?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                To watch 👇
            </h1>
            <?php if (!empty($this->errorMsg)) {
                echo '<p class="is-size-4 has-text-white has-background-danger has-text-centered">' . $this->errorMsg . '</p>';
            } else {    
                ?>
        </div>
    </div>
    </div>
</section>

<form class="column is-half is-offset-one-quarter" action="" method="POST">
    <div class="field">
        <label class="label">Best Movie of</label>
        <div class="control">
            <div class="select">
                <select name="year">
                    <option>2020</option>
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                </select>
            </div>
        </div>
    </div>

    <div class="field is-grouped">
        <div class="control mt-5">
            <input class="button is-link" type="submit" value="Search TMDB">
        </div>
    </div>
</form>

<div class="columns is-multiline">
    <?php

    if (isset($_POST['year'])) {

        for ($i=0; $i < count ($resultBest->results); $i++) {

            echo '<div class="column is-one-quarter"><a href="?page=details&api_details=' . $resultBest->results[$i]->id . '"><img src="https://image.tmdb.org/t/p/w185' . $resultBest->results[$i]->poster_path . '"></a></div>';
        }

    }

?>
</div>



<div class="column is-multiline">
    <?php
        foreach ($this->listWhished as $movie) {

            echo '<div class="column is-one-quarter"><a href="?page=details&index=' . $movie['film_id'] . '&api_details=' . $movie['film_api'] . '&wish">
            <img src="' . $movie['film_poster'] . '">
          </a></div>';
            }
        }
    ?>
</div>



<?php

include ('footer.php');


?>