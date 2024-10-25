
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js%22%3E"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../Style/stylesheet.css">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="sub_container">
        <div class="form_header"><h2>Login</h2></div>
          <div class="form_body">
            <form action="login.php" method="post">
              <div class="form-group">
                <label for="usernameemail">Username or Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usernameemail">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <br>
              <div class="buttons">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <button type="button" onclick="location.href='Signup.php';" class="btn btn-primary">Create Account</button>
              </div>
        <div class="forgot-password"><a href="reset/resetpassword.php">Forgot password?</a></div>
            </form>
      
          </div>    
        </div>
    </div>
              
<div>   

</div>

  </body>
</html>