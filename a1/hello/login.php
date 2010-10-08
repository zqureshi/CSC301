<html>
<head>
<title> Online Lab Booking Tool </title>
</head>
<body>

    <div align="center">
    <?php
    
    // Get the user id and password from the Form
    $userid = $_POST["loginId"];
    $password1 = $_POST["password"];
    
    if($password1 != ""){
    // Connect to the database.
    mysql_connect("sql100.xtreemhost.com", "xth_6487779", "1quebec1") or die(mysql_error());
    
    // Select the passwords database
    mysql_select_db("xth_6487779_passwords") or die(mysql_error());
    
    // find the user id and password from the database.
    $result = mysql_query("SELECT * FROM people where loginID='$userid'") or die(mysql_error());  
    
    $row = mysql_fetch_array( $result );
    $password2 = $row['password'];
    
    // Check if the password matches.
    if ( $password1 == $password2 ){
        echo "$userid have sucessfully logged in" ;
    }else{
    echo "<h3>Login Failed!!</h3>" ;
    }
    }else{
    echo "<h3>Login Failed!!!</h3>" ;
    }
    ?>
    </div>
</body>
</html>