<?php 
session_start();

if(isset($_POST['jawab'])){
    $jawaban = $_POST['jawaban'];
    $_SESSION['no_soal'] = $_SESSION['no_soal'] + 1;
    if($_SESSION['hsl'] == $jawaban){
        $_SESSION['score'] = $_SESSION['score'] + 10;
        $pesan = "Jawaban Kamu Sebelumnya Benar";
    }else{
        $pesan = "Jawaban Kamu Sebelumnya Salah";
    }

    if ($_SESSION['no_soal'] == 11) {
        header("Location: score.php");
    }
}

if($_SESSION['lvl'] == 1){
    $a = rand(1,10);
    $b = rand(1,10);
}elseif ($_SESSION['lvl'] == 2) {
    $a = rand(10,30);
    $b = rand(10,30);
}elseif ($_SESSION['lvl'] == 3) {
    $a = rand(30,100);
    $b = rand(30,100);
}elseif ($_SESSION['lvl'] == 4){
    $a = rand(100,200);
    $b = rand(100,200);
}

$o = ["+","-","*","/"];
$io = array_rand($o);
$e = $a.$o[$io].$b;

if($_SESSION['lvl'] == 1){
    $add = 0;
}elseif ($_SESSION['lvl'] == 2) {
    $add = 1;
}elseif ($_SESSION['lvl'] == 3) {
    $add = 2;
}elseif ($_SESSION['lvl'] == 4){
    $add = rand(3, 5);
}

while ($add > 0) {
    if($_SESSION['lvl'] == 2) {
        $d = rand(10,30);
    }elseif ($_SESSION['lvl'] == 3) {
        $d = rand(30,100);
    }elseif ($_SESSION['lvl'] == 4){
        $d = rand(100,200);
    }
    $io2 = array_rand($o);
    $e = $e.$o[$io2].$d;
    $add--;
}

$splat_str = str_split($e);

for ($i=0; $i < count($splat_str)-1; $i++) { 
    if(!($splat_str[$i] == "*" || $splat_str[$i] == "/" || $splat_str[$i] == "+" || $splat_str[$i] == "-")){
        if(!($splat_str[$i+1] == "*" || $splat_str[$i+1] == "/" || $splat_str[$i+1] == "+" || $splat_str[$i+1] == "-")){
            $merge = $splat_str[$i].$splat_str[$i+1];
            array_splice($splat_str, $i, 2, $merge);
            $i--;
        }
    }
}

for ($i=0; $i < count($splat_str); $i++) { 
    if($splat_str[$i] == "*"){
        $hsl_m = $splat_str[$i-1] * $splat_str[$i+1];
        array_splice($splat_str, $i-1, 3, $hsl_m);
        $i--;
    }elseif ($splat_str[$i] == "/") {
        $hsl_m = $splat_str[$i-1] / $splat_str[$i+1];
        array_splice($splat_str, $i-1, 3, $hsl_m);
        $i--;
    }
}

for ($i=0; $i < count($splat_str); $i++) { 
    if($splat_str[$i] == "+"){
        $hsl_m = $splat_str[$i-1] + $splat_str[$i+1];
        array_splice($splat_str, $i-1, 3, $hsl_m);
        $i--;
    }elseif ($splat_str[$i] == "-") {
        $hsl_m = $splat_str[$i-1] - $splat_str[$i+1];
        array_splice($splat_str, $i-1, 3, $hsl_m);
        $i--;
    }
}

$hasil = $splat_str[0];
$hasil = round($hasil, 2);

$_SESSION['hsl'] = $hasil;
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
            box-shadow: 10px 10px 0px -1px #daa520;
            -webkit-box-shadow: 10px 10px 0px -1px #daa520;
            -moz-box-shadow: 10px 10px 0px -1px #daa520;
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
            <h2 style="margin-top:-10px"><?= "Score : ".$_SESSION['score']; ?></h2>
            <h1 style="margin-top:-50px"><?= "Level ".$_SESSION['lvl']; ?></h1>
        </pre>
        
        <form method="POST">
            <pre style="margin-top:-70px; font-size:20px">
            <h2><?= $e ?></h2>
            <?php 
            if(isset($pesan)){
                if($pesan=="Jawaban Kamu Sebelumnya Benar"){
                    echo"<span style='color:green; margin-left:-90px;'>$pesan</span>";
                }else{
                    echo"<span style='color:red; margin-left:-90px;'>$pesan</span>";
                }
            }
            ?>
            </pre>
                
            <!-- <input id="jawaban" type="text" name="jawaban" value="<?= $hasil ?>"> -->
            <input id="jawaban" type="text" name="jawaban">
            <br>
            <input id="jawab" type="submit" value="Jawab" name="jawab">
        </form>
    </div>
</body>
</html>