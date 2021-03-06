<!---------------------thankyou.html-------------------------
--
#Original Author:Patraic Kelly                                   
#Date Created: 4/19/20                                                                                
#Date Last Modified: 2/12/21
#Modified by: PK               
#Modification log: Moved user management functionality userDB.php  
-                  mod functionalities to modDB.php
-                                                    
 --
----------------------------------------------------->
<?php

$userName = filter_input(INPUT_POST, 'firstname');
$userLast = filter_input(INPUT_POST, 'lastname');
$userEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$userMessage = filter_input(INPUT_POST, 'message');

if ($userName == NULL || $userEmail == NULL || $userMessage == NULL) {
    $error = "Invalid input data. Please check that you have filled all fields.";
    echo "form data error: " . $error;                                              // TODO Connect ERROR page
    exit();
}   else {
    require_once('model/database.php');
    require_once('model/userDB.php');
    
    addUser($userName, $userLast, $userEmail, $userMessage);    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Patraic's Personal Portfolio" />
    <meta name="author" content="Patraic Kelly" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Patraic Kelly personal Portfolio</title>
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="img/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="img/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="img/favicon-16x16.png"
    />
    <link rel="manifest" href="img/site.webmanifest" />
    <link
      href="https://fonts.googleapis.com/css2?family=Gentium+Basic:ital,wght@1,700&display=swap"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Sticky navbar -->
    <header class="header sticky-top">
      <nav class="navbar navbar-expand-sm navbar-dark py-1 shadow-sm">
        <div class="container-fluid m-0">
          <a class="navbar-brand px-2 m-0" href="#">
            <strong class="h1 mb-0 m-0 font-weight-bold"
              >Patraic Kelly</strong
            ></a
          >
          <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mx-1 active">
                <a class="nav-link px-4" href="index.html">Home</a>
              </li>
              <li class="nav-item mx-1 active">
                <a class="nav-link px-4" href="skills.html">Skills</a>
              </li>
              <li class="nav-item mx-1 active">
                <a class="nav-link px-4" href="examples.html">Examples</a>
              </li>
              <li class="nav-item mx-1 active">
                <a class="nav-link px-4" href="contact.html">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <!-- Landing Section -->
      <section class="header err text-center">
        <div class="container py-5">
          <h2 class="mb-4 mx-0 font-weight-bold">
              Thanks for contacting me, <?PHP echo $userName; ?> <br> I'll get back to you as soon as possible!
          </h2>
          <hr class="landHr" />
          <div class="row">
            <div class="col-sm-4 px-0"></div>
            <div class="col-sm-4 px-0">
              <h3 class="mx-0 mt-4 display-5 font-weight-bold mb-1">
                Return to <a id="errHome" href="index.html">Home</a>
              </h3>
              <hr class="landHr" />
            </div>
            <div class="col-sm-4 px-0"></div>
          </div>
        </div>
      </section>
    </main>
    <footer class="container-fluid bg-grey pt-5">
      <div class="container">
        <div class="row px-4">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="logo-part">
                  <img src="img/pk.png" class="logo-footer" width="42" height="42" alt="logo">
                  <p><a class="font-weight-bold" href="mailto:Patraickelly@my.cwi.edu">Patraickelly@my.cwi.edu</a></p>
                </div>
              </div>
              <div class="col-md-6">
                        <h6>Sitemap</h6>
                        <div class="row">

                            <div class="col-md-6">
                              <ul>
                                  <li> <a href="index.html"> Home</a> </li>
                                  <li> <a href="skills.html"> Skills</a> </li>
                                  <li> <a href="examples.html"> Examples</a> </li>  
                                  <li> <a href="contact.html"> Contact</a> </li>
                                  
                               </ul>
                          </div>
                       </div>                  
              </div>
            </div>
          </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                    <a href="login.php" class="btn-footer"> Admin Login</a>
                    </div>
                    <div class="col-md-6 ">
                       <div class="social px-1">
                          <a href="www.linkedin.com/in/patraic-kelly"><img src="img/linkedin.png" alt="Linkedin" title="My Linkedin" height="24" width="24"></a>
                          <a href="Patraic-Kelly/Patraic-Kelly-CWISWDV.github.io"><img src="img/github.png" alt="Github" title="My Github" height="24" width="24"></a>
                          <a href="https://codesandbox.io/u/Patraic-Kelly"><img src="img/codesandbox.png" alt="Codesandbox" title="My Codesandbox" height="24" width="24"></a>
                       </div>
                       <br><br>
                       <div>Icons made by <br>
                         <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                         <a href="https://icon-icons.com/pack/Coreui-Brands/2389" title="CoreUI">CoreUI</a> from <a href="https://www.iconicons.com/" title="IconIcons">www.iconicons.com</a></div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
      </footer>
  </body>
</html>
