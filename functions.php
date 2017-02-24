<?php

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);

function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}

function calHourParking($start, $end){
    $datetime1 = strtotime($end);
    $datetime2 = strtotime($start);
    $interval = $datetime1 - $datetime2;

    $hour = ceil($interval/60/60);
    return $hour;
}

function calFee($hour){
    $fee = 0;

    for ($i = $hour; $i > 0; $i--) {
        if ($i > 4) {
            $fee += 10; 
            $hour -= 1;
        }
    }

    if ($hour >= 2 && $hour <= 4) {
        $fee += 20;
    }

    return $fee;
}

function calBank($money){
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
}