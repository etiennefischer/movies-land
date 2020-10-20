<?php

include ('header.php');


//for ($i = 1; $i < count($detailApi->genres); $i++) { echo ', '. $detailApi->genres[$i]->name;} echo '.';


$rate = $detailApi->vote_average;

if ($rate<5){
    $color = 'is-danger';
}elseif ($rate <6 AND $rate >5){
    $color = 'is-warning';
}elseif ($rate<7.5 AND $rate >6){
$color='is-info';
}elseif ($rate>7.5){
    $color='is-success';}


?>

<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
               Details 👇
            </h1>
            <?php if (!empty($this->errorMsg)) {
                echo '<p class="is-size-4 has-text-white has-background-danger has-text-centered">' . $this->errorMsg . '</p>';
            } else { 
                
                if (!empty($this->successmg)) {
                    echo '<p class="is-size-4 has-text-white has-background-success has-text-centered">' . $this->successmg . '</p>';
                } 
                
            ?>
     
</section>
<?php

if (isset($_GET['api_details'])) {

?>

    <div class="card column is-three-fifths is-offset-one-fifth mt-3">
    <div class="card-content" itemscope itemtype="http://schema.org/Movie">
        <div class="media">
        <div class="media-left">
            <figure class="image is-256x256">
            <img src="<?php echo 'https://image.tmdb.org/t/p/w185' . $detailApi->poster_path;  ?>" alt="">
            </figure>
        </div>
        <div class="media-content">
            <p class="is-size-4 has-text-weight-bold" itemprop="name"><?php echo $detailApi->original_title;  ?></p>
            <p class="has-text-weight-light mt-3"><?php echo $detailApi->overview;  ?></p>
            <p class="has-text-weight-light mt-3">📅 <?php echo $detailApi->release_date; ?></p>
            <!-- Loop to do below -->
            <p class="has-text-weight-light mt-3" itemprop="name">🏷️ <?php echo $detailApi->genres[0]->name; for ($i = 1; $i < count($detailApi->genres); $i++) { echo ', '. $detailApi->genres[$i]->name;} echo '.'; ?></p>
            <p class="has-text-weight-light mt-3" itemprop="ratingValue">⭐ <?php echo $detailApi->vote_average; ?></p>
            <progress max="100" value="<?php echo $detailApi->vote_average * 10; ?>" class="progress <?php echo $color;?> is-small mt-3">
            </progress>
            <iframe class="mt-3" width="280" height="157" src="https://www.youtube.com/embed/<?php echo $detailVideo->results[0]->key; ?>" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="content">

            <?php

                if (isset($_GET['api_details']) and isset($_GET['index']) and !isset($_GET['wish'])) {

            ?>
                <a href="?page=details&index=<?php echo $_GET['index']; ?>&archive" class="button is-warning is-light mr-3 mt-3">Archive</a>
                <a href="?page=add&wish=<?php echo $detailApi->id; ?>" class="button is-danger is-light mr-3 mt-3">Delete</a><?php } ?>
            <?php

                if (isset($_GET['api_details']) and !isset($_GET['index'])) {

            ?>

                <a href="?page=add&wish=<?php echo $detailApi->id; ?>" class="button is-link mr-3 mt-3">Add to my Whislist</a><?php } 

                if (isset($_GET['wish'])) {

            ?>

                <a href="?page=add&api_add=<?php echo $detailApi->id; ?>" class="button is-link mr-3 mt-3">Add to my Movies</a><?php } ?>

            </div>
        </div>
        
        </div>
    </div>
    </div>
    </div>

<?php } else { ?>
<div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-256x256">
          <img src="<?php echo $this->listAMovie['film_poster']; ?>" alt="">
        </figure>
      </div>
      <div class="media-content">
      <?php 
                                echo '<p class="mt-3"><strong>' . $this->listAMovie['category_list'] . '</strong></p>';
                                //echo '<p class="mt-3"><strong>Age</strong>: ' . $this->model->getAge($this->listAProfile['profile_age']) . '</p>';

                                if ($this->listAMovie['film_is_watched']=='off') {

                                    echo '<p class="mt-3"><strong>Already watched</strong> : No</p>';

                                } else {

                                    echo '<p class="mt-3"><strong>Already watched</strong> : Yes</p>';
                                }

                                if ($this->listAMovie['film_rating']=='0') {

                                    echo '<p class="mt-3"><strong>Rating</strong> : 🙈</p>';

                                    // Loop

                                } else if ($this->listAMovie['film_rating']=='1') {

                                    echo '<p class="mt-3"><strong>Rating</strong> : ⭐</p>';
                                } else if ($this->listAMovie['film_rating']=='2') {

                                    echo '<p class="mt-3"><strong>Rating</strong> : ⭐⭐</p>';
                                } else if ($this->listAMovie['film_rating']=='3') {

                                    echo '<p class="mt-3"><strong>Rating</strong> : ⭐⭐⭐</p>';
                                } else if ($this->listAMovie['film_rating']=='4') {

                                    echo '<p class="mt-3"><strong>Rating</strong> : ⭐⭐⭐⭐</p>';
                                } else if ($this->listAMovie['film_rating']=='5') {

                                    echo '<p class="mt-3"><strong>Rating</strong> : ⭐⭐⭐⭐⭐</p>';
                                }

                                echo '<a href="?page=add&modify=' . $this->listAMovie['film_id'] . '" class="button is-link mr-3 mt-3">Modify</a>';
                                echo '<a href="?page=details&index='. $this->listAMovie['film_id'] .'&archive" class="button is-danger mr-3 mt-3">Archive</a>';
                                
                            }
                        }
                        ?>
      </div>
    </div>
  </div>
</div>

<?php

include ('footer.php');

?>