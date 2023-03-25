<?php
    include "server.php";
    $id=$_GET["id"];
    $pl=$_GET["pl"];
    $sql="delete from records where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        if($pl==0){
            header("location:finishedTasks.php");
        }else if($pl==1){
            header("location:index.php");
        }
    }
?>