<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .tasksContainer{
            margin-top:40px
        }
        .taskRecord, .toggleDescription{
            background-color:#ddd;
        }
        .tasksContainer .fields{
            margin-bottom:20px;
        }
    </style>
</head>
<body>
    
    <div class="main">
        <div class="sideNavbar">
            <div class="navigationArea">
                <div class="home">
                    <a href="./index.php">
                        <img src="./svg/house-solid.svg" alt="home" class="icons">
                    </a>
                </div>
                <div class="finished">
                    <a href="./finishedTasks.php">
                        <img src="./svg/square-check-solid.svg" alt="check" class="icons">
                    </a>
                </div>
            </div>
        </div>
        <div class="bodyArea">
            <img src="./bg2.png" alt="" id="bg2" >
            <div class="heading">
                <h2>To Do List</h2>
                <p>Plan your Day</p>
            </div>
            <div class="mainContainer">
                <div class="hero">
                    <div class="tasksContainer">
                        <?php
                            include "server.php";
                            $sql="select * from records where status='finished'";
                            $result=mysqli_query($conn,$sql);
                            if($result){
                                if(mysqli_num_rows($result)>0){
                                    echo <<< exit
                                        <div class='fields'>
                                            <span id="title">Task Title</span>
                                            <span id="imp">Importance</span>
                                            <span id="urg">Urgency</span>
                                            <span id="issDate">Date Issued</span>
                                        </div>
                                    exit;
                                    while($row=mysqli_fetch_assoc($result)){
                                        $id=$row["id"];
                                        $taskTitle=$row["taskTitle"];
                                        $taskDescription=$row["taskDescription"];
                                        $importance=$row["importance"];
                                        $urgency=$row["urgency"];
                                        $entryDate=$row["entryDate"];
                                        echo <<< exit
                                        <div class='taskRecord'>
                                            <div class="taskRecordEntryDetail">
                                                <input type="checkbox" class="checkbox" id='checkbox$id' name="taskId$id" checked>
                                                <span class="taskTitle">$taskTitle</span>
                                                <span class="imp $importance"></span>
                                                <span class="urg $urgency"></span>
                                                <span class='entryDate'>$entryDate</span>
                                                <button class='toggleDetail' id='btn$id'>
                                                    <img src="./svg/angle-down-solid.svg" alt="toggle" class="toggle-icon">
                                                </button>
                                                <div class="actions hide">
                                                    <button class="edit" id="edit$id" title="Edit">
                                                        <img src="./svg/pen-solid.svg" alt="edit" class="mini-icons">
                                                    </button>
                                                    <button class="delete" title="Delete">
                                                        <a href="delete.php?id=$id&pl=0">
                                                        <img src="./svg/trash-solid.svg" alt="edit" class="mini-icons">
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class='toggleDescription hidden' id="desc$id">
                                                <p>$taskDescription</p>
                                            </div>
                                        </div>
                                        exit;
                                    }
                                }else{
                                    echo <<< exit
                                    <div class="noRecords">
                                        <div class="innerContainer">
                                            <h1 class="headTitle">
                                                Nothing Here.
                                            </h1>
                                            <p>
                                                Your finished tasks will be displayed here.
                                            </p>
                                            <p>
                                                Plan a Task and Finish Them.
                                            </p>
                                        </div>
                                    </div>
                                    exit;
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="modalContainer hidden">
                    <div class="center">
                        <div class="titlePart">
                            <h2>Edit Task</h2>
                            <button class="exitModal">
                                <img src="./svg/xmark-solid.svg" alt="exit" class="exit-icon">
                            </button>
                        </div>
                        <form action="edit.php" method="post">
                            <div class="inputBox">
                                <span>Task Title</span>
                                <input type="text" required name="taskTitle" id="taskTitle">
                            </div>
                            <div class="inputBox">
                                <span>Description</span>
                                <textarea name="taskDescription" id="textArea" cols="30" rows="10"></textarea>
                            </div>
                            <div class="inputBox selectImp">
                                <span>Importance</span>
                                <select name="importance" id="importance">
                                    <option value="important">Important</option>
                                    <option value="notImportant">Not Important</option>
                                </select>
                            </div>
                            <div class="inputBox selectUrg">
                                <span>Urgency</span>
                                <select name="urgency" id="urgency">
                                    <option value="urgent">Urgent</option>
                                    <option value="notUrgent">Not Urgent</option>
                                </select>
                            </div>
                            <input type="submit" value="Proceed" id="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="finishedTasks.js"></script>
</body>
</html>