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
    <link rel="stylesheet" href="css/stylesheet.css">
    
    <style>
        label{
            font-size: 19px;
        }
    #form-container{
    text-align: right;
	background-color: #eee;
    
}
        .submitButton{
    background-color: teal;
    margin-top: 10px;
}
        nav{
    background-image: linear-gradient(to right, #085E8C, #277DAB);
    text-align: right;
    padding-right: 30px;
    width: 100%;
    height: 80px;
}
    
    </style>
  
</head>
<body  style="color:#49405d;">
    <nav>
        <div class="row">
            <div class="col-2 pt-2"><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:100px;" /></div>



        </div>


    </nav>


<div class="title text-center text-dark border-bottom mb-3">
    <h2 class="heading">استمارة تسجيل السائقين</h2>
    <p style="font-size: 18px; color:red;">إدخل جميع البيانات المطلوبة في الحقول</p>
  </div>
  <section class="container" id="result">
    <h4 class="container-fluid headOfPersonal mb-3 pb-0">البيانات الأساسية
      <p class="mt-1 h4" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>
    <form name="Info" method="post" action="register.php" enctype="multipart/form-data">
            <section class="mb-4">
                 
        <div id="form-container" class="container">
            <h3 id="warn" style="color:red; display:none;">لا يسمح بالتسجيل لمن هم دون سن 28 او اكبر من 35 سنة</h3>
          <div class="row pt-2">
             
         <div class="mb-3 col-3 ">
              <label for="uname" class="form-label">الاسم (كما هو مدون بالبطاقة) :</label>
              <input type="text" class="form-control" name="uname" id="uname" maxlength="50" autocomplete="off" onkeypress="return CheckArabicCharactersOnly(event);"
                required>
            </div>
            <div id="national" class="mb-3 col-3">
              <label for="nationalId" class="form-label">الرقم القومى :</label>
              <input type="text" class="form-control" name="nationalId" id="nationalId" maxlength="14"
                autocomplete="off" onkeypress="return isNumberKey(event)" onchange="validationID()" required>
              <p id="idError" style="display:none; color:red;">*خطأ فى الرقم القومى</p>
            </div>
       <div class="mb-3 col-3">
              <label for="phone" class="form-label">تليفون :</label>
              <input type="text" class="form-control" name="phone" id="phone" onkeypress="return isNumberKey(event)" min="11" max="11"
                maxlength="11" autocomplete="off" onchange="validatePhone()" onfocus="validate()" required>
           <p id="phoneError" style="display:none; color:red;">*من فضلك ادخل رقم هاتف صحيح</p>
            </div>
          </div>
          <div class="row">
      <div id="eage" class="mb-3 mr-1 col-2">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control" name="age" id="age" readonly>
  </div>
               <div id="gov" class="mb-3 col-3">
              <label for="gov" class="form-label">محافظة السكن :</label>
              <select name="governorate" id="governorate" class="form-select   form-control" required>
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
            <div id="educationDIV" class="mb-3  col-3">
              <label for="education" class="form-label">المؤهل الدراسى  :</label>
              <select name="education" id="education" class="form-select   form-control" required>
                <option>--اختر--</option>
                <option value="متوسط">متوسط</option>
                <option value=" فوق متوسط"> فوق متوسط </option>
                <option value="عالى">عالى</option>
              </select>
            </div>
            <div id="licenseDIV" class="mb-3 col-3">
              <label for="license" class="form-label">درجة الرخصة :</label>
              <select name="license" id="license" class="form-select  form-control" required>
                <option>--اختر--</option>
                   <option value="اولى">اولى</option>
                   <option value="ثانية">ثانية</option>
              </select>
            </div>
          </div>
        </div>
      </section>
          <h4 class="container-fluid headOfPersonal mb-3 pb-0">مرفقات
      <p class="mt-1 h4" id="showHide" onclick="toggleForm()">
        <i class="fas fa-chevron-up"></i>
      </p>
    </h4>
          <section class="mb-4">
        <div id="form-container" class="container">
          <div class="row pt-2">
            <div class="mb-3 col-3">
             <label for="national"> بطاقة الرقم القومى  :</label>
          <input type="file" id="national" name="national" required>
            </div>
              <div class="mb-3 col-3">
             <label for="Dlicense"> رخصة القيادة  :</label>
				<input type="file" id="Dlicense" name="Dlicense" required>
            </div>
                 <div class="mb-3 col-4">
             <label for="edu">المؤهل الدراسي :</label>
				<input type="file" id="edu" name="edu" required>
            </div>
       
           
            </div>
            <div class="row">
         <div class="mb-3 col-3">
             <label for="eqrar"> إقرار بأنه لا يعمل فى اى وظيفة حكومية حالياً  :</label>
          <input type="file" id="eqrar" name="eqrar" required>
            </div>
                  <div class="mb-3 col-3">
             <label for="gesh"> شهادة الخدمة العسكرية  :</label><br><br>
          <input type="file" id="gesh" name="gesh" required>
            </div>
         
          </div>
        </div>
      </section>
          
              
              
              
              
              
    
      <button id="buttonsubmit" class="btn btn-lg text-white submitButton" type="submit" style="background-color:#085E8C;" name="submit"
        onclick="return confirm('هل جميع البيانات صحيحة؟');">تسجيل </button>
      <button class="btn btn-lg  backButton" type="button" name="back">
        <a href="index.php">رجوع</a></button>




    </form>
  </section>
    
      <footer style=" margin-top:3px;">
            <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
        </footer>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/mine.js"></script>
    <script>
    
function validationID() {
    var str = document.getElementById("nationalId").value;
    var res = str.split('');
    var Array = res;
    var month = Array[3] + Array[4];
    var day = Array[5] + Array[6];
    console.log(res);
    console.log(Array);
     var length = str.length;
        if (length != 14)
        {
            document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        }

        // Check the left most digit
		if (Array[0] != 2 && Array[0] != 3)
		{
			document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
		}
		if(month < 01 && month > 12){
           document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        }
		
     if(day < 01 && day > 31){
            document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        }
		
    var res1 = Array[0] * 2;
    var res2 = Array[1] * 7;
    var res3 = Array[2] * 6;
    var res4 = Array[3] * 5;
    var res5 = Array[4] * 4;
    var res6 = Array[5] * 3;
    var res7 = Array[6] * 2;
    var res8 = Array[7] * 7;
    var res9 = Array[8] * 6;
    var res10 = Array[9] * 5;
    var res11 = Array[10] * 4;
    var res12 = Array[11] * 3;
    var res13 = Array[12] * 2;
    var res14 = Array[13];
    
    var totalres = (res1 + res2 + res3 + res4 + res5 + res6 + res7 + res8 + res9 + res10 + res11 + res12 + res13);
    
    var x = totalres / 11;
    var out = parseInt(x) * 11;
    var ot = totalres - out;
   
    var y = 11 - ot;
    
    if (res14 == y) {
        document.getElementById("idError").style.display = "none";
    } else {
        document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        return false;
    }
    if (Array[0] == 2) {
        var today = new Date();
        var currentYear = today.getFullYear();
        console.log (currentYear);
        var yearArray = 19 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        
        document.getElementById("age").value = age;
        
    }

    if (Array[0] == 3) {
       var today = new Date();
        var currentYear = today.getFullYear();
      
        var yearArray = 20 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
     
        document.getElementById("age").value = age;
        
    }

}
function validatePhone(){
    var phone = document.getElementById("phone").value;
    var numbers = phone.split('');
    var ArrayPhone = numbers;
    var startPhone = ArrayPhone[0] + ArrayPhone[1];
    console.log(startPhone);
    if(phone.length != 11 || startPhone != 01){
        document.getElementById("phoneError").style.display = "block";
    }
    else{
        document.getElementById("phoneError").style.display = "none";
    }
    

}
function CheckArabicCharactersOnly(e) {
var unicode = e.charCode ? e.charCode : e.keyCode
if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
if (unicode == 32)
return true;
else {
if ((unicode < 0x0600 || unicode > 0x06FF)) //if not a number or arabic
return false; //disable key press
}
}
}

function validate(){
    var age = document.getElementById("age").value;
    if(age > 35 || age < 28){
        console.log("no");
        document.getElementById("warn").style.display = "block";
         document.getElementById("uname").readOnly = true;
         document.getElementById("nationalId").readOnly = true;
         document.getElementById("phone").readOnly = true;
         document.getElementById("governorate").readOnly = true;
         document.getElementById("education").readOnly = true;
         document.getElementById("license").readOnly = true;
         document.getElementById("buttonsubmit").style.display = "none";
    }
    else{
        console.log("yes");
        document.getElementById("warn").style.display = "none";
          document.getElementById("uname").readOnly = false;
         document.getElementById("nationalId").readOnly = false;
         document.getElementById("phone").readOnly = false;
         document.getElementById("governorate").readOnly = false;
         document.getElementById("education").readOnly = false;
         document.getElementById("license").readOnly = false;
         document.getElementById("buttonsubmit").style.display = "block";
    }
}
    </script>
</body>

</html>





