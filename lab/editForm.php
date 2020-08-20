<?php
if (isset($_POST["cancelButton"])) {
  header("location: index.php");
  exit();
}
if (!isset($_GET["id"])) {
    die("id not found.");
}
$id = $_GET["id"];
if (! is_numeric ( $id ))   
    die ( "id not a number." );

//echo $sql;
require("connDB.php");
if (isset($_POST["okButton"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $cityId = $_POST["cityId"];
  $sql = <<<multi
    update employee set 
       firstName = '$firstName', lastName='$lastName', cityId = $cityId
    where employeeId = $id
  multi;
  mysqli_query($link, $sql);
  header("location: index.php");
  exit();
}
else {
  $sql = <<<multi
    select * from employee where employeeId = $id
  multi;
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result);
}

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form>
      <div class="form-group row">
          <label for="text" class="col-4 col-form-label">firstName</label> 
              <div class="col-8">
                <input id="text" name="text" value = <?php echo $row["firstName"]?> type="text" class="form-control">
              </div>
      </div>


      <div class="form-group row">
          <label for="text1" class="col-4 col-form-label">lastName</label> 
              <div class="col-8">
                <input id="text1" name="text1" value = <?php echo $row["lastName"]?> type="text" class="form-control">
              </div>
      </div>


      <div class="form-group row">
          <label class="col-4">city</label> 
              <div class="col-8">
                  <div class="custom-control custom-radio custom-control-inline">
                      <input name="radio" id="radio_0" type="radio" class="custom-control-input" value="2"> 
                      <?=  ($row["cityId"] == 2) ? "checked" :  "" ?>
                      <label for="radio_0" class="custom-control-label">Taipei</label>
                      
                  </div>


            <div class="custom-control custom-radio custom-control-inline">
                <input name="radio" id="radio_1" type="radio" class="custom-control-input" value="4"> 
                <?=  ($row["cityId"] == 4) ? "checked" :  "" ?>
                <label for="radio_1" class="custom-control-label">Taichung</label>
               
            </div>


            <div class="custom-control custom-radio custom-control-inline">
                <input name="radio" id="radio_2" type="radio" class="custom-control-input" value="6"> 
                <?=  ($row["cityId"] == 6) ? "checked" :  "" ?>
                <label for="radio_2" class="custom-control-label">Tainan</label>
              
            </div>


          </div>
      </div> 

      <div class="form-group row">
          <div class="offset-4 col-8">
             <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
</form>

    </tbody>
  </table>
</div>

</body>
</html>