<?php

   SESSION_START();

   include("../Database.php"); // sertakan database.php untuk dapat menggunakan class database

   $db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya   

   $email = $_POST['email'];

   $nama_user = $_POST['nama_user'];

   $token = ""; // dikosongkan untuk awal

   $password = md5($_POST['password']);

   $password2 = md5($_POST['password2']);   

   if($password == $password2)

   {

       if($email && $nama_user)

       {

           $result = $db->execute("INSERT INTO user_tbl(

                                                           email,

                                                           password,

                                                           nama_user,

                                                           token

                                                       ) VALUES(

                                                       '".$email."',

                                                       '".$password."',

                                                       '".$nama_user."',

                                                       '".$token."'

                                                   )");

           if($result){    $_SESSION["notification"] = "Register User Berhasil";    }

           else{    $_SESSION["notification"] = "Register User Gagal";     }

       }

   }

   header("Location: http://localhost/couse_backend_assignment/");   

?>