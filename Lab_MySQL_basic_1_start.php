<?php
header("content-type:text/html; charset=utf-8");

// 0. 請先建立 Class 資料庫 （SetupDB/setup_class.txt）



//@---->暫時停用錯誤訊息,die----->結束程式



// 1. 連接資料庫伺服器
$link = @mysqli_connect("localhost", "root", "root", null, 8889) or die(mysqli_connect_error());
$result = mysqli_query($link, "set names utf8");   //切換
// var_dump($link);


// 2. 執行 SQL 敘述
$commandText = "select * from students";
$result = mysqli_query($link, $commandText);
// echo $result->num_rows;                        //$result為obj所以用->

// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_assoc($result);
// var_dump($row);


// 3. 處理查詢結果
//資料一筆一筆的提出來共10筆
//mysqli_fetch_assoc()取一行
while ($row = mysqli_fetch_assoc($result))
{
  echo "ID：{$row['cID']}  <br>";
  echo "Name：{$row['cName']}  <br>"; 
  echo "<HR>";      //分隔線
}

// 4. 結束連線
mysqli_close($link);     //要養成好習慣

echo "<br />-- Done --";
?>
