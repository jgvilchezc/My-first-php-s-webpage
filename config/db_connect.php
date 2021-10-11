<?php
$conn = mysqli_connect('localhost', 'Jose', 'kanitoyjose21', "my-first-php's-webpage");

if(!$conn){
    echo 'ERROR' . mysqli_connect_error();
}
$sql = 'SELECT tittle, id, content FROM blogs ORDER BY created_at';
// make query and get results
$result = mysqli_query($conn, $sql);
// fetch the rows as an array
$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
// close connection

?>