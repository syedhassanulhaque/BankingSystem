<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History </title>
    <!-- Data Tables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/datatable.css">

</head>
<body>
<?php
    include 'components/dbconnect.php';
    include 'components/header.php';
    ?>

    <?php
    
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // echo var_dump($_POST);
    // exit;
    $amount=$_POST['amount'];
    $sender_acc=$_POST['sender_acc'];
    $receiver_acc=$_POST['receiver_acc'];
    $unique=  uniqid();
    $transactionid=$sender_acc ."".$unique."".$receiver_acc;

    if($_POST['receiver_acc']==0){
      header("Location: http://localhost/Banking%20System/user.php?acc=".$sender_acc."&success=false");
      exit;
      
  }

   $sql_transaction=" INSERT INTO `transactions` ( `sender_acc`, `receiver_acc`, `amount`, `transaction_id`, `time`) VALUES ( '$sender_acc', '$receiver_acc', '$amount', '$transactionid', current_timestamp())";
   $result=mysqli_query($conn,$sql_transaction);

//    echo $result;
//    exit;

//    Sender Data Update
    $sender_balance_query="select balance from users where acc='$sender_acc'";
    $result2=mysqli_query($conn,$sender_balance_query);
    // echo var_dump($result2);
    // exit;
    $row=mysqli_fetch_assoc($result2);
    $sender_balance=$row['balance'];
    if($sender_balance >= $amount){
        $total_balance=$sender_balance-$amount;
        $update_sender_query="UPDATE `users` SET `balance` = '$total_balance' WHERE `users`.`acc` = '$sender_acc'";
        $result3=mysqli_query($conn,$update_sender_query);
      
        // echo $result3;
        // exit;

    }


  
//Receiver Data Update
    $receiver_balance_query="select balance from users where acc='$receiver_acc'";
    $result3=mysqli_query($conn,$receiver_balance_query);
    $row2=mysqli_fetch_assoc($result3);
    $receiver_balance=$row2['balance'];
    $total_balance=$receiver_balance+$amount;
        $update_receiver_query="UPDATE `users` SET `balance` = '$total_balance' WHERE `users`.`acc` = '$receiver_acc'";
        $result4=mysqli_query($conn,$update_receiver_query);


  header("Location: http://localhost/Banking%20System/user.php?acc=".$sender_acc."&success=true");
 
exit;

}
    ?>
        <h1 class="container "><center>All Transaction History</center></h1>

    <div class="container tb-block">
    <table class="table " id='myTable'>
  <thead>
    <tr>
      <th scope="col"> S.No</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Balance (₹)</th>
      <th scope="col">Transaction Id</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

<?php
  
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $sql="Select * from transactions order by time desc ";
    $result=mysqli_query($conn,$sql);
//    echo var_dump($result);
//    exit;
    $sn=1;
    while ($row=mysqli_fetch_assoc($result)) {
        // echo var_dump($row);
        // exit;
        //Sender name extraction
        $sender_acc=$row['sender_acc'];
        $sql_in="select name from users where acc='$sender_acc'";
        $res=$conn->query($sql_in);
        $row_in=$res->fetch_assoc();
        $sendername=$row_in['name'];

         //Receiver name extraction
         $sender_acc=$row['receiver_acc'];
         $sql_in2="select name from users where acc='$sender_acc'";
         $res=$conn->query($sql_in2);
         $row_in2=$res->fetch_assoc();
         $receivername=$row_in2['name'];

        
      echo "<tr>
      <th >". $sn . "</th>
      <td>". $sendername."</td>
      <td>". $receivername."</td>
      <td> ₹ ". $row['amount']."</td>
      <td>". $row['transaction_id']."</td>
      <td>  ". $row['time']."</td>
      </tr>";
      $sn++;
    //   exit;
    } ;

}



?> 
    
  </tbody>
</table>

    </div>
<?php
    include 'components/footer.php'
    ?>
    
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script>
     $(document).ready( function () {
    $('#myTable').DataTable();
} )

   </script>

</body>
</html>