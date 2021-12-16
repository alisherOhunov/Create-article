<?php  
    include '../connection/config.php';
    $statement = $connection->prepare("SELECT * FROM posts");
    $statement->execute();  
?>
<?php require '../html/header.php';?>
    <div class="container">
        <?php foreach($statement as $key) :?>
        <div class="d-flex justify-content-center align-items-center">
            <div class="card text-dark bg-light mt-5">
                <div class="card-body" style="width: 50rem;">
                    <h4 class="card-title"><?php echo $key['title'];?></h4>
                    <p class="card-text"><?php echo $key['article'];?></p>
                    <button class="btn btn-primary">Leave a comment</button>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>