<?php

	 

	// Connect to MySQL

	    $username = "truud286";

	    $password = "nx[h2_SCqZy6";

	    $host = "truudeli7.net";

	    $dbname = "truud286_tyoajankirjaus";

	try {

	$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

	//$conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');

	}

	catch(PDOException $ex)

	    {

	        $msg = "Failed to connect to the database";

	    }

	     

	// Was the form submitted?

	if (isset($_POST["ResetPasswordForm"]))

	{

	    // Gather the post data

	    $email = $_POST["email"];

	    $password = $_POST["password"];

	    $confirmpassword = $_POST["confirmpassword"];

	    $hash = $_POST["q"];

	 

	    // Use the same salt from the forgot_password.php file

	    $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";


	    // Generate the reset key

	    $resetkey = hash('sha512', $salt.$email);

	 

	    // Does the new reset key match the old one?

	    if ($resetkey == $hash)

	    {

	        if ($password == $confirmpassword)

	        {

	            //has and secure the password

	            $password = hash('sha512', $salt.$password);

	 

	            // Update the user's password

	                $query = $conn->prepare('UPDATE to_opettaja SET salasana = :salasana WHERE email = :email');

	                $query->bindParam(':salasana', $password);

	                $query->bindParam(':salasana', $email);

	                $query->execute();

	                $conn = null;

	            echo "Your password has been successfully reset.";

	        }

	        else

	            echo "Your password's do not match.";

	    }

	    else

	        echo "Your password reset key is invalid.";

	}

	?>