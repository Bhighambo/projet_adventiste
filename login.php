<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login</title>
  <!-- loader-->
  <link href="login/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="login/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="login/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="login/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="login/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="login/assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
    <div class="card card-authentication1 mx-auto my-5 bg-dark">
        <div class="card-body">
         <div class="card-content p-2">
            <div class="text-center" style="background-color: white">
                <img src="assets/img/logos.jpg" alt="logo icon">
            </div>
          <div class="card-title text-uppercase text-center py-3"></div>
           <?php if(!empty($_GET["messages"])==1): ?>
                    <div class="alert alert-danger" style="padding: 10px; font-size: 16px; font-family: century gothic">Coplètez tous les champs</div>
                 <?php endif ?>
                 <?php if(!empty($_GET["message"])==1): ?>
                    <p class="alert alert-danger" style="padding: 10px; font-size: 16px; font-family: century gothic">Le nom ou/et mot de passe incorrect</p>
                 <?php endif ?>
            <form action="traitement.php" method="post">
              <div class="form-group">
              <label for="nom" class="sr-only">Nom</label>
               <div class="position-relative has-icon-right">
                  <input type="text" id="nom" class="form-control input-shadow" placeholder="Nom d'utilisateur" name="nom">
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
               </div>
              </div>
              <div class="form-group">
              <label for="pwd" class="sr-only">Mot de passe</label>
               <div class="position-relative has-icon-right">
                  <input type="password" id="pwd" class="form-control input-shadow" placeholder="Mot de passe" name="motdepasse">
                  <div class="form-control-position">
                      <i class="icon-lock"></i>
                  </div>
               </div>
              </div>
            <div class="form-row">
             <div class="form-group col-6 text-right">
              <a href="motdepasse.php">Mot de passe oublier?</a>
             </div>
            </div>
             <button type="submit" class="btn btn-success btn-block">Se connecter</button> 
             <div class="form-row mt-4">
              
            </div>
             
             </form>
           </div>
          </div>
          <div class="card-footer text-center py-3">
            <p class="text-warning mb-0"> Si vous n'avez pas un compte désolé!<a href="register.html"></a></p>
          </div>
         </div>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
        <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
    
    </div><!--wrapper-->
    
  <!-- Bootstrap core JavaScript-->
  <script src="login/assets/js/jquery.min.js"></script>
  <script src="login/assets/js/popper.min.js"></script>
  <script src="login/assets/js/bootstrap.min.js"></script>
    
  <!-- sidebar-menu js -->
  <script src="login/assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="login/assets/js/app-script.js"></script>
  
</body>
</html>
