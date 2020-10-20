<?php

class Model {

private $bdd;

public function __construct() 
{

    $config = json_decode(file_get_contents (__DIR__ . '/../../config/' . ENV . '/db.json'));
    

    try {

        $this->bdd = new PDO($config->dsn,$config->user,$config->pswd
        
        , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $e) {
        
        var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());

    }

    }

    public function saveMovie($name,$cat,$poster,$rating,$watch,$archive)
    {

        try {

            $request = $this->bdd->prepare('INSERT INTO film (film_name,id_category,film_poster,film_rating,film_is_watched,film_is_archived) VALUES (?, ?, ?, ?, ?, ?)');
            $request->execute([$name,$cat,$poster,$rating,$watch,$archive]);
            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }

    }

    public function getAllUnarchMovies($unarchive,$wish)
    {

        try {

            $request = $this->bdd->prepare('SELECT * from film WHERE film_is_archived = ? AND film_is_wished = ?');
            $request->execute([$unarchive,$wish]);
            $allMovies = $request->fetchAll();
            return $allMovies;
            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }



    }


    public function getMovieId($idmovie)
    {

        try {

            $request = $this->bdd->prepare('SELECT * from film LEFT JOIN category ON film.id_category = category.category_id WHERE film_id= ?');
            $request->execute([$idmovie]);
            $details = $request->fetch();
            return $details;
            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }

    }

    public function getCat()

    {

        try {

            $request = $this->bdd->prepare('SELECT * FROM category');
            $request->execute();
            $categories = $request->fetchAll();
            return $categories;
            
        
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }

    public function deleteCat($catID)

    {

        try {

            $request = $this->bdd->prepare('DELETE FROM category WHERE category_id = ?');
            $request->execute([$catID]);
            
        
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }

    public function addCat($newCat)

    {

        try {

            $request = $this->bdd->prepare('INSERT INTO category (category_list) VALUES (?)');
            $request->execute([$newCat]);
            
        
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }




    public function setArchive($arch,$movieId)

    {

        try {

            $request = $this->bdd->prepare('UPDATE film SET film_is_archived = ? WHERE film_id = ?');
            $request->execute([$arch,$movieId]);
            
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }


    public function updateMovie($name,$cat,$poster,$rating,$watch,$movieId)

    {

        try {

            $request = $this->bdd->prepare('UPDATE film SET film_name = ? , film_category = ? , film_poster = ? , film_rating = ? , film_is_watched = ?  WHERE film_id = ?');
            $request->execute([$name,$cat,$poster,$rating,$watch,$movieId]);
            
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }

    public function watchStatus($status,$unarch)

    { 

        try {

            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_is_watched = ? AND film_is_archived = ?');
            $request->execute([$status,$unarch]);
            $watchMov = $request->fetchAll();
            return $watchMov;
            
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }

    public function ratingOrd($unarch)

    { 

        try {

            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_is_archived = ? ORDER BY film_rating DESC');
            $request->execute([$unarch]);
            $watchMov = $request->fetchAll();
            return $watchMov;
            
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }


    public function alphaOrd($unarch)

    { 

        try {

            $request = $this->bdd->prepare('SELECT * FROM film WHERE film_is_archived = ? ORDER BY film_name ASC');
            $request->execute([$unarch]);
            $watchMov = $request->fetchAll();
            return $watchMov;
            
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }

    public function saveLoan ($name,$date,$movie)
    {

        try {

            $request = $this->bdd->prepare('INSERT INTO loan (loan_name,loan_date,id_film) VALUES (?, ?, ?)');
            $request->execute([$name,$date,$movie]);
            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }

    }

    public function getLoans()

    {

        try {

            $request = $this->bdd->prepare('SELECT * FROM loan LEFT JOIN film ON loan.id_film = film.film_id');
            $request->execute();
            $loans = $request->fetchAll();
            return $loans;
            
        
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }

    public function deleteLoan($loanID)

    {

        try {

            $request = $this->bdd->prepare('DELETE FROM loan WHERE loan_id = ?');
            $request->execute([$loanID]);
            
        
        } catch (Exception $e) {
        
            var_dump ('Error : ' . $e->getMessage());
        
        }

    }


    public function getTMDB($movie)

    {

        $apiMovie = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key=6985e562c05ec6150e49c08a88da0226&language=en-US&query=' . $movie . '&page=1&include_adult=false');
        $apiMovie = json_decode($apiMovie);
        return $apiMovie;

    }

    //https://api.themoviedb.org/3/movie/597/videos?api_key=6985e562c05ec6150e49c08a88da0226&language=en-US

    public function getTMDBDetails($movieID)

    {

        $apiDetails = file_get_contents('https://api.themoviedb.org/3/movie/' . $movieID .'?api_key=6985e562c05ec6150e49c08a88da0226&language=en-US');
        $apiDetails = json_decode($apiDetails);
        return $apiDetails;

    }

    public function getTMDBvideo($movieID)

    {

        $apiDetails = file_get_contents('https://api.themoviedb.org/3/movie/' . $movieID .'/videos?api_key=6985e562c05ec6150e49c08a88da0226&language=en-US');
        $apiDetails = json_decode($apiDetails);
        return $apiDetails;

    }


    public function saveMovieAPI($name,$poster,$filmID)
    {

        try {

            $request = $this->bdd->prepare('INSERT INTO film (film_name,film_poster,film_api) VALUES (?, ?, ?)');
            $request->execute([$name,$poster,$filmID]);
            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }

    }

    public function getAllWhished($unarchive,$wished)
    {

        try {

            $request = $this->bdd->prepare('SELECT * from film WHERE film_is_archived = ? AND film_is_wished = ?');
            $request->execute([$unarchive,$wished]);
            $allWhish = $request->fetchAll();
            return $allWhish;
            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }



    }

    

    public function saveMovieWish($name,$poster,$filmId,$wish)
    {

        try {

            $request = $this->bdd->prepare('INSERT INTO film (film_name,film_poster,film_api,film_is_wished) VALUES (?, ?, ?, ?)');
            $request->execute([$name,$poster,$filmId,$wish]);

            
        } catch (Exception $e) {

            var_dump('Echec lors de la tentative de connexion : ' . $e->getMessage());
            return false;
        }



    }

    public function getTmdbBest($year)

    {

        $apiYear = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=6985e562c05ec6150e49c08a88da0226&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&year=' . $year);
        $apiYear = json_decode($apiYear);
        return $apiYear;

    }
    


}


?>