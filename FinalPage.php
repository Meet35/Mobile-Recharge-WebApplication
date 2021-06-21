<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['Fname']))
            {
                 $_SESSION['nouser']="Access Denied!!";
                 header("Location:index.php");
            }
             $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=urvish_php','root','');
             $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            unset($_SESSION['net']);
            unset($_SESSION['dcard']);
            $_SESSION['transaction']="done";
            $trns1_id=$_SESSION['t_id'];
            if($_SESSION['pay_status']==='Payment successfull!!')
            {
                $sql10=$dbhandler->query("update transactions set Status='Successfull' where Transaction_ID=$trns1_id");
            }
            echo $_SESSION['pay_status'];
        ?>
    </body>
</html>
