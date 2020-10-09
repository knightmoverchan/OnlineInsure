<?php
   include 'assets/functions.php';
   session_start();
    if($_SESSION["login"] == false) {
        header("Location: index.php"); die();
    }
   $data = showAllSalesRep();
   for($i=0; $i<sizeof($data); $i++){ 
    $salesRep .=  '<tr>
        <td style="text-align:center">'.$data[$i]["id"] .'</td>
        <td style="text-align:center">'.$data[$i]["name"] .'</td>
        <td style="text-align:center">'.$data[$i]["commission_rate"] .'%</td>
        <td style="text-align:center">'.$data[$i]["tax_rate"] .'%</td>
        <td style="text-align:center">$'.$data[$i]["bonus"] .'.00</td>
    </tr>';
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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Sales Rep Profile</h2><br>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center">ID</th>
                                <th style="text-align:center">Name</th>
                                <th style="text-align:center">Comission Rate</th>
                                <th style="text-align:center">Tax Rate</th>
                                <th style="text-align:center">Bonus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $salesRep; ?>
                    </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include "assets/footer.php" ?>
    </body>
</html>
