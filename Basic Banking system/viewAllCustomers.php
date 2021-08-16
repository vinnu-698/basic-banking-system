 
 <?php 
  session_start();
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>View All Customers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/customers.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style >
    
  </style>
</head>
<body>
  <form >
  
	<nav>
		<input type="checkbox" id="check">
		<label for="check" class="checkbtn">
		<i class="fas fa-bars"></i>
	</label>
	<label class="logo">BANKING SYSTEM</label>
	 	<ul>
	 		 <div class="menu">
        <li> <a href="homepage.php" class="active1" >HOME</a></li>
        <li ><a href=""class="active"> View All Customers</a></li>
   </div>
    </ul>
  </nav>
  <form action="" method="POST">
 	<div>
 	<table  border="2px" style=" line-height: 50px;" ;>
 		<tr>
 		<th colspan="8"><h3>Customers Details</h3></th>
 	</tr>
 	  <t>
      <th>Id</th>
      <th>AC No</th>
 		<th>Name</th>
 		
 		<th>IFSC Code</th>
      <th>Phone No</th>
 		<th>Info</th>
   
     	    </t>
     	    
                 	  	
 	<?php 
       include "dbconnection.php"; 
          
          
          $sqlii="SELECT * from customer order by id
           ";
        	$result=mysqli_query($conn,$sqlii); 
          $count=mysqli_num_rows($result);
                   while($rows= mysqli_fetch_assoc($result)){
                   	?><div>

                   	  <tr >
                         <td> <?php  echo $rows['id']; ?></td>
                          <td> <?php  echo $rows['accountnumber']; ?></td>
                           <td> <?php  echo $rows['Name']; ?></td>
                        
                           <td> <?php  echo $rows['ifsc']; ?></td>
                            <td> <?php  echo $rows['Phone Number']; ?> </td>
                         
                             <td>  <a href="customerdetails.php?id=<?=$rows['id'] ?>" >View</a> </td> 
                   	  </tr>
                   
                   </div>
                    <?php 
                   } 
                           
 	 ?></a>

 	</table>

 	</div>
  
 </form>
 </body>
</html>


     
</form>
</body>
</html>