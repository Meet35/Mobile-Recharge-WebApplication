<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Mobile Recharge</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <style>
        body {
            background-color: #ddd;
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;  
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: cornflowerblue;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        form { 
            height: 100px;
        margin: 0 auto; 
        margin-left: 35%;
        margin-top: 15%;
        }
        </style>
        <div class="navbar">
            <a href="logout.php" onclick="alert("You will be logged out!!")">Home</a>
            
            </div>
        
    <?php 
    session_start();
    if(isset($_SESSION['Fname']))
    {
        echo '<h2><font color="orange">';
        echo "Welcome ".$_SESSION['Fname'];
        echo '</font></h2>';
    }
    else
    {
        $_SESSION['nouser']="You have to Login to access Recharge page";
        header("Location:index.php");
    }
?>
        <form action="Payment.php" method="POST">
            <table>
                <tr>
                    <td>
                        Mobile No. :
                    </td>
                    <td>
                        <input type="text" name="mobile" value="" required maxlength="10" minlength="10"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Operator : 
                    </td>
                    <td>
                        <select name="Operator">
                            <option>Idea</option>
                            <option>Vodafone</option>
                            <option>Jio</option>
                            <option>Airtel</option>
                            <option>BSNL</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Amount:
                    </td>
                    <td>
                        <input type="text" name="amount" value="" required maxlength="5" />
                    </td>
                </tr>
                <tr>
                    <td>
                            <input type="submit" value="Pay" name="pay"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
