<?php
    include 'assets/database.php';
    require_once __DIR__ . '\assets\vendor\autoload.php';
    $data = getPayrollById($_GET['id']);
   

    $date = explode("/",$data[0]['date_period']);
    $month = date("m", strtotime($date[0]));
    $days = explode("-",$date[1]);
    $date_period1 = $days[0]."/".$month."/".$date[2];
    $date_period2 = $days[1]."/".$month."/".$date[2];
    $dateToday = date("m/d/Y");
    for($i=0; $i<sizeof($data); $i++){ 
    
        $payrollDetails .= '
        <span style="font-size: 20px">Buyer Created Tax Invoice<span></br>
        <div class="inv-body">
            <table>
                <thead>
                <tr>
                    <th style="text-align:center">Date</th>
                    <th>Description</th>
                    <th style="text-align:center">Debit</th>
                    <th style="text-align:center">Credit</th>
                    <th style="text-align:center">Balance</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center">'.$date_period1 .'</td>
                        <td>Commissions</td>
                        <td style="text-align:center">$0.00</td>
                        <td style="text-align:center">'."$".number_format($data[$i]["commission"], 2).'</td>
                        <td style="text-align:center">'."$".number_format($data[$i]["commission"], 2).'</td>
                    </tr>
                    <tr>
                        <td style="text-align:center">'.$date_period1 .'</td>
                        <td>Bonuses</td>
                        <td style="text-align:center">$0.00</td>
                        <td style="text-align:center">'."$".number_format($data[$i]["bonuses"], 2).'</td>
                        <td style="text-align:center">'."$".number_format($data[$i]["bonuses"], 2).'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="inv-footer">
            <div><!-- required --></div>
            <div>
                <table>
                    <tr>
                        <th>Sub total</th>
                        <td>'."$".number_format((int)$data[$i]["commission"] + (int)$data[$i]["bonuses"], 2).'</td>
                    </tr>
                    <tr>
                        <th>Commission Net: '.$data[$i]["commission_rate"].'% </th>
                        <td>'."$".number_format(((int)$data[$i]["commission"] + (int)$data[$i]["bonuses"]) * ((int)$data[$i]["commission_rate"]/100), 2).' </td>
                    </tr>
                    <tr>
                        <th>'.$data[$i]["tax_rate"].'% Tax Rate</th>
                        <td>'."$".number_format((((int)$data[$i]["commission"] + (int)$data[$i]["bonuses"]) * ((int)$data[$i]["commission_rate"]/100)) * ((int)$data[$i]["tax_rate"]/100), 2).'</td>
                    </tr>
                    <tr>
                        <th>Grand total</th>
                        <td>'."$".number_format(((int)$data[$i]["commission"] + (int)$data[$i]["bonuses"]) * ((int)$data[$i]["commission_rate"]/100) - (((int)$data[$i]["commission"] + (int)$data[$i]["bonuses"] ) * ((int)$data[$i]["commission_rate"]/100)) * ((int)$data[$i]["tax_rate"]/100), 2).'</td>
                    </tr>
                </table>
            </div>
        </div>';
        } 
    for($i=0; $i<sizeof($data); $i++){
        $clientDetails .= '
            <tr>
                <td style="text-align:center">'.$data[$i]["clientName"] .'</td>
                <td style="text-align:center">$3,000.00</td>
                <td style="text-align:center">'."$".number_format($data[$i]["commission"],2).'</td>
                <td style="text-align:center">'."$".number_format(3000 - (int)$data[$i]["commission"],2).'</td>
            </tr>';
    }

    print_r ($date_period2);
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('
    ?>
    <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Payroll</title>
		<style>
			ul {
                padding: 0;
                margin-left: 10px;
                list-style: none;
                float: left;

			}
			body {
				font-family: "Inter", sans-serif;
				margin: 0;
			}
			table {
				width: 100%;
				border-collapse: collapse;
			}
			table,
			table th,
			table td {
				border: 1px solid silver;
			}
			table th,
			table td {
				text-align: right;
				padding: 8px;
			}
			h1,
			h4,
			p {
				margin: 0;
			}

			.container {
				padding: 20px 0;
				width: 1000px;
				max-width: 90%;
				margin: 0 auto;
			}

			.inv-title {
                padding: 5px;
                font-size: 15px;
                background-color: #DCDCDC;
			}

			.inv-logo {
				width: 150px;
				display: block;
			}

			/* header */
			.inv-header {
				display: flex;
				margin-bottom: 20px;
			}
			.inv-header > :nth-child(1) {
				flex: 2;
			}
			.inv-header > :nth-child(2) {
				flex: 1;
			}
			.inv-header h2 {
				font-size: 12px;
				margin: 0 0 0.3rem 0;
			}
			.inv-header ul li {
				font-size: 12px;
				padding: 3px 0;
			}

			/* body */
			.inv-body table th,
			.inv-body table td {
				text-align: left;
			}
			.inv-body {
				margin-bottom: 30px;
			}

			/* footer */
			.inv-footer {
				display: flex;
				flex-direction: row;
			}
			.inv-footer > :nth-child(1) {
				flex: 2;
			}
			.inv-footer > :nth-child(2) {
				flex: 1;
            }
            table, td, th {
            border: 1px solid black;
            }

            table {
            border-collapse: collapse;
            width: 100%;
            }

            th {
            text-align: left;
            }
		</style>
	</head>
	<body>
       
		<div class="container">
            <img src="assets/img/logo.png" class="inv-logo" />
            <h2 align="center">Buyer Created Tax Invoice<h2>
                <div class="inv-title">
                    <span align="left">Sales Rep No.: '.$data[0]["sales_rep"].'</span>
                    <span style="text-transform: uppercase;">&nbsp;'.$data[0]["salesRepName"].'</span>
                    <span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    '.$date_period1."-".$date_period2.'</span>
                </div>
			
			<div class="inv-header">
				<div>
                    <div>
                        <ul>
                            <li><u>Produced on:</u> '.$dateToday.'</li>
                            <li style="text-transform: capitalize;">'.$data[0]["salesRepName"].'</li>
                            <li>Cebu, Philippines</li>
                            <li>'.$data[0]["email"].'</li>
                        </ul>
                    </div>
                    <div style="text-align:center; margin-top:-145px">
                        <ul><li><u>Online Insure</u></li>
                            <li>1C/39 Mackelvie Street Grey Lynn</li>
                            <li>1021 Auckland, New Zealand</li>
                            <li>+63493789676 | www.onlininsure.co.nz</li>
                        </ul>
                    </div>
                    <div style="text-align:right;margin-top:-140px">
                        <ul>
                            <li><u>Statement Week:</u> '.$data[0]["payroll_id"].'</li>
                            <li><u>Statement Date:</u> '.$date_period2.'</li>
                            <li><u>Payment Type:</u> Direct Credit</li>
                        </ul>
                    </div>
                </div>
            </div>

            '.$payrollDetails.'
            <pagebreak>
            <h6 align="center">Detail Commission Statement<h6>
            <div class="inv-title">
                <span align="left">Sales Rep No.: '.$data[0]["salesRepName"].'</span>
                <span style="text-transform: uppercase;">&nbsp;'.$data[0]["name"].'</span>
                <span style="float:right">'.$date_period1."-".$date_period2.'</span>
            </div>
            </div>
            <div class="inv-title">
                <span>PRODUCTION</span>
            </div>
            <div class="inv-body" >
				<table>
                    <thead>
                        <tr>
                            <th style="text-align:center">Client</th>
                            <th style="text-align:center">Annual Premium</th>
                            <th style="text-align:center">Commission</th>
                            <th style="text-align:center">Balance</th>
                        </tr>
					</thead>
					<tbody>
                    '.$clientDetails.'
                       
					</tbody>
				</table>
			</div>
         </div>
	</body>
</html>
     ');
    $mpdf->Output();
?>