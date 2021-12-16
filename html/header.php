<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<nav class="navbar-dark bg-dark py-3 px-3">        
    <?php if(isset($_SESSION['username'])): ?>
    <div class="d-flex justify-content-between ">
        <div>
            <a class="navbar-brand" href="../index.php">Home</a>
            <a class="navbar-brand" href="../postArticle/articles.php">Articles</a>
        </div>
        <div class="d-flex">
            <a href="../postArticle/createArticle.php"><button class="btn btn-secondary ">+ Create a Post </button></a>
            <form action="../registration/logout.php" method="POST">
                <button class="btn btn-secondary mx-1" name="logout">Logout</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <div class="d-flex justify-content-between ">
    <div>
        <a class="navbar-brand" href="../index.php">Home</a>
        <a class="navbar-brand" href="../postArticle/articles.php">Articles</a>
    </div>
    <div>
        <a href="../registration/login.php"><button  class="btn btn-secondary">login</button></a> 
        <a href="../registration/register.php"><button  class="btn btn-secondary">Sign up</button></a> 
    </div>
    </div>
    <?php endif;?>
    </nav>
    