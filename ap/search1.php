<?php
$con = mysqli_connect('localhost','root','','ip');
$search = $_POST['search'];
$sql="SELECT * FROM ipinf WHERE ip LIKE '%$search%' OR reseller LIKE '%$search%' OR device LIKE '%$search%' OR epsw LIKE '%$search%' OR location LIKE '%$search%'";
$res=$con->query($sql);
$cou=$res->num_rows;
//echo "$cou";
?>

<table class="table-bordered table-striped container success" id="employee_data">
    <thead>
      <tr>
          <td>ID</td>
          <td>IP Address</td>
          <td>Device Name</td>
          <td>EPON/Switch</td>
          <td>Switch IP/ONU Mac</td>
          <td>Port</td>
          <td>Reeseller</td>
          <td>Location</td>
          <td>note</td>
          
      </tr>
    </thead>
    
    
    <?php
if($cou>0){
    while($data=$res->fetch_assoc()){
                     echo "<tr>";
                     echo "<td>".$data['id']."</td>";
                     echo "<td>".$data['ip']."</td>";
                     echo "<td>".$data['device']."</td>";
                     echo "<td>".$data['epsw']."</td>";
                     echo "<td>".$data['sip']."</td>";
                     echo "<td>".$data['port']."</td>";
                     echo "<td>".$data['reseller']."</td>";
                     echo "<td>".$data['location']."</td>";
                     echo "<td>".$data['note']."</td>";
                        
        ?>    
        
    <?php                   
     echo "</tr>";
     echo "</table>";
       
     } 
 } 
   
else{
    echo "Data Not found";
}
?>