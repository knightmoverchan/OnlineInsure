<?php
    include 'database.php';

    if($_POST){
       if(isset($_POST['createSalesRep']))
        {
            $setSalesRep = insertSalesRep($_POST['name'],$_POST['comPercentage'],$_POST['taxRate'],$_POST['bonus']);
        }
        else if(isset($_POST['createPayroll'])){
            $datePeriod = $_POST['month'].'/'. $_POST['days'].'/'. $_POST['year'];
            $client2 = array();
            $client3 = array();
            if($_POST['client2'] != ""){
                $client2 = [ $_POST['client2'], $_POST['clientEmail2'], $_POST['insureCom2']];
            }
            
            if($_POST['client3'] != ""){
                $client3 = [$_POST['client3'], $_POST['clientEmail3'], $_POST['insureCom3']];
            }
           
            $client = [
                [$_POST['client1'], $_POST['clientEmail1'], $_POST['insureCom1']],
                $client2,
                $client3,
            ];
            $setPayroll = insertPayroll((int)$_POST['salesRep'], $datePeriod, (int)$_POST['bonuses'], $client);
        }
        else{
            var_dump("nope");
        }
    }

?>