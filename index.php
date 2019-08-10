
<!DOCTYPE html>
<html>

<head>
	<title>SearchUs</title>
		<meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
        <meta name="view-port" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
       
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<style type="text/css">
  .hide{
    display: none;
  }
  </style>
</head>
<body>
	<div class="container">
    <h1>SearchUs</h1>
        <div class="reg">
            <form >
                                      <div class="form-group">
                                        
                                          <label for="email">Email</label>
                                          <input type="email" id="email" name="email" class="form-control">
                                          <label for="username">Username</label>
                                          <input type="text" id="username" name="Username" class="form-control">
                                          <br/>
                                          <button type="button" class="btn btn-info" id="regbtn">Register</button>
                                          <!-- <input type="button" id="regbtn" value="Register" > -->
                                      </div>

          </form>
        </div>
        <div class="log hide">
            <h1>You are registered successfully</h1>
            <form >
                                      <div class="form-group">
                                          
                                          <label for="em">Email</label>
                                          <input type="email" id="em" name="em" class="form-control">
                                          
                                          <button type="button" class="btn btn-info" id="logbtn">Submit</button>
                                          <!-- <input type="button" id="regbtn" value="Register" > -->
                                      </div>

          </form>
        </div>
        <div class="otp hide">
            <h2>An otp has been sent to your mail</h2>
            <form >
                                      <div class="form-group">
                                          
                                          <label for="otp">OTP</label>
                                          <input  id="otp" name="otp" class="form-control">
                                          
                                          <button type="button" class="btn btn-info" id="otpbtn">Login</button>
                                          <!-- <input type="button" id="regbtn" value="Register" > -->
                                      </div>

          </form>
        </div>
        <div class="user hide">
            <h1>Your are logged in succesfully.</h1>
            
        </div>
       
	</div>
 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> 
<script>
	$(document).ready(function(){

		$("#regbtn").click(function(){
			const email = $("#email").val();
			const username = $("#username").val();
            // alert(email);
			if (email=="" || username=="") {
				alert("Please enter the details");
			}
			if(email.length != "" && username.length != ""){

				// alert("Please details");
                $.ajax({
                      type: "POST",
                      url : "register.php",
                      data : {"email": email, "username" : username},
                      dataType: 'JSON',
                      success : function(feedback){
                        
                          if(feedback.status === "success"){
                              // window.location = "index.php";
                              $(".reg").addClass("hide");
                              $(".log").removeClass("hide");
                          }
                      }


                })
			}
			
		})
    $("#logbtn").click(function(){
      const email = $("#em").val();
      
      if (email=="") {
        alert("Please enter the details");
      }
      if(email.length != "" ){

        // alert("Please details");
                $.ajax({
                      type: "POST",
                      url : "login.php",
                      data : {"email": email},
                      dataType: 'JSON',
                      success : function(result){
                          
                          if(result.status === "success"){
                              // window.location = "index.php";
                              // $(".reg").addClass("hide");
                              $(".log").addClass("hide");
                              $(".otp").removeClass("hide");

                          }
                      }


                })

      }
      
    })
    $("#otpbtn").click(function(){
      const otp = $("#otp").val();
      
      if (otp=="") {
        alert("Please enter the details");
      }
      if(otp.length != "" ){

        // alert("Please details");
                $.ajax({
                      type: "POST",
                      url : "otp.php",
                      data : {"otp": otp},
                      dataType: 'JSON',
                      success : function(final){
                       
                          if(final.status === "success"){
                              // window.location = "index.php";
                              // $(".reg").addClass("hide");
                             // $(".log").addClass("hide");
                              $(".otp").addClass("hide");
                              $(".user").removeClass("hide");

                          }
                      }


                })
      }
      
    })


	})

</script>
</body>
</html>