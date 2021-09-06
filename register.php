<?php
require_once 'connection.php';
if(isset($_POST['submit'])){
$name = $_POST['uname'];
$nationalId = $_POST['nationalId'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$license = $_POST['license'];
$governorate =$_POST['governorate'];
$age = $_POST['age'];
$date = date("Y/m/d");
$fileEdu = $_FILES['edu'];
$fileNameEdu = $_FILES['edu']['name'];
$fileTemNameEdu = $_FILES['edu']['tmp_name'];
$fileSizeEdu = $_FILES['edu']['size'];
$fileErrorEdu = $_FILES['edu']['error'];
$fileTypeEdu = $_FILES['edu']['type'];
$fileExtEdu = explode('.', $fileNameEdu);
$fileActualExtEdu = strtolower(end($fileExtEdu));
$allowedEdu = array ('png','jpg','jpeg','png');
   if(in_array($fileActualExtEdu, $allowedEdu)){
     if($fileErrorEdu === 0){
        if($fileSizeEdu < 1000000){
            $fileNameNewEdu = uniqid('',true).".".$fileActualExtEdu;
            $fileDestinationEdu = 'attach/'.$fileNameNewEdu;
            move_uploaded_file($fileTemNameEdu, $fileDestinationEdu);
             
            
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        }

$filedrive = $_FILES['Dlicense'];
$fileNamedrive = $_FILES['Dlicense']['name'];
$fileTemNamedrive = $_FILES['Dlicense']['tmp_name'];
$fileSizedrive = $_FILES['Dlicense']['size'];
$fileErrordrive = $_FILES['Dlicense']['error'];
$fileTypedrive = $_FILES['Dlicense']['type'];
$fileExtdrive = explode('.', $fileNamedrive);
$fileActualExtdrive = strtolower(end($fileExtdrive));
$alloweddrive = array ('png','jpg','jpeg','png');
   if(in_array($fileActualExtdrive, $alloweddrive)){
     if($fileErrordrive === 0){
        if($fileSizedrive < 1000000){
            $fileNameNewdrive = uniqid('',true).".".$fileActualExtdrive;
            $fileDestination = 'attach/'.$fileNameNewdrive;
            move_uploaded_file($fileTemNamedrive, $fileDestination);
             
            
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        }  
    
    
$filenational = $_FILES['national'];
$fileNamenational = $_FILES['national']['name'];
$fileTemNamenational = $_FILES['national']['tmp_name'];
$fileSizenational = $_FILES['national']['size'];
$fileErrornational = $_FILES['national']['error'];
$fileTypenational = $_FILES['national']['type'];
$fileExtnational = explode('.', $fileNamenational);
$fileActualExtnational = strtolower(end($fileExtnational));
$allowednational = array ('png','jpg','jpeg','png');
   if(in_array($fileActualExtnational, $allowednational)){
     if($fileErrornational === 0){
        if($fileSizenational < 1000000){
            $fileNameNewnational = uniqid('',true).".".$fileActualExtnational;
            $fileDestinationnational = 'attach/'.$fileNameNewnational;
            move_uploaded_file($fileTemNamenational, $fileDestinationnational);
            
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        } 
$filegesh = $_FILES['gesh'];
$fileNamegesh = $_FILES['gesh']['name'];
$fileTemNamegesh = $_FILES['gesh']['tmp_name'];
$fileSizegesh = $_FILES['gesh']['size'];
$fileErrorgesh = $_FILES['gesh']['error'];
$fileTypegesh = $_FILES['gesh']['type'];
$fileExtgesh = explode('.', $fileNamegesh);
$fileActualExtgesh = strtolower(end($fileExtgesh));
$allowedgesh = array ('png','jpg','jpeg','png');
   if(in_array($fileActualExtgesh, $allowedgesh)){
     if($fileErrorgesh === 0){
        if($fileSizegesh < 1000000){
            $fileNameNewgesh = uniqid('',true).".".$fileActualExtgesh;
            $fileDestinationgesh = 'attach/'.$fileNameNewgesh;
            move_uploaded_file($fileTemNamegesh, $fileDestinationgesh);
            
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        }
    
    $fileeqrar = $_FILES['eqrar'];
$fileNameeqrar = $_FILES['eqrar']['name'];
$fileTemNameeqrar = $_FILES['eqrar']['tmp_name'];
$fileSizeeqrar = $_FILES['eqrar']['size'];
$fileErroreqrar = $_FILES['eqrar']['error'];
$fileTypeeqrar = $_FILES['eqrar']['type'];
$fileExteqrar = explode('.', $fileNameeqrar);
$fileActualExteqrar = strtolower(end($fileExteqrar));
$allowedeqrar = array ('png','jpg','jpeg','png');
   if(in_array($fileActualExteqrar, $allowedeqrar)){
     if($fileErroreqrar === 0){
        if($fileSizeeqrar < 1000000){
            $fileNameNeweqrar = uniqid('',true).".".$fileActualExteqrar;
            $fileDestinationeqrar = 'attach/'.$fileNameNeweqrar;
            move_uploaded_file($fileTemNameeqrar, $fileDestinationeqrar);
           
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        }
    
$ins="INSERT INTO drivers (uname,nationalId,phone,age,governorate,education,license,edu,national,Dlicense,gesh,eqrar, date )VALUES ('$name','$nationalId','$phone','$age','$governorate','$education','$license','$fileDestinationEdu','$fileDestinationnational','$fileDestination','$fileDestinationgesh','$fileDestinationeqrar','$date')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
 echo '<script type="text/javascript">';
     echo ' alert("تم التسجيل بنجاح و سيتم الاتصال بك فى حالة القبول");';
    echo '</script>';
 echo '<script type="text/javascript">';echo'window.location.href="index.php";';echo '</script>';
}
else {
    echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التسجيل");';
    echo '</script>';
    echo '<script type="text/javascript">';echo'window.location.href="form.php";';echo '</script>';
}
      
}?>
