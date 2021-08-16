<?php 
  session_start();
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Fund Transfer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/transfer.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  
	<nav>
		
	<label class="logo">BANKING SYSTEM</label>
	<ul>
        <li><a href="viewAllCustomers.php"class="active1"> View All Customers</a></li>
       <li> <a class="active" >Amount :<?php echo $_SESSION['amount'] ; ?></a> </li>
    </ul>
  </nav>
  <form action="transferMoney.php" method="POST">
  <div class="moneyTransfer">
  	<h4>Fund Transfer</h4>
  	<label>To Account No :</label>
  	<input type="text" name="accountNumber"required="";>
  	<label>IFSC Code :</label>
  	<input type="text" name="ifscCode" required="";>
  		<label>Amount :</label>
  	<input type="text" name="amount" required="";>
  	<label>Password:</label>
  	<input type="password" name="pin" required="";>
  	<input type="submit" name="send" value="Send" >

  </div>
</form>
      <?php 
   
   include "dbconnection.php"; 
          if(isset($_POST['send']))
          { 
          	   $fromAccountNumber=$_SESSION['accountNumber']; 
             $_toAccountNumber=$_POST['accountNumber'];
             $_ifscCode=$_POST['ifscCode'];
             $pin= $_SESSION['pin'] ; 
              $_amount=$_POST['amount'];
               $_password=$_POST['pin'];

                if($pin==$_password){

               $accountNumber_search="select * from customer where accountNumber=$_toAccountNumber";
             $result=mysqli_query($conn,$accountNumber_search);
              $accountNumbercount=mysqli_num_rows($result);
        if($accountNumbercount)
        {
               $sqli="insert into Transfers(fromAccount,toAccount,ifsc,amount) values(' $fromAccountNumber' ,' $_toAccountNumber',' $_ifscCode','$_amount')";
      $result=mysqli_query($conn,$sqli);
    if ($result){
                  ?>
             <script>
             	alert(".........  Transaction Successfull  ........");
              location.replace("viewAllCustomers.php");
             </script>
             <?php   
             } 
         }
              else{
                  ?>
             <script>
              alert("Fnter valid accountNumber....");
             </script>
             <?php
                   
                 } 
             } else{
                  ?>
             <script>
              alert("incorrect Pin........");
             </script>
             <?php
                   
                 } 

        }
       
         ?>  
        
</body>
</html>