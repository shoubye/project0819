<?php

//務必副檔名用.php
require_once("config.php");  //確保不會因為重覆引入相同的檔案

// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = 'root';
// $dbname = 'directory';

$link = mysqli_connect($dbhost ,$dbuser ,$dbpass ,$dbname ,8889);  //參照上面複製來的連線
//先測試看看
// var_dump($link);

$result = mysqli_query ( $link, "set names utf8" );
mysqli_select_db ( $link, $dbname );


$sqlCommand = 'select * from employee';  //先到資料庫run一遍(select * from employee)看可否過關

//先測試看看
// var_dump($result);

$commandText = <<<SqlQuery
select id, firstName, lastName, title, picture,
  (select count(*) from employee where managerId = e.id) as reportCount
  from employee e
SqlQuery;

$result = mysqli_query($link , $commandText); //透過連線獲得結果


// mysqli_close ( $link );

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" />
<link rel="stylesheet" href="styles.css" />
</head>
<body>
<div data-role="page" data-theme="c">

<div data-role="header">
	<h1>Employee Details</h1>
</div>

<div data-role="content">

<ul data-role="listview" data-filter="true">


    <!-- 用while($row = mysqli_fetch_assoc($result)一行一行的讀進來 -->
    <?php while($row = mysqli_fetch_assoc($result)){ ?>

		<li>
            <a href="employeeDetails.php?id= <?php echo $row ["id"] ?>"> 

                <img src="images/<?php echo $row ["picture"] ?>">
                <h4> <?php echo $row ["firstName"] ?> <?php echo $row ["lastName"] ?> </h4>
                <p><?php echo $row ["title"] ?> </p>
                <span class="ui-li-count"><?php echo $row ["reportCount"]?></span>

            </a>
		</li>

	<?php } ?>

</ul>  

<!--END UL -->
</div>

</div>
</body>
</html>