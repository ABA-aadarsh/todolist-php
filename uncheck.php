<?php
    include "server.php";
    $id=$_GET["id"];
    echo $id;
    $sql="update records set status='unfinished' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:finishedTasks.php");
    }
?>