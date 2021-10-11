<?php

include('config/db_connect.php');


if(isset($_POST['delete']) ){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['idToDelete']);
    $sql = "DELETE FROM blogs WHERE id = $id_to_delete";
    print_r($_POST[$id_to_delete]);
    
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");

    } else{
        echo 'query error' . mysqli_error($conn);
    }

}
//check get request id  parameter

if(isset($_GET['id'])){

    
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM blogs WHERE id = $id";

    $result = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    
}



?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<div class='container center'>
    <?php if($blog): ?>
     <h4><?php echo htmlspecialchars($blog['tittle']) ?></h4>
     <p>Created by:<?php echo htmlspecialchars($blog['email']) ?></p>
     <p><?php echo date($blog['created_at']) ?></p>
     <h5>Content:</h5>
     <p><?php echo htmlspecialchars($blog['content']) ?></p>

     <form action="details.php" method="POST">
         <input type="hidden" name='idToDelete' value="<?php echo $blog['id']?>">
         <input type="submit"  name='delete' value='DELETE' class='btn brand z-depth-0'>
     </form>

    <?php else: ?>

        <h5>No such blog exist!</h5>

    <?php endif ?>
        
</div>

<?php include('templates/footer.php')?>


</html>