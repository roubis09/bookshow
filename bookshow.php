<?php
  include 'db/connection.php';
  if(isset($_POST['Submit'])){
    $book_stid=$mysqli->real_escape_string($_POST['book_stid']);
    $sl = "SELECT * FROM book  WHERE serial_inp='$book_stid'";
   $result = $mysqli->query($sl);
   if($result->num_rows >0){
     $row = $result->fetch_assoc();
   }else{

   }
}
if(isset($_GET['id'])){
  $id=$_GET['id'];
  echo $id;
  $sql="DELETE FROM book WHERE id='$id'";
  if($mysqli->query($sql)){
    header('location:bookshow.php');
    // location.reload();
    // header("Refresh:0");
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bookshow1.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Book Show</title>
  </head>
  <body>
    <div class="container col-lg-6">
    <form action=""method="POST">
    <h1> SERIAL NUMBER:
    <input type='text' required class="form-control"  name="book_stid" /></h1>
    <button name="Submit" class="btn btn-primary" style="font-size: 16px;">Submit</button>

    </form>
<?php

if(isset($row['id'])){
?>
<h1>BOOK NAME:
<input type="text" name="" value="<?php echo $row['book_name'];?>">
AUTHOR:
<input type="text" name="" value="<?php echo $row['author'];?>">
<h1>COST PRICE:
<input type="text" name="" value="<?php echo $row['cost_price'];?>"></h1>
<h1>PUBLICATION:
<input type="text" name="" value="<?php echo $row['publication'];?>"></h1>
<h1>SELLING PRICE:
<input type="text" name="" value="<?php echo $row['selling_price']; ?>"></h1>
<h1>PROFIT:
<input type="text" name="" value="<?php echo $row['profit']; ?>"></h1>
<button name="submit" value="submit" class="btn btn-primary"  style="font-size: 16px;" onclick="del(<?php echo $row['id']; ?>);">Delete</button>
<?php
}
if (isset($_POST['submit'])){
  echo "DELETED SUCCESSFULLY...";
}
 ?>
</div>
 <script type="text/javascript">
  <?php
  if (isset($_POST['submit'])){
    echo "DELETED SUCCESSFULLY...";
  }
   ?>
    function del(id) {
      location.href="bookshow.php?id="+id;
    }
  </script>
  </body>
</html>
