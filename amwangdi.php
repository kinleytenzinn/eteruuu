<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style.css">-->
   <!-- <link rel="stylesheet" href="style.css"> -->

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
 

   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.js"></script>
   
   <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
  
  <style>
   .reportTable{
        font-size:8px;
        font-weight:bold;
        border: 0.5px solid black; 
        margin-top:200px;

    }
    .reportTable th{
        color: white;
        background:#1266F1 ;
    }
    .topp{
        margin-top:-40px;
    }
    .echh{
        margin-top:-80px;
        color:black;
        font-size:12px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="my-2">
        <button onclick="location.href='cdash.php'" class="btn btn-sm btn-warning"><i class="fa fa-home"> Home</i></button>
        <button onclick="location.href='homepagea.php'" class="btn btn-sm btn-warning">Back</button>
    </div>
    <p style='color:black; font-size:15px;margin-top:2px;text-align:center;'>Report:Payment to Ticl merchant</p>;
        <!--<a href="export.php" class="btn btn-success" title="click to export">Export to Excel</a>-->
        <!-- <p class="text-end "><a href="mexport.php" class=" my-3 btn btn-success" title="click to export">Export to Excel</a>.</p> -->
        <!-- <form method="GET" action="othertable.php"> -->
        <div class="topp">
        <form method="GET">
            <div class="row mt-3 mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" 
                            name="search" 
                            placeholder="Search" 
                            value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="date" class="form-control form-control-sm" name="from_date" placeholder="Transaction From" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : '' ?>">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="date" class="form-control form-control-sm" name="to_date" placeholder="Transaction To" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
                    <a href="amwangdi.php" class="btn btn-danger btn-sm" title="click to export"><i class="fa fa-undo"></i> Clear Search</a>
                    <?php
                        $searchValue = isset($_GET['search']) ? $_GET['search'] : '';
                        $fromDate = isset($_GET['from_date']) ? $_GET['from_date'] : '';
                        $toDate = isset($_GET['to_date']) ? $_GET['to_date'] : '';
                     ?>
                    <a href="eamwangdi.php?search=<?php echo $searchValue?>&from_date=<?php echo $fromDate ?>&to_date=<?php echo $toDate ?>"
                    
                    class="btn btn-success btn-sm float-right" title="click to export"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                </div>
            </div>       
        </form>
</div>
<?php 
     session_start();
     if (!isset($_SESSION['testsession'])) {
         header("Location: dexin.php");
         // echo "login";
     }
     else{
         // echo "success";
         echo "<p class='echh'>" . 'Welcome ' . $_SESSION['MSISDN']. "</p>";
         $link = mysqli_connect("10.76.178.13", "mfsuser", "mfsuser@6Dtech", "MMBL");
       
         if ($link ==    false) {
             die("ERROR: Could not connect. " .mysqli_connect_error());
         }
         //echo "<center style='color:black; font-size:20px;margin-top:20px;'>Report:Bumthang SA to MA</center>";
         echo "<br>";
         echo "<br>";
         $userId = $_SESSION['USER_ID'];
     

   if ($userId == 5788 || 1638) { //wangdue
    $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
    a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
    a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
    b.PARENT_NAME FROM MFS_CDR_MASTER a
    LEFT JOIN MFS_USER_VIEW b
    ON a.DEST_USER_ID=b.USER_ID WHERE 
    a. DEST_USER_ID=5788 AND 
    SERVICE_ID = '7' AND STATUS_TYPE = 'S'"; 
    // AND TRANSACTION_DATE BETWEEN '2020-01-30 00:00:00' AND '2021-08-30 23:59:59' ";

        if (isset($_GET['search']) && $_GET['search'] != null && isset($_GET['from_date']) && $_GET['from_date'] != null && isset($_GET['to_date']) && $_GET['to_date'] != null) {
            $searchValue = $_GET['search'] != null ? $_GET['search'] : '';
            $fromDate = $_GET['from_date'] != null ? $_GET['from_date'] : '';
            $toDate = $_GET['to_date'] != null ? $_GET['to_date'] : '';
            $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
            a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
            a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
            b.PARENT_NAME FROM MFS_CDR_MASTER a
            LEFT JOIN MFS_USER_VIEW b
            ON a.DEST_USER_ID=b.USER_ID WHERE 
            a.DEST_USER_ID=5788 AND 
            (a.TRANSACTION_ID='$searchValue' OR  a.ORIG_USER_ID='$searchValue' OR a.ORIG_MSISDN='$searchValue' OR a.DEST_MSISDN='$searchValue' OR b.PARENT_ID='$searchValue' OR b. PARENT_NAME='$searchValue' OR a.ORIG_FULL_NAME='$searchValue' OR a.DEST_FULL_NAME='$searchValue'  OR (a.ORIG_FULL_NAME='$searchValue' && a.DEST_FULL_NAME='$searchValue'))AND 
            SERVICE_ID = '7' AND STATUS_TYPE = 'S' 
            AND DATE(a.TRANSACTION_DATE) between '$fromDate' AND '$toDate'";
        
        }else if (isset($_GET['search']) && $_GET['search'] != null) {
            $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
            a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
            a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
            b.PARENT_NAME FROM MFS_CDR_MASTER a
            LEFT JOIN MFS_USER_VIEW b
            ON a.DEST_USER_ID=b.USER_ID WHERE 
            a.DEST_USER_ID=5788 AND 
            (a.TRANSACTION_ID='$searchValue' OR  a.ORIG_USER_ID='$searchValue' OR a.ORIG_MSISDN='$searchValue' OR a.DEST_MSISDN='$searchValue' OR b.PARENT_ID='$searchValue' OR b. PARENT_NAME='$searchValue' OR a.ORIG_FULL_NAME='$searchValue' OR a.DEST_FULL_NAME='$searchValue'  OR (a.ORIG_FULL_NAME='$searchValue' && a.DEST_FULL_NAME='$searchValue'))AND 
            SERVICE_ID = '7' AND STATUS_TYPE = 'S'";
        
        }else if (isset($_GET['from_date']) && $_GET['from_date'] != null && isset($_GET['to_date']) && $_GET['to_date'] != null) {
            $fromDate = $_GET['from_date'] != null ? $_GET['from_date'] : '';
            $toDate = $_GET['to_date'] != null ? $_GET['to_date'] : '';
            $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
            a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
            a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
            b.PARENT_NAME FROM MFS_CDR_MASTER a
            LEFT JOIN MFS_USER_VIEW b
            ON a.DEST_USER_ID=b.USER_ID WHERE 
            a.DEST_USER_ID=5788 AND 
            SERVICE_ID = '7' AND STATUS_TYPE = 'S' 
            AND DATE(a.TRANSACTION_DATE) between '$fromDate' AND '$toDate'";
        }  

    }


//SERVICE_ID IN (7) AND STATUS_TYPE = 'S' 
//AND DEST_USER_ID IN (5056, 5015, 5045) ORDER BY TRANSACTION_DATE DESC LIMIT 100;


if ($res = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($res) > 0) {    
        echo '<div class="table-responsive">';  
        echo '<table id="reportTable" class="reportTable table table-hover table table-bordered table-condensed table-sm">'; 
        echo "<thead>";
        echo "<tr>";
        echo "<th>TRANSACTION_ID</th>";
        echo "<th>TRANSACTION_DATE</th>";
        echo "<th>SERVICE_NAME</th>";
        echo "<th>TRANSACTION_AMOUNT</th>";
        echo "<th>ORIG_USER_ID</th>";
        echo "<th>ORIG_MSISDN</th>";
        echo "<th>ORIG_PROFILE_ID</th>";
        echo "<th>ORIG_FULL_NAME</th>";
        echo "<th>DEST_MSISDN</th>";
        echo "<th>DEST_FULL_NAME</th>";
        echo "<th>DEST_BAL_BEFORE</th>";
        echo "<th>DEST_BAL_AFTER</th>";
        echo "<th>PARENT_NAME</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        //$count = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>".$row['TRANSACTION_ID']."</td>";
            echo "<td>".$row['TRANSACTION_DATE']."</td>";
            echo "<td>".$row['SERVICE_NAME']."</td>";
            echo "<td>".$row['TRANSACTION_AMOUNT']."</td>";
            echo "<td>".$row['ORIG_USER_ID']."</td>";
            echo "<td>".$row['ORIG_MSISDN']."</td>";
            echo "<td>".$row['ORIG_PROFILE_ID']."</td>";
            echo "<td>".$row['ORIG_FULL_NAME']."</td>";
            echo "<td>".$row['DEST_MSISDN']."</td>";
            echo "<td>".$row['DEST_FULL_NAME']."</td>";
            echo "<td>".$row['DEST_BAL_BEFORE']."</td>";
            echo "<td>".$row['DEST_BAL_AFTER']."</td>";
            echo "<td>".$row['PARENT_NAME']."</td>";
            echo "</tr>";
            //$count++;
        }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            //mysqli_free_res($res);
        }
        else {
            echo "No matching records are found.";
        }
    }
    else {
        echo "ERROR: Could not able to execute $sql. "
                                    .mysqli_error($link);
    }
    mysqli_close($link);    
}


?>

</div>

<script>
    $(document).ready(function(){
        $('#reportTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "sorting": true
        });
    });
</script>
</body>
</html>