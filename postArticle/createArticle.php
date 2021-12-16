<?php
require "../connection/config.php";
    session_start();
    if(!isset($_SESSION['username'])) {
        header('Location: ../index.php');
        exit;
    }
    $title="";
    $article="";
    if(isset($_POST["post"])){
        $title = $_POST['title'];
        $article = $_POST['article'];
        if(!empty($title and $article)){
            $statement = $connection->prepare("INSERT INTO posts (title, article)
                        VALUES (:title, :article)");
             $statement->bindParam(':title', $title);
             $statement->bindParam(':article', $article);
             if($statement){
                $statement->execute();
                $title = "";
                $article = "";
                header("Location: articles.php");
                die;
            }
            else{
                echo mysqli_error($connection);
            }
        }
        else{
            echo 'please fill the gaps';
        }
    }
?>
<?php require '../html/header.php';?>
   <div class="container">
    <form action="" method="POST">
            <div>
                <div class="mb-4">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control"name="title" required>
                </div>
                <div class="mb-5">
                    <label class="form-label">Article:</label>
                    <textarea class="form-control" name="article" required></textarea>
                </div>
                <div>
                    <button class="btn btn-secondary btn-outline-dark w-25" name="post">Create</button>
                </div>
            </div>
        </form>
   </div>
<?php require '../html/footer.php';?>