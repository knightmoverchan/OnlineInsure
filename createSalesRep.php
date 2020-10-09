<?php
    include 'assets/functions.php';
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
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create Sales Rep</h2><br>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form method="POST" action="assets/functions.php">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Sales Rep Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Sales Rep Name" required="required" data-validation-required-message="Please enter sales rep name." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Set Commission Percentage</label>
                                    <input class="form-control" name="comPercentage" type="number" placeholder="Set Commission Percentage" required="required" data-validation-required-message="Please set commission percentage." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Tax Rate</label>
                                    <input class="form-control" name="taxRate" type="number" placeholder="Tax Rate" required="required" data-validation-required-message="Please enter tax rate." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Bonus</label>
                                    <input class="form-control" name="bonus" type="number" placeholder="Bonus" required="required" data-validation-required-message="Please enter bonus." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <input type="hidden" name="createSalesRep" value="true">
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include "assets/footer.php" ?>
    </body>
</html>
