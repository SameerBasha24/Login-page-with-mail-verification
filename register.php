<?php 
	// echo "hi";
    session_start();
	$pdo = new PDO("mysql:host=localhost;dbname=searchus","root","");
    // echo "hi";
	if(isset($_POST['email']) && isset($_POST['username'])){

        $email= trim($_POST['email']);
        $username = trim($_POST['username']); 

        $Query = $pdo->prepare("INSERT INTO registration (email, username) VALUES(?,?)");
        $Query->execute([$email,$username]);
        if($Query){
            // $_SESSION['created']="Your registered successfully.";
            echo json_encode(['status'=>'success']);
        }
    }


?>