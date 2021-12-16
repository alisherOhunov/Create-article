<?php
 session_start();
?>
<?php require 'html/header.php';?>
    <?php if(isset($_SESSION['username'])): ?>
        <h1>Welcome to home page, <?php echo $_SESSION['username']?></h1>
        <?php else:?>
        <h1>Welcome to home page</h1>   
        <?php endif; ?>
<?php require 'html/footer.php';?>


<style>
    body{
        background-image: url('pic.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .mainBlog{
        font-family: 'Montserrat Alternates', sans-serif;
        padding: 25px;
        margin: auto;
    }
    .addPostBtn{
        
        padding-bottom:0.5%;
        /* color: black; */
    }
</style>



