<?php

SESSION_START();

include("../Database.php"); // sertakan database.php untuk dapat menggunakan class database

$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";

$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

$game_id = (isset($_SESSION['game_id'])) ? $_SESSION['game_id'] : "";

$level = (isset($_SESSION['level'])) ? $_SESSION['level'] : "";

$score = $_POST['score'];

if($token && $email)

{

   $result = $db->execute("SELECT * FROM user_tbl WHERE email = '".$email."' AND token = '".$token."'");

   if(!$result)

   {

       // redirect ke halaman login, data tidak valid

       header("Location: http://localhost/couse_backend_assignment/");

   }

}

else

{

   header("Location: http://localhost/couse_backend_assignment/");

}

$result = $db->execute("INSERT INTO score_tbl(

                                                email,

                                                game_id,

                                                level,

                                                score,

                                                waktu_score

                                            ) VALUES(

                                                '".$email."',

                                                '".$game_id."',

                                                '".$level."',

                                                '".$score."',

                                                NOW()

)");

if($result){    $_SESSION["notification"] = "Input Score Berhasil";    }

else{    $_SESSION["notification"] = "Input Score Gagal";     }

header("Location: http://localhost/couse_backend_assignment/user/inputscore.php");

?>