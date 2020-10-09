<?php
    include "SalesRep.php";
    include "Payroll.php";
    include "Client.php";
    
    function dbConnect(){
        try{
           return new pdo('mysql:host=localhost;dbname=online_insure','root','');
        }
        catch(PDOException $ex){
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }
    }

    function insertSalesRep($name, $comPercentage, $taxRate, $bonus){
        $pdo = dbConnect();
        $dataObject = new SalesRep($name, $comPercentage, $taxRate, $bonus);
        $sql = "INSERT INTO sales_rep(name, commission_rate, tax_rate, bonus) VALUES (:name, :comPercentage, :taxRate, :bonus)";
        $query = (array) $dataObject;
        try
        {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($query);

            header("Location: ../viewSalesRep.php?message=success");
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage()); 
        } 
    }

    function showAllSalesRep(){
        $pdo = dbConnect();
        $sql = "SELECT * FROM sales_rep";
        try
        {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            // $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 

            $data = array();
            while ($row = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
                $data = $row;
            }
            return $data;
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage()); 
        }
    }

    function insertPayroll($salesRep, $datePeriod, $bonuses, $client){
        $pdo = dbConnect();
        $dataObject = new Payroll($salesRep, $datePeriod, $bonuses);
        $sql = "INSERT INTO payroll(sales_rep, date_period, bonuses) VALUES (:salesRep, :datePeriod, :bonuses)";
        $query = (array) $dataObject;
        try
        {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($query);
            $lastId = $pdo->lastInsertId();
            var_dump($lastId);
            insertClient((int)$lastId, $client);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage()); 
        } 
    }

    function insertClient($payroll_id, $client){
        $pdo = dbConnect();
        for($i=0; $i<sizeof($client); $i++){
            if(isset($client[$i][0])){
                $name = $client[$i][0];
                $email = $client[$i][1];
                $commission = $client[$i][2];
                $dataObject = new Client($name, $email, $commission, $payroll_id);
                $sql = "INSERT INTO client(name, email, commission, payroll_id) VALUES (:name, :email, :commission, :payroll)";
                $query = (array) $dataObject;
                try
                {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($query);
                }
                catch(PDOException $ex)
                {
                    die("Failed to run query: " . $ex->getMessage()); 
                }
            }
        }

        header("Location: ../output.php?id=".$payroll_id);
    }


    function getPayrollById($id){
        $pdo = dbConnect();
        $sql = "SELECT *, t3.id as 'clientId',t3.name as 'clientName'  FROM payroll as t1
            LEFT JOIN sales_rep as t2 ON t1.sales_rep = t2.id
            LEFT JOIN client as t3 ON t1.id = t3.payroll_id
            WHERE t1.id=".$id;
        try
        {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $data = array();
            while ($row = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
                $data = $row;
            }
            return $data;
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage()); 
        }
    }

    function showAllPayroll(){
        $pdo = dbConnect();
        $sql = "SELECT *, t3.id as 'clientId',t3.name as 'clientName', t2.name as 'salesRepName' FROM payroll as t1
            LEFT JOIN sales_rep as t2 ON t1.sales_rep = t2.id
            LEFT JOIN client as t3 ON t1.id = t3.payroll_id";
        try
        {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $data = array();
            while ($row = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
                $data = $row;
            }
            return $data;
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage()); 
        }
    }

?>