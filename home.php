<html>
    <head>
        <title>Freecharge</title>
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
        </style>    
        <style>
</style>
        <div class="navbar">
            <a href="index.php" onclick="alert('You will be log out')">Home</a>
            
        </div>
<?php 
    session_start();
    echo '<h2><font color="purple">';
     echo "Welcome ".$_SESSION['Fname'];
     echo '</font></h2>';?>
        <br>
      
        <a href="MobileRecharge.html" class="button"></a>
        <div style="center">
        <form action="MobileRecharge.html">
            <input type="submit" value="Mobile Recharge" align="center"/>
        </form>
            </div>
        <div style="center">
        <form action="BillPayment.html">
            <input type="submit" value="Bill Payment" />
        </form>
        </div>
    </body>
</html>

