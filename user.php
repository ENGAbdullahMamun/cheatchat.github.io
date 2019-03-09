<?php
$con = mysqli_connect('localhost','root','','ip');

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
   echo " ";
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

<body>
    
        
    
  <div class="container" ng-app="sortApp" ng-controller="mainController">
  
   <div class="alert alert-success col-md-11 px-2">
      <p>Please Use --IP Address & Reseller Name-- For Searching.... </p>
  </div><a class="btn btn-danger col-md-1" href="logout.php">LogOut</a>
  <form action="search1.php" method="POST">
    <div class="form-group col-md-12">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-search"></i></div>
        <input type="text" class="form-control" id="search" name="search" placeholder="Search By IP & Reseller Name">
      </div>      
      </div></form>

  <table class="table-bordered table-striped container success" id="employee_data">
    <thead>
      <tr>
          <td>#</td>
          <td>IP Address</td>
          <td>Device Name</td>
          <td>EPON/Switch</td>
          <td>Switch IP/ONU Mac</td>
          <td>Port</td>
          <td>Reseller</td>
          <td>Location</td>
          <td>Note</td>
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
                           echo "<td>".$funtime['id']."</td>";
                            echo "<td>".$funtime['ip']."</td>";
                            echo "<td>".$funtime['device']."</td>";
                           echo " <td>".$funtime['epsw']."</td>";
                           echo " <td>".$funtime['sip']."</td>";
                            echo " <td>".$funtime['port']."</td>";
                           echo " <td>".$funtime['reseller']."</td>";
                           echo " <td>".$funtime['location']."</td>";
                           echo " <td>".$funtime['note']."</td>";
            ?>
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