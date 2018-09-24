<?php
require_once "config.php";

$validation_success = Session::get('validation_success') ? Session::get('validation_success') : null;
$validation_errors = Session::get('validation_errors') ? Session::get('validation_errors') : null;

Session::destroy();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>

    <div class="container">

      <h1>Kupovina putnog osiguranja</h1><br>
      <a href="listaj.php">Pogledaj sva osiguranja</a>

  </div>

    <div class="container mt-5">

          <div class="row">

              <div class="col-md-6" style="border:1px solid black;">

                  <form method="post" action="forma.php">

                    <?php showValidationSuccess($validation_success); ?>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nosilac osiguranja</label>
                      <input name="carrier_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Igor Nikolic">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Vrsta polise osiguranja</label>
                      <select name="type" class="form-control" id="exampleFormControlSelect1">
                        <option value="individual">Individualno</option>
                        <option value="group">Grupno</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput2">Telefon</label>
                      <input name="phone" type="text" class="form-control" id="exampleFormControlInput2" placeholder="0645558882">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput3">Email</label>
                      <input name="email" type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput4">Od:</label>
                      <input name="date_from" type="date" class="form-control" id="exampleFormControlInput4">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput5">Do:</label>
                      <input name="date_to" type="date" class="form-control" id="exampleFormControlInput5">
                    </div>
                    <?php showValidationError($validation_errors); ?>

                    <button type="submit" class="btn btn-primary">Posalji</button>

              </div>

              <div class="col-md-6" style="border:1px solid black;">

                <h2>Ljudi koje zelite da osigurate na Vase ime:</h2>

                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput6">Ime:</label>
                        <input name="group[]" type="text" class="form-control" id="exampleFormControlInput6" placeholder="Igor">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput7">Prezime:</label>
                        <input name="group[]" type="text" class="form-control" id="exampleFormControlInput7" placeholder="Nikolic">
                      </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput8">E-mail:</label>
                        <input name="group[]" type="email" class="form-control" id="exampleFormControlInput8" placeholder="Igor Nikolic">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput9">Datum rodjenja:</label>
                        <input name="group[]" type="date" class="form-control" id="exampleFormControlInput9" value="06/01/1995">
                      </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput6">Ime:</label>
                        <input name="group[]" type="text" class="form-control" id="exampleFormControlInput6" placeholder="Igor">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput7">Prezime:</label>
                        <input name="group[]" type="text" class="form-control" id="exampleFormControlInput7" placeholder="Nikolic">
                      </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput8">E-mail:</label>
                        <input name="group[]" type="email" class="form-control" id="exampleFormControlInput8" placeholder="Igor Nikolic">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput9">Datum rodjenja:</label>
                        <input name="group[]" type="date" class="form-control" id="exampleFormControlInput9">
                      </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput6">Ime:</label>
                        <input name="group[]" type="text" class="form-control" id="exampleFormControlInput6" placeholder="Igor">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput7">Prezime:</label>
                        <input name="group[]" type="text" class="form-control" id="exampleFormControlInput7" placeholder="Nikolic">
                      </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput8">E-mail:</label>
                        <input name="group[]" type="email" class="form-control" id="exampleFormControlInput8" placeholder="Igor Nikolic">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput9">Datum rodjenja:</label>
                        <input name="group[]" type="date" class="form-control" id="exampleFormControlInput9">
                      </div>
                    </div>

                </div>

              </div>


            </form>
        </div>

    </div>




  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
