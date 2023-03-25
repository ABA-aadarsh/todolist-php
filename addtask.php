<?php
    include "server.php";
    $taskTitle=$_POST["taskTitle"];
    $taskDescription=$_POST["taskDescription"];
    $importance=$_POST["importance"];
    $urgency=$_POST["urgency"];
    $sql="insert into records(taskTitle,taskDescription,importance,urgency,status) values('$taskTitle','$taskDescription','$importance','$urgency','unfinished')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:index.php");
    }
?>