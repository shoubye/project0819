<?php


require("conndb.php");

$sqlStatement = <<<muiti
select employeeId, firstName, lastName, e.cityId ,cityName
    from city c join employee e on e.cityId = c.cityId;
muiti;


$result = mysqli_query ( $link, $sqlStatement);
// var_dump($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Striped Rows</h2>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>city</th>
            <td></td>
            <td class = "float-right"> <a href ="addemployee.php"  class = "btn btn-outline-info btn-sm">New</a> </td>
        </tr>
    </thead>


            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                    
                        <td> <?php echo $row["firstName"]?> </td>
                        <td> <?php echo $row["lastName"]?>  </td>
                        <td> <?php echo $row["cityName"]?>  </td>
                        <td></td>
                        <td class = "float-right">
                            <a href ="./editform.php?id=<?= $row["employeeId"] ?>"  class = "btn btn-outline-success btn-sm">Edit</a>
                            <a href ="./deleteemployee.php?id=<?= $row["employeeId"] ?>"  class = "btn btn-outline-danger btn-sm">Delete</a>
                        </td>

                     </tr>
                <?php } ?>
            </tbody>


  </table>
</div>

</body>
</html>

