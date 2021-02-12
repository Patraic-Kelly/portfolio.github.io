<!---------------------admin.php-------------------------
--
#Original Author:Patraic Kelly                                   
#Date Created: 4/19/20                                                                                
#Date Last Modified: 1/22/21
#Modified by: PK               
#Modification log: build form for use with sql.                                    
 --
----------------------------------------------------->
<?php

class Database {

    private static $dsn = 'mysql:host=localhost;dbname=pkptfolio';
    private static $username = 'pk_admin';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                        self::$username,
                        self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('error.html');
                exit();
            }
        }
        return self::$db;
    }

}

class Moderator {

    private $modName, $modEmail;

    public function __construct($modName, $modEmail) {
        $this->modName = $modName;
        $this->modEmail = $modEmail;
    }

    public function getModName() {
        return $this->modName;
    }
    
    public function getModEmail() {
        return $this->modEmail;
    }
}
    
class ModeratorDB {
    public static function getModerators() {
        $db = Database::getDB();
        $query = 'SELECT modName, modEmail FROM mods
                  ORDER BY modID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $mod = array();
        foreach ($statement as $row) {
            $mod = new Moderator($row['modName'],
                                 $row['modEmail']);
            $moderators[] = $mod;
        }
        return $moderators;
    }
}

$moderators = ModeratorDB::getModerators();

//$dsn = 'mysql:host=localhost;dbname=pkptfolio';
//$username = 'pk_admin';
//$password = 'Pa$$w0rd';
//
//try {
//    $db = new PDO($dsn, $username, $password);
//} catch (PDOException $e) {
//    $error_message - $e->getMessage();
//    echo "Database error: " . $error_message;
//    exit();
//}
//
//$action = filter_input(INPUT_POST, 'action');
//if ($action == NULL) {
//    $action = 'list_users';
//}
//
//if ($action == 'list_users') {
//    //read mod data by id
//    $modID = filter_input(INPUT_GET, 'modID', FILTER_VALIDATE_INT);
//    if ($modID == NULL || $modID == FALSE) {
//        $modID = 1;
//    }
//    try {
//        $query = 'SELECT * FROM mods ORDER BY modID;';
//        $statement = $db->prepare($query);
//        $statement->execute();
//        $mods = $statement;
//
//        $query2 = 'SELECT * FROM users WHERE users.modID = :modID ORDER BY submitDate;';
//        $statement2 = $db->prepare($query2);
//        $statement2->bindValue(':modID', $modID);
//        $statement2->execute();
//        $users = $statement2;
//    } catch (PDOException $ex) {
//        echo 'Error: ' . $ex->getMessage();
//    }
//} else if ($action == 'delete_user') {
//    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
//    try {
//        $query = 'DELETE FROM users WHERE userID = :userID;';
//        $statement = $db->prepare($query);
//        $statement->bindValue(':userID', $userID);
//        $statement->execute();
//        $statement->closeCursor();
//        header("Location: admin.php");
//    } catch (PDOException $ex) {
//        echo 'Delete Error: ' . $ex->getMessage();
//    }
//    //delete record
//}
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
                            <div class="col-sm-12 admin">
                                <h2>MODS<h2>
                                        <h4>
                                            <ul>
                                                <?php foreach ($moderators as $moderator) :?>
                                                <li>
                                                    <?php echo $moderator->getModName() . ", " . $moderator->getModEmail() . "<hr>"?>
                                                </li>
                                                <?php endforeach;?>
                                            </ul>
                                        </h4>

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
