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
            $_SESSION['pay_status']="Payment failed due to invalid credentials ):";
            if(isset($_SESSION['dcard']))
            {
               
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=urvish_php','root','');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql5=$dbhandler->query('select Number,MM,YY,CVV,Balance from debitcards');
                 while($r=$sql5->fetch())
                 {
                     $dnum=$r['Number'];
                     echo $dnum;
                     $mm=$r['MM'];
                     $yy=$r['YY'];
                     $cvv=$r['CVV'];
                     $bal=$r['Balance'];
                     $trns_id=$_SESSION['t_id'];
                     if($dnum===$_POST['cardNumber'])
                     {                         
                         if($mm===$_POST['expiryMonth'])
                         {
                             
                             if($yy===$_POST['expiryYear'])
                             {
                                 
                                 if($cvv===$_POST['cvCode'])
                                 {
                                     
                                     if($_SESSION['amount']<=$bal)
                                     {
                                         $remaining=$bal-$_SESSION['amount'];
                                         $meth='Debit Card';
                                         $sql6=$dbhandler->query("update debitcards set Balance='$remaining' where Number=$dnum");
                                         $sql10=$dbhandler->query("update transactions set Payment_Method='$meth' where Transaction_ID=$trns_id");
                                         $_SESSION['pay_status']="Payment successfull!!";
                                         
                                     }
                                     else
                                     {
                                            $_SESSION['pay_status']="Insufficient Balance";
                                     }
                                 }
                            }
                         }
                     }
                 }
                       
            }
            elseif (isset($_SESSION['net'])) 
            {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=urvish_php','root','');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql7=$dbhandler->query('select Username,Password,Balance,Bank from netbanking');
                while($r=$sql7->fetch())
                {
                 $uname=$r['Username'];
                 $pass=$r['Password'];
                 $bal1=$r['Balance'];
                 $bank=$r['Bank'];
                 $trns_id2=$_SESSION['t_id'];
                 if($uname===$_POST['username'])
                 {
                     if($pass===$_POST['pass'])
                     {
                        if($bank===$_POST['banks'])
                        {
                            if($_SESSION['amount']<=$bal1)
                            {
                                $meth2='Net Banking';
                                $remaining1=$bal1-$_SESSION['amount'];
                                $sql8=$dbhandler->query("update netbanking set Balance='$remaining1' where Username='$uname'");
                               $sql12=$dbhandler->query("update transactions set Payment_Method='$meth2' where Transaction_ID=$trns_id2");
                                $_SESSION['pay_status']="Payment successfull!!"; 
                            }
                            else 
                            {
                                $_SESSION['pay_status']="Insufficient Balance";
                            }
                        }
                     }
                 }
                     
                 }
            }
            header("Location:FinalPage.php");
            
        ?>
    </body>
</html>
