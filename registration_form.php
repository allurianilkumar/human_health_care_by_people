<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Human Health Care Help By People-Registration Form</title>
    <!-- Lib Files -->
    <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.6.min.css">
    <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-theme-3.3.6.min.css">
    
    <!-- Custome CSS Files -->
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/registration_form.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/login.css">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
  </head>
  <body>
  <?php require 'nav_bar.php'; ?>
  <section class="registration-section">
  <div class="registration_form">
  <div class="row">
    <h2>Registration Form</h2>
    <div class="col-md-6"><hr>
      <form class="form-horizontal" id="registration_form" action="./index.php" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">User</label>
          <div class="col-sm-10">
            <input type="text" name="user_name" class="form-control" placeholder="User Name">
          </div>
        </div>
          <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Mobile</label>
          <div class="col-sm-10">
            <input type="textbox" name="mobile" class="form-control" placeholder="Mobile Number">
          </div>
        </div>
           
        <div class="form-group">
          <label for="passport" class="col-sm-2 control-label">Passport</label>
          <div class="col-sm-10">
            <input type="textbox" name="passport" class="form-control" placeholder="Passport Number">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password"class="form-control" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputRepassword3"  class="col-sm-2 control-label">Repassword</label>
          <div class="col-sm-10">
            <input type="password" name="repassword" class="form-control" placeholder="Repassword">
          </div>
        </div>
        <div class="form-group">
          <label for="inputRepassword3" class="col-sm-2 control-label">User Type</label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
              <input type="radio" name="user_type" value="Patient" checked>
              Patient
            </label>
            </div>
          </div>
          <label for="inputRepassword3" class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
              <input type="radio" name="user_type" value="Doctor">
          Doctor
            </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="user_registration_submit" class="btn btn-success" value="Register">
            <input type="reset" name="register_cancel" class="btn btn-default" value="Cancel">
          </div>
        </div>
      </form><hr>
    </div>
    </div>
  </div>
  </section>
  <?php require 'footer.php'; ?>
    <script src="./lib/js/jquery-1.11.3.min.js"></script>
    <script src="./lib/js/formValidation.min.js"></script>
    <script src="./lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="./lib/js/form_validation_bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#registration_form').formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    user_name: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The username is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The username must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'The username can only consist of alphabetical, number, dot and underscore'
                            }
                        }
                    },
                     mobile: {
                        validators: {
                            notEmpty: {},
                            digits: {},
                            phone: {
                                country: 'India'
                            }
                        }
                    },
                    passport: {
                        message: 'The passport is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The passport is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The passport must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'The passports can only consist of alphabetical, number, dot and underscore'
                            }
                        }
                    },
                     email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and can\'t be empty'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required and can\'t be empty'
                            }
                        }
                    },
                    repassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required and can\'t be empty'
                            }
                        }
                    },
                    user_type: {
                        validators: {
                            notEmpty: {
                                message: 'You have to mention the user_type'
                            }
                        }
                    },
                }
            });   
        });
    </script>
  </body>
</html>

