<?php 
    session_start();
    $errorMsg = "";
    if(isset($_GET['user'])){
        if($_GET['user'] == "logout"){
            $_SESSION["login"] = false;
        }
    }
    $validUser = $_SESSION["login"] === true;
    if(isset($_POST["sub"])) {
    $validUser = $_POST["username"] == "admin" && $_POST["password"] == "password";
    if(!$validUser)
     $errorMsg = '<div class="alert alert-danger" role="alert">Invalid username or password.</div';
    else $_SESSION["login"] = true;
    }
    if($validUser) {
        header("Location: home.php"); die();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Header-->
    <?php include "assets/header.php" ?>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "assets/nav.php" ?>
        <section class="masthead page-section" id="contact">
            <div class="container">
                <center><img src="assets/img/logo.png"/></center><br>
                <div class="form-group col-md-12">
                    <form method="POST" action=""><center>
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input class="form-control" name="username" type="text" placeholder="Enter admin as username" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Enter password as password" required="required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <?php echo $errorMsg?>
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary" name="sub" type="submit">Login</button>
                        </div>
                    </center>
                    </form>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include "assets/footer.php" ?>
    </body>
</html>