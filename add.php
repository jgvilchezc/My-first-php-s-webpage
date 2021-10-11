<?php

include('config/db_connect.php');

$email = '';
$tittle ='';
$blog='';

$errors = array('email'=>'','tittle'=>'','blog'=>'','blogCreado' => '');



if(isset($_POST['submit'])){
if(empty($_POST['email'])){
    $errors['email'] = 'Email is required';
} else {
    $errors['email'] = '';
    $email = htmlspecialchars($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email is not valid';
    } else {
       // $errors['blogCreado'] = 'Your blog has been created successfully';
        $errors['email'] = '';
     }
}
if(empty($_POST['tittle'])){
    $errors['tittle'] = 'Tittle is required';
    $errors['blogCreado'] = '';
} 
if(empty($_POST['blog'])){
    $errors['blog'] = 'Blog is required';
    $errors['blogCreado'] = '';
    };
    if(!array_filter($errors)){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $tittle = mysqli_real_escape_string($conn, $_POST['tittle']);
        $content = mysqli_real_escape_string($conn, $_POST['blog']);

        //create sql
        $sql = "INSERT INTO blogs(tittle,email,content) VALUES ('$tittle', '$email', '$content')";

        //save to database and check
        if(mysqli_query($conn, $sql)){
            //success
            header('Location:index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        
        
     }
};




?>



<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="index.css">

    <?php include('templates/header.php') ?>

    <section class='container grey-text'>
        <h4 class='center'>Add a blog</h4>
        <form class='white' action="add.php" method='POST'>
            <label for="">Your Email</label> 
            <input type="text" name='email' value='<?php echo htmlspecialchars($email)?>'> 
            <div class='red-text'><?php echo $errors['email']?></div>   
            <label for="">Tittle</label> 
            <input type="text" name='tittle' value='<?php echo htmlspecialchars($tittle)?>'>
            <div class='red-text'><?php echo $errors['tittle']?></div> 
            <label for="">Content</label> 
            <input type="text" name='blog' value='<?php echo htmlspecialchars($blog)?>'>
            <div class='red-text'><?php echo $errors['blog']?></div> 
            <div class='center'>
                <div class='center green-text'><?php echo $errors['blogCreado']?></div>
                <input type="submit" name="submit" value='submit' class=' btn brand z-depth-0'>
            </div>
        </form>
    </section>

    <?php include('templates/footer.php')?>

</html>