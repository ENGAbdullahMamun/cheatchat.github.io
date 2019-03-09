<?php
$con = mysqli_connect('localhost','root','','ip');
$idd = $_GET['idd'];
$locations="SELECT * FROM `ipinf` WHERE id='$idd'";
$tab=mysqli_query($con,$locations);

while($row=mysqli_fetch_assoc($tab)){
    $id = $row['id'];  
    $ip = $row['ip'];  
    $device = $row['device'];  
    $epsw = $row['epsw'];  
    $sip = $row['sip'];  
    $port = $row['port'];  
    $reseller = $row['reseller'];  
    $location = $row['location'];  
    $note = $row['note'];  
  }
?>

<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>Update Information</title>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.10.5/css/jquery.dataTables.css'>
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script rel="javascript" href="js/jq.js"></script>
<script src="js/ajax.js"></script>
</head>

<body>
    
        
    
  <div class="container" ng-app="sortApp" ng-controller="mainController">
  
  <div class="alert alert-success">
<p>Update Data</p>
 </div>

   
  <form class="form-group col-md-12" style="background: #F2F2F2; border-radius: 10px 10px 10px 10px;
-moz-border-radius: 10px 10px 10px 10px;
-webkit-border-radius: 10px 10px 10px 10px;
border: 0.5px solid #000000;" method="POST"><span>-</span>
      
  <div class="form-row">
      <div class="form-group col-md-4">
      <label for="inputEmail4">ID :</label>
      <input type="int" name="idde" class="form-control" placeholder="Please Input IP Address" value="<?php echo $id; ?>" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">IP :</label>
      <input type="text" name="ip" class="form-control" placeholder="Please Input IP Address" value="<?php echo $ip; ?>" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Device Name :</label>
      <input type="text" name="device" class="form-control" placeholder="Please Insert Device Name" value="<?php echo $device; ?>">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">EPON/Switch :</label>
    <input type="text" name="epsw" class="form-control" placeholder="Please Insert EPON/Switch" value="<?php echo $epsw; ?>">
  </div>
      <div class="form-group col-md-4">
    <label for="inputAddress2">Switch IP :</label>
    <input type="text" name="sip" class="form-control" placeholder="Please Insert EPON/Switch" value="<?php echo $sip; ?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Port :</label>
    <input type="number" name="port" class="form-control" placeholder="Please Insert EPON/Switch" value="<?php echo $port ; ?>">
  </div>
   <div class="form-group col-md-4">
    <label>Reseller :</label>
    <select class="form-control" name="res"  required="required" value="<?php echo $reseller; ?>"> 
    <option value="">Sellect Reseller Name</option>
    <option value="Skynet Chowmuhani">Skynet Chowmuhani</option>
    <option value="Top Net">Top Net</option>
    <option value="Mirja Online">Mirja Online</option>
</select>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Location :</label>
      <input type="text" name="loc" class="form-control" placeholder="Please Insert Location" value="<?php echo $location; ?>">
    </div>
     </div>
       <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Note :</label>
      <input type="text" name="note" class="form-control" placeholder="Please Insert Note" value="<?php echo $note; ?>">
    </div>
     </div>
 <div class="form-row">
    <div class="form-group col-md-12">
  <button type="submit" name="update" class="btn btn-success col-md-12">Update Data</button>
     </div>
      </div>
</form>
     <?php
      $con = mysqli_connect('localhost','root','','ip');
      if(isset($_POST['update'])){
          
         $idi = $_POST['idde'];
         $ip = $_POST['ip'];
         $device = $_POST['device'];
         $epsw = $_POST['epsw'];
         $sip = $_POST['sip'];
         $port = $_POST['port'];
         $res = $_POST['res']; 
         $loc = $_POST['loc']; 
         $note = $_POST['note'];
         $query = "UPDATE `ipinf` SET `ip`='$ip',`device`= '$device',`epsw`='$epsw',`sip`='$sip',`port`='$port',`reseller`='$res',`location`='$loc',`note`='$note' WHERE `id`='$idi'";
          
      $res=mysqli_query($con,$query);
       if($res == TRUE){
         echo '<script> alert("Do YOU WANT TO UPDATE DATA!!");  window.location.assign("home.php")</script>';
          
      }    
          else {
              echo "not ok";
          }
      }
      ?> 

  
  <p class="text-center text-muted">
    <a href="#" target="_blank">Abdullah Mamun</a>
  </p>
  
  <p class="text-center">
    by <a href="#" target="_blank">Skynet Chowmuhani</a>
  </p>
  
</div>





</body>

</html>