<?php

include ('header.php');

?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Archived Movies 👇
            </h1>
            <?php if (!empty($this->errorMsg)) {
                echo '<p class="is-size-4 has-text-white has-background-danger has-text-centered">' . $this->errorMsg . '</p>';
            } else {    
                ?>
            </div>
        </div>
    </div>
</section>

<div class="column is-multiline">
    <?php
        foreach ($this->listArchMovies as $moviesarch) {

            echo '<div class="column is-one-quarter"><a href="?page=details&index=' . $moviesarch['film_id'] . '">
            <img src="' . $moviesarch['film_poster'] . '">
          </a></div>';
            }
        }
    ?>
</div>



<?php

include ('footer.php');


?>