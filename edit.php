<?php
    include "server.php";
    $id=$_GET["id"];
    $pl=$_GET["pl"];
    $taskTitle=$_POST["taskTitle"];
    $taskDescription=$_POST["taskDescription"];
    $importance=$_POST["importance"];
    $urgency=$_POST["urgency"];
    $sql="update records set taskTitle='$taskTitle', taskDescription='$taskDescription', importance='$importance', urgency='$urgency' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        if($pl==1){
            header("location:index.php");
        }else if($pl==0){
            header("location:finishedTasks.php");
        }
    }
?>