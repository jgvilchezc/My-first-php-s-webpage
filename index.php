<?php
// connect to basadate
include('config/db_connect.php');
// write query for all blogs

// free result from memory


mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">


    <?php include('templates/header.php') ?>

    <h4 class='center orange-text'>BLOGS</h4>
    <div class='container'>
        <div class='row'>
            <?php foreach($blogs as $blog): ?>
                <div class='col s6 md3'>
                    <div class='card z-depth-0'>
                        <div class='card-content center'>
                            <h5 class='colorOrange'><?php echo htmlspecialchars($blog['tittle'])?></h5>
                            <div><?php echo htmlspecialchars($blog['content'])?></div>
                        </div>
                        <div class='card-action right-aling'>
                            <a href="details.php?id=<?php echo $blog['id']?>" class='btn orange'>More info</a>
                        </div>
                        
                    </div>
                </div>
            <?php endforeach; ?>

            
        </div>
    </div>

    <?php include('templates/footer.php')?>

</html>