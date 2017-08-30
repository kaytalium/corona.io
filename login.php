<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
  <meta charset="UTF-8">


  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/login.css">
  
  <!-- javascript links and scripts -->
  <script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>

  <title>Corona: Simple php session control site</title>
</head>

<body>
    <div class="page-wrapper">
        <div class="login-content">
            <div class="login-content-box floatlft">
                <div class="login-controls">
                    <div class="login-header">
                        <h1>Corona.io</h1>
                        <span class='subtitle'>
                            A simple php session access login site
                        </span>
                    </div>

                    <div class="login-body">
                        <form action="core/validateUsers.php?page=login" method="POST" id="loginFrm">
                            <div class="frmControl">
                                <input type="text" name="usrnme" placeholder="Username or Email" id="usr" required onBlur="if(this.value=='') this.value = 'Username or Email'" onFocus="if(this.value == 'Username or Email') this.value =''">
                            </div>

                            <div class="frmControl">
                                <input type="password" name="pswrd" placeholder="Password" id="pswrd" required>
                            </div>

                            <div class="frmControl">
                                <button id="logBtn">login</button>
                            </div>

                            <div class="forgetPswrd">
                             <a href="#">Forget Password</a>
                            </div>

                            <div class="forgetPswrd">
                            <a href="#">
                            <?php echo $_SESSION['errors']; ?>
                            </a>
                            </div>
                        </form>
                        
                    </div>

                    <div class="login-footer">
                        Design & Developed by Humans
                        
                    </div>
                </div>
            </div>

            <div class="login-content-box ">
                <div class="poster">
                      
                </div>          
            </div>

        </div>
    
    </div>  
    <script src="js/login.js"></script>
</body>

</html>