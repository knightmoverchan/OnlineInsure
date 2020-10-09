<?php
    include 'assets/functions.php';
    session_start();
    if($_SESSION["login"] == false) {
        header("Location: index.php"); die();
    }
    $id = 38;
    $data = showAllSalesRep();
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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create Payroll</h2><br>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form method="POST" action="assets/functions.php">
                            <div class="control-group">
                                <label>Sales Rep Name: </label>
                                <select class="form-control" required="required" name="salesRep">
                                    <option hidden>Select Sales Rep</option>
                                    <?php
                                        for($i=0; $i<sizeof($data);$i++){
                                        echo '<option value="'.$data[$i]['id'].'">'.$data[$i]['name'].'</option>';
                                    }?>
                                </select>
                            </div>
                            <br><div class="form-inline">
                                <label>Date Period: &nbsp;</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="month" class="form-control" required="required">
                                            <?php
                                                for ($i = 0; $i < 12; $i++ ) {
                                                    $date_str = date('M', strtotime("+ $i months"));
                                                    echo "<option value=$date_str>".$date_str."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="days" class="form-control" required="required">
                                                <option value="1-15">1-15</option>
                                                <option value="16-30">16-30</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="year" class="form-control" required="required">
                                                <?php
                                                    for ($i = 0; $i < 20; $i++ ) {
                                                        $date_str = date('Y', strtotime("- $i years"));
                                                        echo "<option value=$date_str>".$date_str ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="control-group">
                                <label>Bonuses:</label>
                                    <div class="left-inner-addon">
                                    <i>$</i>
                                        <input type="number" name="bonuses" class="form-control" placeholder="0.00" required="required"/>
                                    </div>
                            </div>
                            <br><div class="control-group">
                                <label>Client: &nbsp; </label>
                                <input onkeydown="search(this)" class="form-control" name="client" type="number" placeholder="1-3" required="required" min="1" max="3" data-validation-required-message="Please enter sales rep name." />
                                <p class="help-block text-danger"></p>

                                
                            </div>
                            <br><div class="form-inline clientDiv1">
                                <input class="form-control" name="client1" type="text" placeholder="Enter client's name" required="required"/>
                                <input class="form-control" name="clientEmail1" type="email" placeholder="Enter client's email" required="required"/>
                                <input class="form-control" name="insureCom1" type="number" placeholder="Enter Commission" required="required"/>
                            </div>
                            <br/>
                            <br><div class="form-inline clientDiv2">
                                <input class="form-control" name="client2" type="text" placeholder="Enter client's name"/>
                                <input class="form-control" name="clientEmail2" type="email" placeholder="Enter client's email"/>
                                <input class="form-control" name="insureCom2" type="number" placeholder="Enter Commission"/>
                            </div>
                            <br/>
                            <br><div class="form-inline clientDiv3">
                                <input class="form-control" name="client3" type="text" placeholder="Enter client's name"/>
                                <input class="form-control" name="clientEmail3" type="email" placeholder="Enter client's email"/>
                                <input class="form-control" name="insureCom3" type="number" placeholder="Enter Commission"/>
                            </div>
                            <br/>
                            <input type="hidden" name="createPayroll" value="true">

                            <div class="form-group"><button class="btn btn-danger btn-xl" id="createPayrollButton" type="submit">Create Payroll</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include "assets/footer.php" ?>
    </body>
</html>
