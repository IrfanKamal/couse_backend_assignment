<?php

SESSION_START();

include("Database.php"); // sertakan database.php untuk dapat menggunakan class database

$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya

$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";

$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

if($token && $email)

{

  $result = $db->execute("SELECT * FROM user_tbl WHERE email = '".$email."' AND token = '".$token."'");

  if($result)

  {

      // redirect ke halaman user, token valid

      header("Location: http://localhost/couse_backend_assignment/user/");

  }

  // abaikan jika token tidak valid

}

// token tidak tersedia

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification)

{

   echo $notification;

   unset($_SESSION['notification']);   

}

?>

PAGE : REGISTER

<form action="login/register_process.php" method="POST">

<table>

  <tr>

      <td>email</td><td>:</td><td><input type="text" name="email" required></td>

  </tr>

  <tr>

      <td>password</td><td>:</td><td><input type="password" name="password" required></td>

  </tr>

  <tr>

      <td>password(again)</td><td>:</td><td><input type="password" name="password2" required></td>

  </tr>  

  <tr>

      <td>nama lengkap</td><td>:</td><td><input type="text" name="nama_user" required></td>

  </tr>   

  <tr>

      <td colspan=3><input type="submit" value="REGISTER"></td>

  </tr>      

</table>

</form>

<button><a href="http://localhost/couse_backend_assignment/">Back to Login</button>