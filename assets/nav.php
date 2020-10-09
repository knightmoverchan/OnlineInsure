<?php 
     $host = $_SERVER['REQUEST_URI'];
     $arr = array(
         '0' => '/xampp/OnlineInsure/home.php', 
         '1' => '/xampp/OnlineInsure/viewSalesRep.php',
         '2' => '/xampp/OnlineInsure/createSalesRep.php',
         '3' => '/xampp/OnlineInsure/createPayroll.php',
         '4' => '/xampp/OnlineInsure/pdf.php',
     );
     if($host == $arr['0']){
         $class1 = "active";
     } 
     else if($host == $arr['1']){
         $class2 = "active";
     } 
     else if($host == $arr['2']){
         $class3 = "active";
     } 
     else if($host == $arr['3']){
         $class4 = "active";
     } 
     else if($host == $arr['4']){
         $class5 = "active";
     } 
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-4"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?php echo $class1; ?>" href="home.php" >Home</a></li>
                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="custom-select <?php echo $class2; ?>">
                    <option hidden>SALES REP</option>
                    <option value="viewSalesRep.php">Sales Rep Profile</option>
                    <option value="createSalesRep.php">Add Sales Rep Profile</option>
                </select>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?php echo $class4; ?>" href="createPayroll.php">Create Payroll</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?php echo $class5; ?>" href="viewPdf.php">PDFs</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?php echo $class5; ?>" href=" <?php 
                if($_SESSION["login"] == true){ echo "index.php?user=logout"; } else {  echo "index.php?user=login"; }?>">
                <?php 
                if($_SESSION["login"] == true) {
                    echo "Logout";
                }
                else{
                    echo "Login";
                }
                ?></a></li>
            </ul>
        </div>
    </div>
</nav>