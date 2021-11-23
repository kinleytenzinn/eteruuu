
<?php
        session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href=".css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

<style>
    /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: ;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size:12px;
    font-weight: ;
    line-height: 1.7em;
    margin-left:15px;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration:;
    transition: all 0.3s;
}

.navbar {
    padding: 0px 0px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    margin-right:-16px;
    margin-top:-20px;
    margin-left:-20px;
   
}


.navbar-btn {
    box-shadow: ;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display:flex;
    width: 100%;
    align-items:;
}

#sidebar {
    min-width: 240px;
    max-width: 250px;
    background: #363E45;
    color: #fff;
    transition: all 0.3s;
    font-size:12px;
}

#sidebar.active {
    margin-left: -250px;
    
}

#sidebar .sidebar-header {
    padding: 30px;
    background:#363E45;
}

#sidebar ul.components {
    padding: 2px 0;
    border-bottom: 1px solid ;
}


#sidebar ul p {
    color: #fff;
    padding: 100px;
}

#sidebar ul li a {
    padding: 15px;
    font-size: 1.1em;
    display: block;
    margin-left:30px;
}
.list-unstyled{
    margin-top:0px;
    padding-bottom:0px;
    
}
/*
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}*/

/*
#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: ;
    background: #;
}*/
/*
a[data-toggle=""] {
    position: ;
}*/
/*
.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 50px;
    transform: translateY(-50%);
}*/
/*
ul ul a {
    font-size: 0.9em !important;
    padding-left: 60px !important;
    background: #6d7fcc;
}
*/
/*
ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}*/
/*
a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}
*/
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {

    width: 84%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
    /*margin-right:-100px;
    margin-left:-21px;
    margin-top:-20px;*/

}
.container-fluid{
    background:	#1988E1;
    padding:2px;
   
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */
/*
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}*/
    </style>


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">   
                <img class="rounded-circle" style="width:100px; height:70px; margin-left:30px;" src="logoo.PNG" alt="https://www.w3schools.com/bootstrap4/paris.jpg"/>
            </div>
            
            <?php
            /*if($_SESSION['USER_ID']===5903|| 5063 || 5758|| 5778 || 5788 || 5857|| 5877 || 5903 || 5907 || 5910 || 5914 || 5919) {    
                echo '<ul class="list-unstyled">';
                    echo '<li>'; 
                        echo '<a href="#merchant-submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Merchant Report</a>';
                        echo '<ul class="collapse list-unstyled" id="merchant-submenu">';
                            echo '<li>';
                                    echo '<a href="othertables.php">TICL Merchant Received</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="othertable.php">TICL Accountant Received</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';


                    echo '<ul class="list-unstyled">';
                        echo '<li>';
                            echo '<a href="#ma-report" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MA Report</a>';
                            echo '<ul class="collapse list-unstyled" id="ma-report">';
                                echo '<li>';
                                    echo '<a href="magent.php">MA Report</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';   
                
            }*/
            if ($_SESSION['USER_ID'] =="1638"){ 
                echo '<ul class="list-unstyled">';
                        echo '<li>';
                            echo '<a href="#merchant" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Merchant Report</a>';
                            echo '<ul class="collapse list-unstyled" id="merchant">';
                                echo '<li>';
                                    echo '<a href="homepagea.php">CCE Merchant Report</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="homepageaa.php">Accountant Merchant Report</a>';
                                echo '</li>';
                                echo '<li>';
                                echo '<a href="homepagee.php">Head Office Merchant Report</a>';
                            echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';    
                    
                    
                    echo '<ul class="list-unstyled">';
                        echo '<li>';
                            echo '<a href="#sa" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MA Report</a>';
                            echo '<ul class="collapse list-unstyled" id="sa">';
                                echo '<li>';
                                    echo '<a href="homepagem.php">Mater Agent Report</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';    
                    
                    echo '<ul class="list-unstyled">';
                        echo '<li>';
                            echo '<a href="#ssa-report" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Super Agent Report</a>';
                            echo '<ul class="collapse list-unstyled" id="ssa-report">';
                                echo '<li>';
                                    echo '<a href="homepagess.php">Super Agent Report</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';    
                
                
                    echo '<ul class="list-unstyled">';
                    echo '<li>';
                        echo '<a href="#ad-report" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin to SA Report</a>';
                        echo '<ul class="collapse list-unstyled" id="ad-report">';
                            echo '<li>';
                                echo '<a href="admin.php">Admin Report</a>';
                            echo '</li>';
                        echo '</ul>';
                    echo '</li>';
                echo '</ul>';            
                
                }
               else if ($_SESSION['USER_ID'] =='12024') { 
                    echo '<ul class="list-unstyled">';
                        echo '<li>';
                            echo '<a href="#merchant-submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Super Agent Report</a>';
                            echo '<ul class="collapse list-unstyled" id="merchant-submenu">';
                                echo '<li>';
                                    echo '<a href="homepagesa.php">Super Agents Report</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';
                    

                    echo '<ul class="list-unstyled">';
                    echo '<li>';
                        echo '<a href="#f-submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin to SA Report</a>';
                        echo '<ul class="collapse list-unstyled" id="f-submenu">';
                            echo '<li>';
                                echo '<a href="fadmin.php">Admin report</a>';
                            echo '</li>';
                        echo '</ul>';
                    echo '</li>';
                echo '</ul>';


                echo '<ul class="list-unstyled">';
                    echo '<li>';
                        echo '<a href="#f-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Merchant Report</a>';
                        echo '<ul class="collapse list-unstyled" id="f-menu">';
                            echo '<li>';
                                echo '<a href="fhome.php">CCE Merchant Report</a>';
                                echo '<a href="ffhome.php">Accountant Merchant Report</a>';
                                echo '<a href="hhome.php">Head Office Merchant Report</a>';
                            echo '</li>';
                        echo '</ul>';
                    echo '</li>';
                echo '</ul>';
                
                echo '<ul class="list-unstyled">';
                    echo '<li>';
                        echo '<a href="#ff-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master Agent Report</a>';
                        echo '<ul class="collapse list-unstyled" id="ff-menu">';
                            echo '<li>';
                                echo '<a href="homefff.php">Master Agents Report</a>';
                            echo '</li>';
                        echo '</ul>';
                    echo '</li>';
                echo '</ul>';

                }  
                else if ($_SESSION['USER_ID']===5903|| 5063 || 5758|| 5778 || 5788 || 5857|| 5877 || 5903 || 5907 || 5910 || 5914 || 5919) {    
                echo '<ul class="list-unstyled">';
                    echo '<li>'; 
                        echo '<a href="#merchant-submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Merchant Report</a>';
                        echo '<ul class="collapse list-unstyled" id="merchant-submenu">';
                            echo '<li>';
                                    echo '<a href="othertables.php">CCE Merchant Report</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="othertable.php">Accountant Merchant Report</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="headoffice.php">Head Office Merchant Report</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';


                    echo '<ul class="list-unstyled">';
                        echo '<li>';
                            echo '<a href="#ma-report" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master Agent Report</a>';
                            echo '<ul class="collapse list-unstyled" id="ma-report">';
                                echo '<li>';
                                    echo '<a href="magent.php">Master Agents Report</a>';
                                echo '</li>';
                            echo '</ul>';
                        echo '</li>';
                    echo '</ul>';   
                
            }
           ?>        
            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    <p type="" id="sidebarCollapse" class="">
                        <!--<i class="fas fa-align-left"></i>-->
                        <span></span>
                        
            </p>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <img class="rounded-circle" style="width:80px; height:100; margin-left:400px;" src="ppp.jpg" alt="https://www.w3schools.com/bootstrap4/paris.jpg"/>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link " style="color:black;" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php echo "<p style='color:red;text-align:center;font-size:20px;'>" . 'You are logged in as: ' . $_SESSION['MSISDN']. ' ,'.$_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME']."</p>";  ?>  
             <p>In commemoration of His Majesty’s 40th Birth Anniversary, TashiCell has officially launched eTeeru mobile wallet service on 6th April 2020. As a welcome gift, the first 10,000 registered subscribers will be rewarded with Nu. 100 each.

            The primary value proposition for the service is that it allows for the use of a mobile phone to send and receive money as remittance as well as pay merchants for goods and services without a need to have a bank account.</p>
            <div class="line"></div>

           
            <p>eTeeru is a digital payments platform launched on 6th April 2020, that allows you to transfer cash into the integrated wallet via online banking or even by depositing cash via authorized agents. Like your traditional wallet, eTeeru stores money for you to pay at groceries, restaurants, pharmacies and even taxis without using cash. You can recharge as well as pay Postpaid and Internet Leased Line bills. eTeeru is based on encrypted software that works through mobile apps and helps combat theft and fraud. It maintains an accurate check of your money and keeps it safe to make payments and purchases in future, and for those interested in using eTeeru for remittance, it can receive money from other eTeeru users too.</p>

            

        </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>