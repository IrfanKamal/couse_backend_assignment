<?php

SESSION_START();

include("../Database.php"); // sertakan database.php untuk dapat menggunakan class database

$db = new Database(); // membuat objek baru dari class database agar dapat menggunakan fungsi didalamnya


if(isset($_GET['game_id']))

{

    $_SESSION['game_id'] = $_GET['game_id'];
    $_SESSION['level'] = "";

}

else if(isset($_GET['level']))

{

    $_SESSION['level'] = $_GET['level'];

}

else

{
    $_SESSION['game_id'] = "";
    $_SESSION['level'] = "";
}

$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";

$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

$game_id = (isset($_SESSION['game_id'])) ? $_SESSION['game_id'] : "";

$level = (isset($_SESSION['level'])) ? $_SESSION['level'] : "";

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

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification)

{

   echo $notification;

   unset($_SESSION['notification']);   

}

?>

PAGE : INPUT SCORE

<table border=1>

   <tr>

       <td>MENU</td>

       <td><a href="http://localhost/couse_backend_assignment/user/">HOME</a></td>

       <td><a href="http://localhost/couse_backend_assignment/user/inputscore.php">INPUT SCORE</a></td>       

       <td><a href="http://localhost/couse_backend_assignment/user/leaderboard.php">LEADERBOARD</a></td>

       <td><a href="http://localhost/couse_backend_assignment/user/logout.php">LOGOUT</a></td>

   </tr>

</table>

<br>

<form action="http://localhost/couse_backend_assignment/user/inputscore.php" method='GET'>

       Pilih Game

       <select name="game_id">

           <?php

           $gamedata = $db->get("SELECT game_id,nama_game FROM game_tbl");                                

           while($row = mysqli_fetch_assoc($gamedata))

           {

               ?>

               <option value="<?php echo $row['game_id']?>"><?php echo $row['nama_game']?></option>

               <?php

           }

           ?>

       </select>

       <input type="submit" value="Pilih Game">

</form>

<?php

if ($game_id) 
{
    ?>
    <form action="http://localhost/couse_backend_assignment/user/inputscore.php" method='GET'>

    Pilih Level

    <select name="level">

    <?php

        $jumlah_level = $db->get("SELECT jumlah_level FROM game_tbl WHERE game_id = '".$game_id."'");
        $jumlah_level = mysqli_fetch_assoc($jumlah_level);                                

        for ($i = 1; $i <= $jumlah_level['jumlah_level']; $i++)

        {

            ?>

            <option value="<?php echo $i?>"><?php echo $i?></option>

            <?php

        }

    ?>

    </select>

    <input type="submit" value="Pilih Level">    

    </form>
    <?php
}
?>

<br>

<?php 

if ($game_id)
{
    $nama_game = $db->get("SELECT nama_game FROM game_tbl WHERE game_id = '".$game_id."'");
    $nama_game = mysqli_fetch_assoc($nama_game);
    echo "Game : ".$nama_game['nama_game'].", ";
} 
if ($level)
{
    echo "Level : ".$level;

    ?>

    <br>

    <form action = "inputscore_process.php" method="POST">

    Score :

    <input type="text" name="score" required>

    <input type="submit" value="Input Score">

    <?php
}

?>
