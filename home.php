<?php
$con = mysqli_connect('localhost','root','','ip');
header("login.php");
if(isset($_POST['submit'])){
    
 $ip = $_POST['ip'];
 $device = $_POST['device'];
 $epsw = $_POST['epsw'];
 $sip = $_POST['sip'];
 $port = $_POST['port'];
 $res = $_POST['res']; 
 $loc = $_POST['loc']; 
 $note = $_POST['note']; 
    
 $query = "INSERT INTO `ipinf`(`id`, `ip`, `device`, `epsw`, `sip`, `port`, `reseller`, `location`, `note`) VALUES ('NULL','$ip','$device','$epsw','$sip','$port','$res','$loc','$note')";
 
$run = mysqli_query ($con,$query);

 if($run == TRUE){
    header('location:home.php');
  }
 else{
    echo "Insert problem";
 }
}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>AP Information</title>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.10.5/css/jquery.dataTables.css'>
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script rel="javascript" href="js/jq.js"></script>
<script src="js/ajax.js"></script>
<script>
$(document).ready(function(){
  $("#addb").click(function(){
    $("#frm").toggle(1500);
  });
    
$("#alrt").click(function(){
   alert("Do you Want to Delete !!");
  });
$("#search").keyup(function(){
    var search=$(this).val();
  $.post($('form').attr('action'),
        {'search': search},
         function(data){
      $('.success').html(data)
  }
  )
 });

$("#src").click(function(){
    var search=$(this).val();
  $.post($('form').attr('action'),
        {'search': search},
         function(data){
      $('#srch').html(data)
  }
  )
 });
    
});
</script>
  
</head>

<body background="Login/images/585648776-black-texture-wallpaper.jpg">
    <style>
        .logo{
            height: 250px;
            width: 300px;
            margin-top: -50px;
            margin-bottom: 10px;
        }
    </style>
<div class="container" ng-app="sortApp" ng-controller="mainController">
  <center><img class="logo" src="Login/images/img-01.png" /></center>
  <div class="alert alert-success col-md-11 px-2">
      <p>Please Use --IP Address & Reseller Name-- For Searching.... </p>
  </div><a class="btn btn-danger col-md-1" href="logout.php">LogOut</a>
  <form action="search.php" method="POST">
    <div class="form-group col-md-12">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-search"></i></div>
        <input type="text" class="form-control" id="search" name="search" placeholder="Search By IP & Reseller Name">
      </div>      
      </div></form>
      
  <form id="frm" class="form-group col-md-12" style="display: none;background: #F2F2F2; border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
border: 0.5px solid #000000;" method="POST"><span>-</span>
      
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">IP :</label>
      <input type="text" name="ip" class="form-control" placeholder="Please Input IP Address">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Device Name :</label>
      <input type="text" name="device" class="form-control" placeholder="Please Insert Device Name">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">EPON/Switch :</label>
    <input type="text" name="epsw" class="form-control" placeholder="Please Insert EPON/Switch">
  </div>
      <div class="form-group col-md-4">
    <label for="inputAddress2">Switch IP/ONU Mac :</label>
    <input type="text" name="sip" class="form-control" placeholder="Please Insert EPON/Switch">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Port :</label>
    <input type="text" name="port" class="form-control" placeholder="Please Insert EPON/Switch">
  </div>
   <div class="form-group col-md-4">
    <label>Reseller :</label>
    <select class="form-control" name="res"  required="required"> 
    <option value="">Sellect Reseller Name</option>
    <option value="Skynet Chowmuhani">Skynet Chowmuhani</option>
    <option value="Top Net">Top Net</option>
    <option value="Mirja Online">Mirja Online</option>
</select>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Location :</label>
      <input type="text" name="loc" class="form-control" placeholder="Please Insert Location">
    </div>
     </div>
       <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Note :</label>
      <input type="text" name="note" class="form-control" placeholder="Please Insert Note">
    </div>
     </div>
 <div class="form-row">
    <div class="form-group col-md-12">
  <button type="submit" name="submit" class="btn btn-success col-md-12">Add Data</button>
     </div>
      </div>
</form>
      <button class="btn btn-info col-md-12" id="addb">Add New Data</button>
  <table class="table-bordered table-striped container success table-warning" id="employee_data">
    <thead>
      <tr style="background-color: white">
        <td>ID
         <!-- <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
            Sushi Roll 
            <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
          </a> -->
        </td>
          <td>IP Address</td>
          <td>Device Name</td>
          <td>EPON/Switch</td>
          <td style="background-color: white">Switch IP/ONU Mac</td>
          <td style="background-color: white">Port</td>
          <td style="background-color: white">Reseller</td>
          <td style="background-color: white">Location</td>
          <td style="background-color: white">Note</td>
          <td style="background-color: white">Edit</td>
          <td style="background-color: white">Delete</td>
          <!--<a href="#" ng-click="sortType = 'tastiness'; sortReverse = !sortReverse">
          Taste Level 
            <span ng-show="sortType == 'tastiness' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'tastiness' && sortReverse" class="fa fa-caret-up"></span>
          </a>-->
      
       
      </tr>
    </thead>
    
    <tbody>
      <center> <?php
            $con = mysqli_connect('localhost','root','','ip');
            $locations="SELECT * FROM `ipinf`";
              $tab2=mysqli_query($con,$locations);
        while($funtime=mysqli_fetch_assoc($tab2)){
                                
                            
                    echo "<tr>";
                           echo "<th scope='row'>".$funtime['id']."</th>";
                            echo "<td>".$funtime['ip']."</td>";
                            echo "<td>".$funtime['device']."</td>";
                           echo " <td>".$funtime['epsw']."</td>";
                           echo " <td>".$funtime['sip']."</td>";
                            echo " <td>".$funtime['port']."</td>";
                           echo " <td>".$funtime['reseller']."</td>";
                           echo " <td>".$funtime['location']."</td>";
                           echo " <td>".$funtime['note']."</td>";
            ?>
                           <td> <a  class="btn btn-success" href="edit.php?idd=<?php echo $funtime['id']; ?>" >Edit</a></td>
                         <td> <a class="btn btn-danger" href="reject.php?id=<?php echo $funtime['id']; ?>" id="alrt" >Delete</a></td>
                         <?php echo "</tr>"; ?>
                       <?php  } ?>
            </center>
        
           </tbody>
    
  </table>
  
  <p class="text-center text-muted">
    <a href="#" target="_blank">Abdullah Mamun</a>
  </p>
  
  <p class="text-center">
    by <a href="#" target="_blank">Skynet Chowmuhani</a>
  </p>
  
</div>





</body>

</html>
 <script src="tables.min.js"></script>
<script>
 $(document).ready(function(){  
 $('#employee_data').DataTable();  
 });  

 </script> 