<?php
   include 'assets/functions.php';
   session_start();
    if($_SESSION["login"] == false) {
        header("Location: index.php"); die();
    }
   
   $data = showAllPayroll();
   for($i=0; $i<sizeof($data); $i++){ 
    $date = explode("/",$data[0]['date_period']);
    $month = date("m", strtotime($date[0]));
    $days = explode("-",$date[1]);
    $date_period1 = $days[0]."/".$month."/".$date[2];
    $date_period2 = $days[1]."/".$month."/".$date[2];
    $salesRep ="";
    $salesRep .=  '<tr>
        <td style="text-align:center">'.$data[$i]["payroll_id"] .'</td>
        <td style="text-align:center">'.$data[$i]["salesRepName"] .'</td>
        <td style="text-align:center">'.$data[$i]["clientName"] .'</td>
        <td style="text-align:center">'.$date_period1."-".$date_period2.'</td>
        <td style="text-align:center"><a href="output.php?id='.$data[$i]["payroll_id"].'"><button>View PDF</button></a> <button>Send Email to Client</button></td>
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
                    <div class="col-lg-12 mx-auto">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center">Payroll ID</th>
                                <th style="text-align:center">Sales Rep</th>
                                <th style="text-align:center">Client Name</th>
                                <th style="text-align:center">Date Period</th>
                                <th style="text-align:center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $salesRep; ?>
                    </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include "assets/footer.php" ?>
    </body>
</html>
