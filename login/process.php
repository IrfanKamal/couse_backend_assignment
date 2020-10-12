<?php

   SESSION_START();

   include("../Database.php"); // sertakan database.php untuk dapat menggunakan class database

   $db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya   

   $email = $_POST['email'];

   $password = md5($_POST['password']);

   $result = $db->get("SELECT email FROM user_tbl WHERE email= '".$email."' AND password='".$password."' ");

   if($result)

   {

       $_SESSION['notification'] = "Berhasil Login, Selamat Datang";

       $token = md5($email."coursebackendassignment".date("Y-m-d H:i:s"));

       $db->execute("UPDATE user_tbl SET token = '".$token."' WHERE email  = '".$email."'"); // update token to user_tbl

       $_SESSION['token'] = $token;

       $_SESSION['email'] = $email;

       header("Location: http://localhost/couse_backend_assignment/user/");

   }

   $_SESSION['notification'] = "Gagal Login, Coba lagi";

   header("Location: http://localhost/couse_backend_assignment/");

?>