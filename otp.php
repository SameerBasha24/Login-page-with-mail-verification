<?php 
	// echo "hi";
    session_start();
	$pdo = new PDO("mysql:host=localhost;dbname=searchus","root","");
    // echo "hi";
	if(isset($_POST['otp'])){

        $otp= trim($_POST['otp']);
         

        // $Query = $pdo->prepare("INSERT INTO registration (email, username) VALUES(?,?)");
        // $Query->execute([$email,$username]);
        

         $Query = $pdo->prepare("SELECT * FROM registration WHERE otp = ?");
        $Query->execute([$otp]);
        if($Query->rowCount() > 0 ){
        // $row = $Query->fetch(PDO::FETCH_OBJ);
        // // $dbPassword = $row->password;
        // // $name = $row->name;
        // $op = $row->otp;
        // // $row->otp = $rndno;
        // if(password_verify($password, $dbPassword)){
        //     $_SESSION['id'] = $id;
        //     $_SESSION['name'] = $name;
        //     echo json_encode(['status' => 'success']);
        // }
        
            // $_SESSION['created']="Your registered successfully.";
            echo json_encode(['status'=>'success']);
       
          
        }
        
    }


?>