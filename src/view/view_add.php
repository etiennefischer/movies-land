<?php

include ('header.php');

//var_dump ($detailApi);
//$allCat = $this->model->getCat();

?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
            <?php if(isset($_GET['modify'])) { echo 'Update your movie 👇';} else { echo 'Add a new movie here 👇'; } ?>
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
            <input class="input" type="text" placeholder="Titanic" name="apiName">
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

    if (isset($_POST['apiName'])) {

        for ($i=0; $i < count ($resultApi->results); $i++) {

            //echo '<p>' . $resultApi->results[$i]->title . '</p>';
            echo '<div class="column is-one-quarter"><a href="?page=add&movie_api=' . $resultApi->results[$i]->id . '"><img src="https://image.tmdb.org/t/p/w185' . $resultApi->results[$i]->poster_path . '"></a></div>';
        }

    }

    if (isset($_GET['movie_api'])) {

    ?>

        <div class="card column is-three-fifths is-offset-one-fifth mt-3">
        <div class="card-content">
            <div class="media">
            <div class="media-left">
                <figure class="image is-256x256">
                <img src="<?php echo 'https://image.tmdb.org/t/p/w185' . $detailApi->poster_path;  ?>" alt="">
                </figure>
            </div>
            <div class="media-content">
                <p class="is-size-4 has-text-weight-bold"><?php echo $detailApi->original_title;  ?></p>
                <p class="has-text-weight-light mt-3"><?php echo $detailApi->overview;  ?></p>
                <p class="has-text-weight-light mt-3">📅 <?php echo $detailApi->release_date; ?></p>
                <!-- Loop to do below -->
                <p class="has-text-weight-light mt-3">🏷️ <?php echo $detailApi->genres[0]->name . ', ' . $detailApi->genres[1]->name;?></p>
                <p class="has-text-weight-light mt-3">⭐ <?php echo $detailApi->vote_average; ?></p>
                <iframe class="mt-3" width="280" height="157" src="https://www.youtube.com/embed/<?php echo $detailVideo->results[0]->key; ?>" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="content">
                    <a href="?page=add&api_add=<?php echo $detailApi->id; ?>" class="button is-link mr-3 mt-3">Add to my Movies</a>
                    <a href="?page=add&wish=<?php echo $detailApi->id; ?>" class="button is-link mr-3 mt-3">Add to my Whislist</a>
                </div>
            </div>
            
            </div>
        </div>
        </div>
        </div>

    <?php } ?>

<form class="column is-half is-offset-one-quarter" action="" method="POST">
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="Titanic" name="name" value="<?php if(isset($_GET['modify'])) { echo $modifMovie['film_name'];} ?>">
        </div>
    </div>

    <div class="select">
        <select name="category">
        <?php 

            for ($i=0; $i < count ($allCat); $i++) {

                echo '<option '. (($allCat[$i]['category_list']  == $modifMovie['category_list']) ? "selected" : "") . ' value="' . $allCat[$i]['category_id'] . '">' . $allCat[$i]['category_list'] . '</option>';
            }
        
        ?>
        </select>
    </div>

    <div class="field">
        <label class="label">Poster</label>
        <div class="control">
            <input class="input" type="text" placeholder="http://website/movie/poster.jpg" name="poster" value="<?php if(isset($_GET['modify'])) { echo $modifMovie['film_poster']; } ?>">
        </div>
    </div>

    <div class="field">
        <label class="label">Rating</label>
        <div class="control">
            <input class="input" type="number" placeholder="0 to 5" name="rating" min="0" max="5"  value="<?php echo $modifMovie['film_rating']; ?>">
        </div>
    </div>

    <label class="checkbox">
        <input type="checkbox" name="watched" <?php if(isset($_GET['modify'])) { echo $check; } ?>>
        Already watched
    </label>

    <div class="field is-grouped">
        <div class="control mt-5">
            <input class="button is-link" type="submit" value="<?php if(isset($_GET['modify'])) { echo 'Update';} else { echo 'Submit'; } ?>">
        </div>
    </div>
</form>

<?php

include ('footer.php');


?>