<?php 
    require("../connection/config.php");
    if(isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    }
    $email = "";
    $username = "";
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $confirmPassword = md5($_POST["confirmPassword"]);
        $email = $_POST["email"];
        if($password == $confirmPassword){ 
            $statement = $connection->prepare("SELECT * FROM users WHERE  username=:username and email=:email");
            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->rowCount();    
            if($result > 0){
                echo "This Email or Username already is used, Try another";
            }
            else{
                $statement = $connection->prepare("INSERT INTO users (username, password, email)
                VALUES (:username, :password, :email)");
                $statement->bindParam(':username', $username);
                $statement->bindParam(':password', $password);
                $statement->bindParam(':email', $email);
                if($statement){
                    $statement->execute();
                    echo "<script>alert('completed')</script>";
                    $username = "";
                    $email = "";
                    header("Location: login.php");
                    die;
                }
                else{
                    echo mysqli_error($connection);
                }
            } 
        }
        else{
            echo 'password not matched';
        }
    }   
    ?>
<?php require '../html/header.php';?>
    <div class="mainBlog">
        <form action="" method="POST">
            <h4 class="registerationText">Sign up</h4>
            <input class="form-control" type="text" placeholder="Username" name="username" required value="<?php echo $username; ?>">
            <input class="form-control" type="email" placeholder="Email" name="email" required value="<?php echo $email; ?>">
            <input class="form-control" type="password" placeholder="Password" name="password" required >
            <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword" required >
            <div>
                <button class="submit btn btn-secondary btn-outline-dark w-50  " name="submit">Submit</button>
            </div>
        </form>
    </div>
<?php require '../html/footer.php';?>


<style>
    .mainBlog{
        width: 400px;
        padding: 20px;
        margin:0 auto;
    }
    .registerationText{
        text-align: center;
    }
    input{
        margin-top:20px;
        margin-bottom:20px;
    }
    .submit{
        margin-left:25%;
    }
 
</style>
