<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Matematika Sederhana</title>
    <style>
        body{
            font-family: calibri;
            background-color:#008080;
            margin:0; 
        }

        .back{
            height:35px;
            width:10%;
            background-color:white;
            color:black;
            padding-top:13px;
            text-align:center;
            margin-top:20px;
            margin-left:1%;
            border:none;
            box-shadow: 10px 10px 0px -1px #daa520;
            -webkit-box-shadow: 10px 10px 0px -1px #daa520;
            -moz-box-shadow: 10px 10px 0px -1px #daa520;
        }

        a{
            text-decoration:none;
            color:black;
        }

        #game{
            margin-left:30%;
            margin-top:0px;
            background-color:white;
            height:400px;
            width:30%;
            padding:20px 5%;
            box-shadow: 21px 22px 0px 0px #daa520;
            -webkit-box-shadow: 21px 22px 0px 0px #daa520;
            -moz-box-shadow: 21px 22px 0px 0px #daa520;
        }

        #jawaban{
            width:78%;
            padding:0px 10%;
            height:40px;
            border-radius:20px;
            border: 2px solid grey;
        }

        #jawab{
            width:44%;
            height: 40px;
            margin-top:20px;
            margin-left:28%;
            border:none;
            color:white;
            font-size:20px;
            background-color:#daa520;
            box-shadow: 10px 10px 0px -1px #008080;
            -webkit-box-shadow: 10px 10px 0px -1px #008080;
            -moz-box-shadow: 10px 10px 0px -1px #008080;
        }

        h1{
            text-align:center;
            font-size:59px;
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="back" href="index.php"><a href="index.php">Kembali Pilih Level</a></div>
    <div id="game">
        <pre>
            <h2 style="margin-top:10px"><?= "Kamu menyelesaikan Level ".$_SESSION['lvl']; ?></h2>
            <h1 style="margin-top:50px"><?= " Dengan score <br/>".$_SESSION['score']; ?></h1>
        </pre>
    </div>
</body>
</html>
