<?php
    //include database configuration file
    include_once 'config.php';
    session_start();

    //filter the excel data
    function filterData (&$str) {
        $str= preg_replace("/\t/","\\t",$str);
        $str=preg_replace("/\r?\n/","\\n",$str);
        if (strstr($str,'"')) $str= '"' .str_replace('"','""',$str) .'"';
    }

    //column names
    $fields = array('TRANSACTION_ID','TRANSACTION_DATE','SERVICE_NAME','TRANSACTION_AMOUNT','ORIG_USER_ID','ORIG_MSISDN','ORIG_PROFILE_ID','ORIG_FULL_NAME','DEST_MSISDN','DEST_FULL_NAME','DEST_BAL_BEFORE','DEST_BAL_AFTER','PARENT_NAME');

    //dispaly column names as first row
    $excelData = implode("\t",array_values($fields)) .  "\n";

    //if link is established then do the following
    //get user id
    $userId = $_SESSION['USER_ID'];
    
    
    if ($userId ==5910 || 12024) { //trashigang MASTER AGENT TO ACCOUNTANT/ CUSTOMER FOR TOPUP
        $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
        a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
        a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
        b.PARENT_NAME FROM MFS_CDR_MASTER a
        LEFT JOIN MFS_USER_VIEW b
        ON a.DEST_USER_ID=b.USER_ID WHERE 
        a. DEST_USER_ID IN (5791,5777,5762,5752,6974,6984,6985) AND 
        SERVICE_ID = '7' AND STATUS_TYPE = 'S'";

        if(isset($_GET['search']) && $_GET['search'] != null && isset($_GET['from_date']) && $_GET['from_date'] != null && isset($_GET['to_date']) && $_GET['to_date'] != null) {
            $searchValue = $_GET['search'] != null ? $_GET['search'] : '';
            $fromDate = $_GET['from_date'] != null ? $_GET['from_date'] : '';
            $toDate = $_GET['to_date'] != null ? $_GET['to_date'] : '';
            $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
            a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
            a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
            b.PARENT_NAME FROM MFS_CDR_MASTER a
            LEFT JOIN MFS_USER_VIEW b
            ON a.DEST_USER_ID=b.USER_ID WHERE 
            a.DEST_USER_ID IN (5791,5777,5762,5752,6974,6984,6985) AND 
            (a.TRANSACTION_ID='$searchValue' OR a.ORIG_USER_ID='$searchValue' OR a.ORIG_MSISDN='$searchValue' OR a.DEST_MSISDN='$searchValue' OR b.PARENT_ID='$searchValue' OR b. PARENT_NAME='$searchValue' OR a.ORIG_FULL_NAME='$searchValue' OR a.DEST_FULL_NAME='$searchValue'  OR (a.ORIG_FULL_NAME='$searchValue' && a.DEST_FULL_NAME='$searchValue'))AND 
            SERVICE_ID = '7' AND STATUS_TYPE = 'S' 
            AND DATE(a.TRANSACTION_DATE) between '$fromDate' AND '$toDate'";
        
        }else if (isset($_GET['search']) && $_GET['search'] != null) {
            $searchValue = $_GET['search'] != null ? $_GET['search'] : '';
            $sql="SELECT a.TRANSACTION_ID, a.TRANSACTION_DATE,a.SERVICE_NAME, a.TRANSACTION_AMOUNT,
            a.ORIG_USER_ID,  a.ORIG_MSISDN,a.ORIG_PROFILE_ID, a.ORIG_FULL_NAME,  
            a.DEST_MSISDN,a.DEST_FULL_NAME, a.DEST_BAL_BEFORE, a.DEST_BAL_AFTER,
            b.PARENT_NAME FROM MFS_CDR_MASTER a
            LEFT JOIN MFS_USER_VIEW b
            ON a.DEST_USER_ID=b.USER_ID WHERE 
            a.DEST_USER_ID IN (5791,5777,5762,5752,6974,6984,6985) AND 
            (a.TRANSACTION_ID='$searchValue' OR a.ORIG_USER_ID='$searchValue' OR a.ORIG_MSISDN='$searchValue' OR a.DEST_MSISDN='$searchValue' OR b.PARENT_ID='$searchValue' OR b. PARENT_NAME='$searchValue' OR a.ORIG_FULL_NAME='$searchValue' OR a.DEST_FULL_NAME='$searchValue'  OR (a.ORIG_FULL_NAME='$searchValue' && a.DEST_FULL_NAME='$searchValue'))AND 
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
            a.DEST_USER_ID IN (5791,5777,5762,5752,6974,6984,6985) AND 
            SERVICE_ID = '7' AND STATUS_TYPE = 'S' 
            AND DATE(a.TRANSACTION_DATE) between '$fromDate' AND '$toDate'";
        }  

    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        //excel file name for download
        //$fileName = "MFS_CDR_MASTER_export_data-" . date('Y-m-d') . ".XLS";
        $fileName = "MFS_CDR_MASTER-" . date('dmY') . ".xls";
    
        
        // header for download
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        //output each row of the data
        $i=0;
        while ($row = $result->fetch_assoc()) { 
            $i++;
            $rowData = array(
                $row['TRANSACTION_ID'],
                $row['TRANSACTION_DATE'],
                $row['SERVICE_NAME'],
                $row['TRANSACTION_AMOUNT'],
                $row['ORIG_USER_ID'],
                $row['ORIG_MSISDN'],
                $row['ORIG_PROFILE_ID'],
                $row['ORIG_FULL_NAME'],
                $row['DEST_MSISDN'],
                $row['DEST_FULL_NAME'],
                $row['DEST_BAL_BEFORE'],
                $row['DEST_BAL_AFTER'],
                $row['PARENT_NAME']
                ); 

            array_walk($row, 'filterData');
            $excelData .=implode("\t",array_values($rowData)). "\n";
        }
    } else {
        $excelData .='No records found...' . "\n";
    }
$result->free_result();

//render excel data
echo $excelData;
exit;
