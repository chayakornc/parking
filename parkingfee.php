<?php
include 'connect.php';

$license = $_POST['license'];
$sql = "SELECT * FROM parking_info WHERE license_plate = '$license'";
$stmt = $pdo->query($sql);
$row = $stmt->fetch();
if(!$row){
  die('ไม่มีข้อมูล');
}
// print_r($row);
// die;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/style.css" rel="stylesheet">
  </head>
  <body background="img/background.png">
    <div>
        <div class="container">

<!--           <form class="form-license-fee" method="post" action="search_action.php">
            <h1 class="form-license-heading">ค่าที่จอดรถ</h1>
            <h2 class="form-license-heading">หมายเลขทะเบียนรถ</h2>
            <h2 class="form-license-heading">หมวดจังหวัด</h2>
      			<h2 class="form-license-heading">วันเวลาที่เข้า</h2>
      			<h2 class="form-license-heading">วันเวลาที่ออก</h2>
      			<h2 class="form-license-heading">จำนวนชั่วโมงที่จอด</h2><h2>บาท</h2>
      			<h2 class="form-license-heading">จำนวนเงินค่าจอด</h2><h2>ชั่วโมง</h2>
      			<h1 class="form-license-heading">รับเงิน</h1>
            <input type="text" id="inputEmail" class="form-control" placeholder="" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">คำนวณเงินทอน</button>
          </form> -->
          <div class="content">
            <h1 style="text-align: center;">ค่าที่จอดรถ</h1>
            <table class="table">
              <tr>
                  <td>หมายเลขทะเบียนรถ</td><td><?php echo $row['license_plate']?></td>
              </tr>
              <tr>
                  <td>หมวดจังหวัด</td><td><?php echo $row['provice']?></td>
              </tr>
              <tr>
                <td>วันเวลาที่เข้า</td><td></td>
              </tr>
              <tr>
                <td>วันเวลาที่ออก</td><td></td>
              </tr>
              <tr>
                <td>จำนวนชั่วโมงที่จอด</td><td></td>
              </tr>
              <tr>
                  <td>จำนวนเงินค่าจอด</td><td></td>
              </tr>

            </table>

            <form class="form-license" method="post" action="parkingfee.php">
              <h2 class="form-license-heading" style="text-align: center;">รับเงิน</h2>
              <input type="text" id="recive" name="recive" class="form-control" placeholder="" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">คำนวนเงินทอน</button>
            </form>
          </div>

        </div> <!-- /container -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>