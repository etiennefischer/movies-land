<?php

include ('header.php');

//Display age : $date = new

//var_dump($interval);

?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container" itemscope itemtype="http://schema.org/Movie">
            <h1 class="title">
                Movies List 👇
            </h1>
            <?php if (!empty($this->errorMsg)) {
                echo '<p class="is-size-4 has-text-white has-background-danger has-text-centered">' . $this->errorMsg . '</p>';
            } else {    
                ?>
            </div>
        </div>
    </div>
</section>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="?page=list" class="navbar-item">All Movies</a>
            <a href="?page=list&filter=unwatch" class="navbar-item is-primary is-light m-3">Unwatched only</a>
            <a href="?page=list&filter=watch" class="navbar-item is-primary is-light m-3">Watched only</a>
            <a href="?page=list&filter=rating" class="navbar-item is-primary is-light m-3">Rating 🔽</a>
            <a href="?page=list&filter=alpha" class="navbar-item is-primary is-light m-3">A 👉 Z</a>
        </div>
    </div>
</nav>


<div class="columns is-multiline">
    <?php
        foreach ($this->listMovies as $movies) {
        
            echo '<div class="column is-one-quarter">
            <a href="?page=details&index=' . $movies['film_id'] . ($movies['film_api'] ? '&api_details=' . $movies['film_api'] : '') . '">
            <img src="' . $movies['film_poster'] . '">
            </a></div>';
            }
        }
    ?>
</div>

<?php

include ('footer.php');

?>