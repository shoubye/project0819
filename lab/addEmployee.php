<?php

if(isset($_POST["okButton"])){
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $cityId = $_POST["cityId"];
  $sql = <<<multi
  insert into employee (firstName, lastName, cityid) 
  values ('$firstName', '$lastName', $cityId)
  multi;
// echo $sql;

  require("connDB.php");
  mysqli_query($link, $sql);
  header("location: index.php");
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
<!-- post -->
<form method="post">
      <div class="form-group row">
          <label for="text" class="col-4 col-form-label">firstName</label> 
              <div class="col-8">
                <input id="text" name="firstName" type="text" class="form-control">
              </div>
      </div>


      <div class="form-group row">
          <label for="text1" class="col-4 col-form-label">lastName</label> 
              <div class="col-8">
                <input id="test1" name="lastName" type="text" class="form-control">
              </div>
      </div>


      <div class="form-group row">
          <label class="col-4">city</label> 
              <div class="col-8">
                  <div class="custom-control custom-radio custom-control-inline">
                      <input name="cityId" id="radio_0" type="radio" class="custom-control-input" value="2"> 
                      <label for="radio_0" class="custom-control-label">Taipei</label>
                  </div>


            <div class="custom-control custom-radio custom-control-inline">
                <input name="cityId" id="radio_1" type="radio" class="custom-control-input" value="4"> 
                <label for="radio_1" class="custom-control-label">Taichung</label>
            </div>


            <div class="custom-control custom-radio custom-control-inline">
                <input name="cityId" id="radio_2" type="radio" class="custom-control-input" value="6"> 
                <label for="radio_2" class="custom-control-label">Tainan</label>
            </div>


          </div>
      </div> 

      <div class="form-group row">
          <div class="offset-4 col-8">
             <button name="okButton" value= "OK" type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
</form>

    </tbody>
  </table>
</div>

</body>
</html>