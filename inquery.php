<?php session_start(); require_once 'connection.php';?><html dir="rtl">
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
    <link rel="stylesheet" href="css/stylesheet.css">
      <style>
    .zoom {
  transition: transform .2s; /* Animation */
}

.zoom:hover {
  transform: scale(2.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
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


        <script>
    
    $(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	})
</script>
    </head>
 
    <body style="overflow-x:hidden;">
   <nav style="height:90px; border-bottom: 3px solid gray; background-image: linear-gradient(to right, #085E8C, #277DAB); text-align: right;">
        <div class="row">
            <div class="col-3 pt-2"><img src="img/logo-ar.svg" class="img-fluid" style="height:70px;" /></div>



        </div>
    </nav>
   <div class="pl-5 title text-center text-dark border-bottom mb-3" style="background-color:#ffffff;">
             <div class=" WOW fadeIn text-right" style="margin-top:10px;">
    	<form name="login" id="login" action="" method="POST">
            <div class="row">
                <div class="col-1"></div>
       <div id="licenseDIV" class="mb-3 col-3">
              <label for="license" class="form-label">درجة الرخصة :</label>
              <select name="license" id="license" class="form-select w-75 form-control" >
                <option>--اختر--</option>
                   <option value="اولى">اولى</option>
                   <option value="ثانية">ثانية</option>
              
               
              </select>
            </div>
                  <div id="gov" class="mb-3 col-3">
              <label for="gov" class="form-label">المحافظة  :</label>
              <select name="governorate" id="governorate" class="form-select w-75  form-control" required>
                <option>--اختر--</option>
                <?php
      require_once 'connection.php';
       $query= "select DISTINCT name from governorate";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'"  "selected">'.$row['name'].'</option>';
       }
       ?>
              </select>
            </div>
            <div class="col-2"> 
                <button class="btn btn-lg text-white submitButton mt-4" type="submit" name="search">بحث</button>
                </div>
            </div>
        </form>
        </div>
     
            
            </div>
        <?php 
         if(isset($_POST['search'])){
            $license = $_POST['license'];
             $governorate = $_POST['governorate'];
         $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 50;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM drivers where license = '$license' OR governorate = '$governorate' LIMIT $start,$limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);
              $countA = $conn->query("SELECT COUNT(DISTINCT id) as id FROM drivers where license = '$license' OR governorate = '$governorate'");
         $custCountA = $countA->fetch_all(MYSQLI_ASSOC);
	$totalDrivers = $custCountA[0]['id'];

	$result1 = $conn->query("SELECT count(id) AS id FROM drivers where license = '$license' OR governorate = '$governorate'");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit  );
if($page < 1){
    $page = 1;
}
	$Previous = $page - 1;
	$Next = $page + 1;
        
        
        ?>
                      	<div class="container" style="border: 1px solid #eeeeee;"> 
        
		<div class="row border-bottom">
            <div class="col-5" ><h3 class="text-right pt-3 mr-4"> إجمالى السائقين  <span class="font-weight-bold" style="color:red;">(<?php echo $totalDrivers; ?>)</span></h3></div>
            <div class="col-5"> </div>
         <div class="col-1 ml-1 border-right pt-2" ><input type="image" onclick="exportTableToExcel('tblData')" src="img/excel.png" style="height: 40px;"></div>
           
        </div>
			<div class="text-left" style="margin-top: 10px; " class="col-md-2">
				<form method="post" action="#">
                     <label for="limit-records" class="form-label">عدد السجلات لكل صفحة :</label>
						<select name="limit-records" id="limit-records">
							<option  selected="selected">50</option>
							<?php foreach([100,500,1000,5000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		<div class="container"  style="overflow-x: auto; ">
			<table id="tblData" class="table table-striped table-bordered">
	        	<thead>
	                  <tr>
                         <th>م</th>
	                    <th>تاريخ التسجيل</th>
	                    <th>الاسم</th>
	                    <th>الرقم القومى </th>
	                    <th>التليفون</th>
	                    <th>السن </th>
                         <th>محافظة السكن</th>
	                    <th>مستوى التعليمى </th>
	                    <th>درجة الرخصة</th>
                        <th>صورة الرقم القومى</th>
                     <th>صورة رخصة القيادة </th>
                    <th>صورة المؤهل الدراسى </th>
                    <th>إقرار بعدم العمل </th>   
                    <th>شهادة الخدمة العسكرية</th> 
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php foreach($customers as $customer) :  ?>
		        		    <tr>
        <td><?php echo $customer['id'];?></td>                        
    <td><?php echo $customer['date'];?></td>
      <td><?php echo $customer['uname'];?></td>
      <td><?php echo $customer['nationalId'];?></td>
      <td><?php echo $customer['phone'];?></td>
        <td><?php echo $customer['age'];?></td>
        <td><?php echo $customer['governorate'];?></td>
         <td><?php echo $customer['education'];?></td>
      <td><?php echo $customer['license'];?></td>
      <td><img class="zoom" src="<?php echo $customer['national'];?>" style="height:150px;"></td>
     	 <td><img class="zoom" src="<?php echo $customer['Dlicense'];?>" style="height:150px;"></td>
     	 <td><img class="zoom" src="<?php echo $customer['edu'];?>" style="height:150px;"></td>
     	 <td><img class="zoom" src="<?php echo $customer['eqrar'];?>" style="height:150px;"></td>
       <td><img class="zoom" src="<?php echo $customer['gesh'];?>" style="height:150px;"></td>
      </tr>
	        		<?php endforeach; ?>
	        	</tbody>
      		</table>

      		
		</div>

        
        
<div style="background-color:white; " aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="dashboard.php?page=<?= $Previous; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo; السابق</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
          <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li class="page-item" ><a class="page-link" href="dashboard.php?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
    
    <li class="page-item">
      <a class="page-link" href="dashboard.php?page=<?= $Next; ?>" aria-label="Next">
        <span aria-hidden="true">التالى &raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</div>
    </div>
        <?php }
        else{
    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 50;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM drivers  LIMIT $start,$limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);
 $countA = $conn->query("SELECT COUNT(DISTINCT id) as id FROM drivers");
         $custCountA = $countA->fetch_all(MYSQLI_ASSOC);
	$totalDrivers = $custCountA[0]['id'];
	$result1 = $conn->query("SELECT count(id) AS id FROM drivers");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit  );
if($page < 1){
    $page = 1;
}
	$Previous = $page - 1;
	$Next = $page + 1;
        
        
        ?>
            
            	<div class="container" style="border: 1px solid #eeeeee;"> 
        
		<div class="row border-bottom">
            <div class="col-5" ><h3 class="text-right pt-3 mr-4">إجمالى السائقين <span class="font-weight-bold" style="color:red;">(<?php echo $totalDrivers; ?>)</span></h3></div>
            <div class="col-5"> </div>
         <div class="col-1 ml-1 border-right pt-2" ><input type="image" onclick="exportTableToExcel('tblData')" src="img/excel.png" style="height: 40px;"></div>
           
        </div>
		<div class="text-left" style="margin-top: 10px; " class="col-md-3">
				<form method="post" action="#">
                     <label for="limit-records" class="form-label">عدد السجلات لكل صفحة :</label>
						<select name="limit-records" id="limit-records">
							<option  selected="selected">50</option>
							<?php foreach([100,500,1000,5000] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		<div class="container"  style="overflow-x: auto; ">
			<table id="tblData" class="table table-striped table-bordered">
	        	<thead>
	                    <tr>
                         <th>م</th>
	                    <th>تاريخ التسجيل</th>
	                    <th>الاسم</th>
	                    <th>الرقم القومى </th>
	                    <th>التليفون</th>
	                    <th>السن </th>
                         <th>محافظة السكن</th>
	                    <th>مستوى التعليمى </th>
	                    <th>درجة الرخصة</th>
                        <th>صورة الرقم القومى</th>
                     <th>صورة رخصة القيادة </th>
                    <th>صورة المؤهل الدراسى </th>
                    <th>إقرار بعدم العمل </th>   
                    <th>شهادة الخدمة العسكرية</th> 
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php foreach($customers as $customer) :  ?>
		     <tr>
        <td><?php echo $customer['id'];?></td>                        
    <td><?php echo $customer['date'];?></td>
      <td><?php echo $customer['uname'];?></td>
      <td><?php echo $customer['nationalId'];?></td>
      <td><?php echo $customer['phone'];?></td>
        <td><?php echo $customer['age'];?></td>
        <td><?php echo $customer['governorate'];?></td>
         <td><?php echo $customer['education'];?></td>
      <td><?php echo $customer['license'];?></td>
      <td><img class="zoom" src="<?php echo $customer['national'];?>" style="height:150px;"></td>
     	 <td><img class="zoom" src="<?php echo $customer['Dlicense'];?>" style="height:150px;"></td>
     	 <td><img class="zoom" src="<?php echo $customer['edu'];?>" style="height:150px;"></td>
     	 <td><img class="zoom"src="<?php echo $customer['eqrar'];?>" style="height:150px;"></td>
       <td><img class="zoom" src="<?php echo $customer['gesh'];?>" style="height:150px;"></td>
      </tr>
	        		<?php endforeach; ?>
	        	</tbody>
      		</table>

      		
		</div>

        
        
<div style="background-color:white;" aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="dashboard.php?page=<?= $Previous; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo; السابق</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
          
    
    <li class="page-item">
      <a class="page-link" href="dashboard.php?page=<?= $Next; ?>" aria-label="Next">
        <span aria-hidden="true">التالى &raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</div>
    </div>

   <?php         
        }

        ?>
    
        

          
         <footer style="margin-top:3px;">
        <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
        </footer>
         
        <script src="js/popper.min.js"></script>
        <script src="=js/bootstrap.min.js"></script>  
        <script src="=js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="js/mine.js"></script>
        <script>
function exportTableToExcel(tableID, filename = 'السائقين'){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        //triggering the function
        downloadLink.click() }}
</script>
    </body>
</html>