<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Sign up</title>
      <link rel="stylesheet" href="css/signup.css">
  </head>
  
  <body>
   

    <div class="container">

      <div class="header">
        <h3>Create An Account</h3>
        <p>Please fill out all fields below</p>
      </div>

      <form method="POST" action="core/validateUsers.php?page=signup" class="signup-form">

        <div class="form-input">
          <input type="text" name="firstname" placeholder="First Name" class="md-input">
        </div>

        <div class="form-input">
          <input type="text" name="lastname" placeholder="Last Name" class="md-input">
        </div>

        <div class="form-input">
          <select name="gender" class="md-select">
            <option value="Female">Female</option>
            <option value="Male">Male</option>
          </select>
        </div>

        <div class="form-input" >
          <input type="email" name="email-address" placeholder="Email Address" class="md-input">
        </div>
                    
        <div class="form-input">
          <input type="password" name="password" placeholder="Password" class="md-input">
        </div>

        <div class="form-input">
          <input type="password" name="retype_password" placeholder="Retype Password" class="md-input">
        </div> 

        <div  class="form-input agreement"> 
          <input type="checkbox" name="agreement" value="agreement" class="md-agree" > I Understand and agree with Corona <a href="#" >Terms & Conditions </a>
        <div>

        <div>
            <input  type="submit" name="submit" value="Create Account" class="btn-login">
        </div>

       

      </form>
    </div>
  </body>
</html>
