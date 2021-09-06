   <html dir="rtl">

<head>
    <title>وزارة الصحة و السكان المصرية</title>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
      <style>
    
    .new{
    width: 100px;
	margin-top: 50px;
    border-radius: 20px;
	box-shadow: 1px 2px #888888;
	cursor: pointer;
	background-color: white;
	height: 200px;
	padding-top: 50px;
	margin-right: 120px;
    transition: 0.5s;
}
.new:hover{
	cursor: pointer;
	background-color: white;
	height: 200px;
	padding-top: 50px;
	border-radius: 20px;
	box-shadow: 3px 4px 3px 4px #888888;
}
          .submitButton{
              color:white;
              
    background-color: #085E8C;
    margin-top: 10px;
}
.submitButton:hover{
    background-color: #277DAB;  
    margin-top: 10px;
 
}
    </style>
</head>
<body style="overflow:hidden;">
    <nav style="height:90px; border-bottom: 3px solid gray;">
        <div class="row">
            <div class="col-3 pt-2"><img src="img/logo-ar.svg" class="img-fluid" style="height:70px;" /></div>



        </div>
	

    </nav>
 <div class="back">
<div class="container2">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3> ADMIN LOGIN</h3>
				
			</div>
			<div class="card-body">
				<form name="login" action="" method="POST">
					<div class="input-group form-group mt-3">
						
						<input name="username" type="text" class="form-control text-left" placeholder="username" required>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
					</div>
                    <br>
                    <br>
					<div class="input-group form-group">
						
						<input name="password" type="password" class="form-control text-left" placeholder="********" required>
                        <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
					</div>
					
					<div class="form-group">
                        <button class="btn btn-lg text-white submitButton" type="submit" name="login" >Login</button>
						
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
    </div>
<?php
    require_once 'connection.php';
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ins="SELECT * FROM users WHERE name = '$username' AND password = '$password' limit 1";
        $query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        $result = mysqli_fetch_array($query);
        if(mysqli_num_rows($query)==1){
         
             echo '<script type="text/javascript">';echo'window.location.href="inquery.php";';echo '</script>';
           } 
        else {
          echo "<script type='text/javascript'>alert('اسم المستخدم او كلمة السر خطأ');</script>";
        
        }

 }?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/mine.js"></script>
</body>

</html>