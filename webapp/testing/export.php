 <!-- export in excel -->
 <?php  
//export.php  

 
include "connect.php";
  
$setSql = "SELECT * FROM `order`";  
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "orderid" . "\t" . "shop Name" . "\t" . "productname" . "\t" . "brandname" ."\t" .  "keyword" . "\t" . "quantity" .  "\t" . "price" . "\t" . "inctax" . "\t" . "salestatus" . "\t" . "extax" ;  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>  
