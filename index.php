<?php
session_start();
$_SESSION['score'] = 0;
$_SESSION['no_soal'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: calibri;
            background-color:#008080;
            margin:0; 
        }
        a{
            text-decoration:none;
            color: black;
            font-weight: 600;
        }

        .head{
            height:50px;
            width:30%;
            margin-left:35%;
            color:white;
        }

        .lvls{
            /* background-color:blue; */
            height:300px;
            width:20%;
            margin-left:40%;
        }

        .lvl{
            padding-top:10px;
            height:37px;
            font-size:20px;
            margin-left:4%;
            width:90%;
            background-color:#ffffff;
            margin-top:30px;
            text-align:center;
            box-shadow: 10px 10px 0px -1px #daa520;
            -webkit-box-shadow: 10px 10px 0px -1px #daa520;
            -moz-box-shadow: 10px 10px 0px -1px #daa520;
        }
    </style>
</head>
<body>
    <div class="head"><h1>Game Matematika Sederhana</h1></div>
    <div class="lvls">
        <div class="lvl"><a href="lvl.php?lvl=1">Level 1</a></div>
        <div class="lvl"><a href="lvl.php?lvl=2">Level 2</a></div>
        <div class="lvl"><a href="lvl.php?lvl=3">Level 3</a></div>
        <div class="lvl"><a href="lvl.php?lvl=4">Level 4</a></div>
    </div>
</body>
</html>