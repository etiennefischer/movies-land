<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link rel="stylesheet" href="./src/public/css/style.css">
</head>

<body>

    <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a href="?page=home" class="navbar-item is-size-4" rel="nofollow">🏠 Home</a>
                    <a href="?page=list" class="navbar-item is-size-4">🍿 My movies</a>
                    <a href="?page=add" class="navbar-item is-size-4">➕ Add a movie</a>
                    <a href="?page=categories" class="navbar-item is-size-4">🏷️ Categories</a>
                    <a href="?page=archives" class="navbar-item is-size-4">🗄️ Archives</a>
                    <a href="?page=loans" class="navbar-item is-size-4">📼 Loans</a>
                    <a href="?page=whishlist" class="navbar-item is-size-4">❤️ WhishList</a>
                </div>
            </div>
        </nav>
    </header>