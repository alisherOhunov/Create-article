<?php
    require '../connection/config.php';
    if(isset($_SESSION['username'])) {
        header('Location: ../index.php');
        exit;
    }
    session_start();
    if(isset($_POST["submit"])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $statement = $connection->prepare("SELECT * FROM users WHERE  password=:password and email=:email");
            $statement->bindParam(':password', $password);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->rowCount();
        if($result > 0){
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION["username"] = $row['username'];
            header('Location: ../index.php');
            exit;
        }
        else{
            echo "email or password is wrong";
        }
    }
    $connection = null;
?>
<?php require '../html/header.php';?>
    <form action="" method="POST" class="mainBlog">
        <h4 class="loginText">Login</h4>
        <input class="form-control" type="email" placeholder="Email" name="email">
        <input class="form-control" type="password" placeholder="Password" name="password" >
        <div class="submitBtn">
            <button class="submit btn btn-secondary btn-outline-dark w-50  " name="submit">submit</button>
        </div>
    </form>
<?php require '../html/footer.php';?>


<style>
    .mainBlog{
        width: 400px;
        padding: 20px;
        margin:0 auto;
    }
    .loginText{
        text-align: center;
    }
    input{
        margin-top:20px;
        margin-bottom:20px;
    }
    .registerLinkText{
        color:black; 
    }
    .submit{
        margin-left:25%;
    }
</style>