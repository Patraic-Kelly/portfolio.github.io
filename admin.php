<?php
/** User Database Functions
 * @author pkelly
 * @date 2/12/21
 * @log refactored code to call db through database.php
 *      moved functionality for user management to userDB.php
 *      moved mod functionality to modDB.php
 */


require_once('model/database.php');
require_once('model/userDB.php');
require_once('model/modDB.php');

require_once('util/secure_conn.php');
require_once('util/valid_admin.php');

$dsn = 'mysql:host=localhost;dbname=pkptfolio';
$username = 'pk_admin';
$password = 'Pa$$w0rd';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = 'list_users';
}

if ($action == 'list_users') {
    //read mod data by id
    $modID = filter_input(INPUT_GET, 'modID', FILTER_VALIDATE_INT);
    if ($modID == NULL || $modID == FALSE) {
        $modID = 1;
    }
    try {
        $mods = getMods();
        $users = getUserByModID($modID);
    } catch (PDOException $ex) {
        echo 'Error: ' . $ex->getMessage();
    }
} else if ($action == 'delete_user') {
    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
    try {
        delUser($userID);

        header("Location: admin.php");
    } catch (PDOException $ex) {
        echo 'Delete Error: ' . $ex->getMessage();
    }
}
?>
<!---------------------admin.php-------------------------
--
#Original Author:Patraic Kelly                                   
#Date Created: 4/19/20                                                                                
#Date Last Modified: 1/22/21
#Modified by: PK               
#Modification log: build form for use with sql.                                    
 --
----------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Patraic's Personal Portfolio" />
        <meta name="author" content="Patraic Kelly" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Patraic Kelly personal Portfolio</title>
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">
        <link
            href="https://fonts.googleapis.com/css2?family=Gentium+Basic:ital,wght@1,700&display=swap"
            rel="stylesheet"
            />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            />
        <script src="form.js"></script>
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
                <div class="container-fluid m-0 ">
                    <a class="navbar-brand px-2 m-0" href="#">
                        <strong class="h1 mb-0 m-0 font-weight-bold"
                                >Patraic Kelly</strong></a>
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
            <section class="container err text-center">
                <div class="row">
                    <div class="col">  
                        <h1>Admin Page</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <div class="row">
                            <div class="col-sm-6 admin">
                                <h2>MODS<h2>
                                <ul class="modLinks" style="list-style-type: none;">
                                    <?php foreach ($mods as $mod) : ?>
                                        <li>
                                            <a href="?modID=<?php echo $mod['modID']; ?>">
                                                <?php echo $mod['modName']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>
                                <div class="col-sm-6">
                                <h2>USERS</h2>
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                    </tr>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?php echo $user['userName']; ?></td>
                                            <td><?php echo $user['userEmail']; ?></td>
                                            <td><?php echo $user['submitDate']; ?></td>
                                            <td><?php echo $user['userMessage']; ?></td>
                                            <td>
                                                <form action="admin.php" method="post">
                                                    <input type="hidden" name="action" value="delete_user">
                                                    <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                                                    <input type="submit" value="Delete">
                                                </form>    
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div> 
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
                                                            <img src="img/pk.png" class="logo-footer" width="42px" height="42px" >
                                                            <p><a class="font-weight-bold" href="mailto:Patraickelly@my.cwi.edu">Patraickelly@my.cwi.edu</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="contact.html" class="btn-footer"> Contact Me</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 px-4">
                                                        <h6 class="text-center">Sitemap</h6>
                                                        <div class="row ">
                                                            <div class="col-md-4">

                                                            </div>
                                                            <div class="col-md-6 px-4">
                                                                <ul>
                                                                    <li> <a href="index.html"> Home</a> </li>
                                                                    <li> <a href="skills.html"> Skills</a> </li>
                                                                    <li> <a href="examples.html"> Examples</a> </li>  
                                                                    <li> <a href="contact.html"> Contact</a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
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
