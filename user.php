<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank- User Account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/alert.css">
</head>
<body>
<?php
     include 'components/dbconnect.php';
    include 'components/header.php'
    ?>
  <?php
  if(isset($_GET['success']) &&  $_GET['success']=='true'){
    echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';"> &times;</span>
    Transaction successful!
  </div>';
  }
  if(isset($_GET['success']) &&  $_GET['success']=='false'){
    echo '<div class="alert-failed">
    <span class="closebtn " onclick="this.parentElement.style.display=\'none\';"> &times;</span>
    Transaction Failed! Please Select a valid account.
  </div>';
  }
  
  ?>
    <div class="container">
    <div class="card">
    <?php
if(isset($_GET['acc'])){
  $acc=$_GET['acc'];
  $sql="Select * from users where acc='$acc' ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  echo ' <h5 class="card-header">'.$row['name'].' </h5>
  <div class="card-body">
    <p class="card-title">Balance (₹) :'.$row['balance'].'  </p>
    <p class="card-text">Account No : '.$row['acc'].' </p>
    <p class="card-text">Email : '.$row['email'].' </p>';
}

?>
 
    <br>
    <hr>
    <br>
    <form action="transaction.php" method="post">
    <div class="form-block">
    <label for="name" class="form-label">Transfer To: </label>
    <select class="select" name="receiver_acc" id="receiver_acc" required>
  <option value="0">Select</option>
  <?php
    $sql2="Select * from users where acc!='$acc' ";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
      echo ' <option value="'.$row2['acc'].'">Name : '. $row2['name'] .' || A/C No: '. $row2['acc'] .'</option>';

    }
   
  
  ?>
  </select>
  </div>
  <div class="form-block" style="display : none;">
<label for="sender">Sender :</label>
    <input  name="sender_acc" id="acc" value=<?php echo $acc ;?>>
</div>

<div class="form-block">
<label for="amount">Amount (₹)  :</label>
    <input type="number" name="amount" id="amount" value="1000">
</div>


<br>
<div class="form-block">
  <button type="submit"><center>Transfer</center>   </button>
</div>
    </form>
  </div>
</div>
    </div>

<?php
    include 'components/footer.php'
    ?>
</body>
</html>