<?php
include 'connect.php';
include 'functions.php';

$recive = $_POST['recive'];
$license = $_POST['license'];

$sql = "SELECT * FROM parking_info WHERE license_plate = '{$license}'";
$stmt = $pdo->query($sql);
$row = $stmt->fetch();

$hour = calHourParking($row['timetim'], $row['timeout']);
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
  <body>
    <div>
        <div class="container">

<!--           <form class="form-license-fee">
            <h1 class="form-license-heading">ทอนเงินค่าจอดรถ</h1>
            <h2 class="form-license-heading">หมายเลขทะเบียนรถ</h2>
            <h2 class="form-license-heading">หมวดจังหวัด</h2>
      			<h2 class="form-license-heading">จำนวนชั่วโมงที่จอด</h2><h2>ชั่วโมง</h2>
      			<h2 class="form-license-heading">จำนวนเงินค่าจอด</h2><h2>บาท</h2>
      			<h2 class="form-license-heading">จำนวนเงินที่รับ</h2><h2>บาท</h2>
      			<h2 class="form-license-heading">จำนวนเงินที่ทอน</h2><h2>บาท</h2>
      			<h1 class="form-license-heading">จำนวนธนบัตรที่ต้องทอนเงิน</h1>
      			<h2 class="form-license-heading">500.00 บาท จำนวน </h2><h2>ฉบับ</h2>
      			<h2 class="form-license-heading">100.00 บาท จำนวน </h2><h2>ฉบับ</h2>
      			<h2 class="form-license-heading">50.00 บาท จำนวน </h2><h2>ฉบับ</h2>
      			<h2 class="form-license-heading">20.00 บาท จำนวน </h2><h2>ฉบับ</h2>
      			<h2 class="form-license-heading">10.00 บาท จำนวน </h2><h2>ฉบับ</h2>
            <input type="text" id="inputEmail" class="form-control" placeholder="" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">คำนวณเงินทอน</button>
          </form> -->

          <div class="content">
            <h1 style="text-align: center;">ทอนเงินค่าจอดรถ</h1>
            <table class="table">
              <tr>
                  <td>หมายเลขทะเบียนรถ</td><td><?php echo $row['license_plate']?></td>
              </tr>
              <tr>
                  <td>หมวดจังหวัด</td><td><?php echo $row['provice']?></td>
              </tr>
              <tr>
                <td>วันเวลาที่เข้า</td><td><?php echo thai_date(strtotime($row['timetim']))?></td>
              </tr>
              <tr>
                <td>วันเวลาที่ออก</td><td><?php echo thai_date(strtotime($row['timeout']))?></td>
              </tr>
              <tr>
                <td>จำนวนชั่วโมงที่จอด</td><td><?php echo  $hour . ' ชั่วโมง';?></td>
              </tr>
              <tr>
                  <td>จำนวนเงินค่าจอด</td><td><?php echo number_format($row['fee'],2) . ' บาท'; ?></td>
              </tr>
              <tr>
                  <td>จำนวนเงินที่รับ</td><td><?php echo number_format($recive, 2) . ' บาท'; ?></td>
              </tr>

              <tr>
                <td colspan="2" class="text-align:right;">
                  <?php
                  $money = $recive;
                  if($money>=500){
      $sum2=$money/500;
      $sum2s=floor($sum2)*500;
      $money=$money-$sum2s;
        echo " 500.00 บาท จำนวน ".floor($sum2)." ฉบับ"."<br>";
        }else  {
    echo " 500.00 บาท จำนวน  0 ฉบับ"."<br>";
  }if($money>=100){
      $sum3=$money/100;
      $sum3s=floor($sum3)*100;
      $money=$money-$sum3s;
      echo " 100.00 บาท จำนวน ".floor($sum3)." ฉบับ"."<br>";
      }else  {
          echo " 100.00 บาท จำนวน  0 ฉบับ"."<br>";
  }if($money>=50){
      $sum4=$money/50;
      $sum4s=floor($sum4)*50;
      $money=$money-$sum4s;
      echo " 50.00 บาท จำนวน  ".floor($sum4)." ฉบับ"."<br>";
  }else  {
          echo " 50.00 บาท จำนวน  0 ฉบับ"."<br>";
      
  }if($money>=20){
      $sum5=$money/20;
      $sum5s=floor($sum5)*20;
      $money=$money-$sum5s;
      echo " 20.00 บาท จำนวน ".floor($sum5)." ฉบับ"."<br>";
      }else  {
          echo " 20.00 บาท จำนวน  0 ฉบับ"."<br>";
  }if($money>=10){
      $sum51=$money/10;
      $sum51s=floor($sum51)*10;
      $money=$money-$sum51s;
      echo " 10.00 บาท จำนวน ".floor($sum51)." ฉบับ"."<br>";
      }else  {
          echo " 10.00 บาท จำนวน  0 ฉบับ"."<br>";
      }
                  ?>
                </td>
              </tr>

            </table>

          </div>

        </div> <!-- /container -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>