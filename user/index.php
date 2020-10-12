<?php

SESSION_START();

include("../Database.php"); // sertakan database.php untuk dapat menggunakan class database

$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";

$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

if($token && $email)

{

   $result = $db->execute("SELECT * FROM user_tbl WHERE email = '".$email."' AND token = '".$token."'");

   if(!$result)

   {

       // redirect ke halaman login, data tidak valid

       header("Location: http://localhost/couse_backend_assignment/");

   }

   // abaikan jika token valid

   $userdata = $db->get("SELECT user_tbl.email as email, user_tbl.nama_user as nama_user from user_tbl WHERE user_tbl.email = '".$email."'");               

   $userdata = mysqli_fetch_assoc($userdata);                       

}

else

{

   header("Location: http://localhost/couse_backend_assignment/");

}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification)

{

   echo $notification;

   unset($_SESSION['notification']);   

}

?>

PAGE : HOME

<table border=1>

   <tr>

       <td>MENU</td>

       <td><a href="http://localhost/couse_backend_assignment/user/">HOME</a></td>

       <td><a href="http://localhost/couse_backend_assignment/user/inputscore.php">INPUT SCORE</a></td>       

       <td><a href="http://localhost/couse_backend_assignment/user/leaderboard.php">LEADERBOARD</a></td>

       <td><a href="http://localhost/couse_backend_assignment/user/logout.php">LOGOUT</a></td>

   </tr>

   <tr><td align="center" colspan=5>Profile</td></tr>

   <tr><td>Email</td><td colspan=4><?php echo $userdata['email'];?></td></tr>

   <tr><td>Nama</td><td colspan=4><?php echo $userdata['nama_user'];?></td></tr>

</table>