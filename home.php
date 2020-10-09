<?php
    session_start();
    if($_SESSION["login"] == false) {
        header("Location: index.php"); die();
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
            <div class="container"><br><br>
                <center><img src="assets/img/logo.png"/></center><br><br>
                <div class="form-group col-md-12">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">WELCOME TO</h2><br>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ONLINE INSURE</h2><br>
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">PAYROLL SYSTEM</h2><br>
                    </center>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include "assets/footer.php" ?>
    </body>
</html>
