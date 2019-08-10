<?php 
	// echo "hi";
// use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;
//  require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
    session_start();

	$pdo = new PDO("mysql:host=localhost;dbname=searchus","root","");
    // echo "hi";
	 $rndno=rand(1000, 9999);

if(isset($_POST['email'])){
       
        

        $otp= $rndno ;
         $email= trim($_POST['email']);
        //  $message = urlencode("otp number.".$rndno);
        // $to=$email;
        // $subject = "OTP";
        // $txt = "OTP: ".$rndno."";
        // $headers = "From: sameerjaveed786@gmail.com" . "\r\n" .
        // "CC: sameerjaveed786@gmail.com";
        // // mail('zaheersyedkdr@gmail.com','ho','yo');

             $mail             = new PHPMailer();

            $mail->IsSMTP(); // telling the class to use SMTP
            // $mail->Host       = "smtp.gmail.com"; // SMTP server
            // $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                                       // 1 = errors and messages
                                                       // 2 = messages only
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 
            $mail->Host       = "smtp.gmail.com";      // SMTP server
            $mail->Port       = 587;                   // SMTP port
            $mail->Username   = "sameerjaveed786@gmail.com";  // username
            $mail->Password   = "Sameer@786";            // password

            $mail->SetFrom('sameerjaveed786@gmail.com', 'Sameer');

            $mail->Subject    = "OTP";

            $mail->MsgHTML("OTP: ".$rndno."");

            
            $mail->AddAddress($email);
            $mail->Send();
            // if(!$mail->Send()) {
            //   echo "Mailer Error: " . $mail->ErrorInfo;
            // } else {
            //   echo "Message sent!";
              $Query = $pdo->prepare("UPDATE registration SET otp=? WHERE email=?");
        $Query->execute([$otp,$email]);
      if($Query){
            // $_SESSION['created']="Your registered successfully.";
            echo json_encode(['status'=>'success']);
        }
            


        // $Query = $pdo->prepare("INSERT INTO registration (otp) VALUES(?)");
        
    //     $email = trim($_POST['email']);
   

    // $Query = $db->prepare("SELECT * FROM registration WHERE email = ?");
    // $Query->execute([$email]);
    // if($Query->rowCount() > 0 ){
    // $row = $Query->fetch(PDO::FETCH_OBJ);
    // // $dbPassword = $row->password;
    // // $name = $row->name;
    // $id = $row->id;
    // $row->otp = $rndno;
    // if(password_verify($password, $dbPassword)){
    //     $_SESSION['id'] = $id;
    //     $_SESSION['name'] = $name;
    //     echo json_encode(['status' => 'success']);
    // }
      
    // }
}

?>