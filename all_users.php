<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank-All Users</title>
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
        <h1 class="container "><center>All Users Details</center></h1>

    <div class="container tb-block">
    <table class="table " id='myTable'>
  <thead>
    <tr>
      <th scope="col"> S.No</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Balance</th>
      <th scope="col">Account No</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

<?php
  
    $sql="Select * from users ";
    $result=mysqli_query($conn,$sql);
    $sn=1;
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr>
      <th scope='row'>". $sn . "</th>
      <td>". $row['name']."</td>
      <td>". $row['email']."</td>
      <td>". $row['balance']."</td>
      <td>". $row['acc']."</td>
      <td>  <a href='user.php?acc=".$row['acc'] ."'>Transact</a>  </td>
      </tr>";
      $sn++;
    } ;

  

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