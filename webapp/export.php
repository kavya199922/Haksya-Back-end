
 <?php  
//export.php  


include "connect.php";
//export current order
if(isset($_POST['export'])){
    $setSql = "SELECT `shopname`,`brandname`,`productid`,`dateoforder`,`productname`,`quantity`,`price`,`price`,`extax`,`salestatus`,`productid` FROM `temporder`  ";
  
    $setRec = mysqli_query($conn, $setSql);  
      
    $columnHeader = '';
   //Company name,Invoice,Date,Customer PO,Item Number,Description(Product),Qty,Price,Inctax,Extax,Salestatus
   //as in temporder
   //ID	orderid	shopname	brandname	keyword	quantity	productname	price	inctax	extax	salestatus	dateoforder   
    $columnHeader ="Co./Last Name" . "\t" . "Invoice#" . "\t".  "Date" .   "\t" . "Description" . "\t" . "Quantity" . "\t" .  "PRICE" .  "\t" . "Inc tax" .  "\t" . "EX-TAX" . "\t" . "Sale Status" . "\t" . "Item No" ;   
    
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
    header("Content-Disposition: attachment; filename=User_Detail_Reoprt.csv");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n";  
    }
    
if(isset($_POST['exportorder'])){
$setSql = "SELECT `shopname`,`brandname`,`dateoforder`,`productname`,`quantity`,`price`,`price`,`extax`,`salestatus` FROM `temporder`  ";
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';
//Co./Last Name	Invoice #	Date	Customer PO	Item Number	Description(Brand)	Quantity	PRICE	Inc tax	EX-TAX	Sale Status	
 
$columnHeader = "Co./Last Name" . "\t" . "Invoice#" . "\t".  "Date" .   "\t" . "Description" . "\t" . "Quantity" . "\t" .  "PRICE" .  "\t" . "Inc tax" .  "\t" . "EX-TAX" . "\t" . "Sale Status" ; 
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
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.csv");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
}

//delete from temporder
$del=mysqli_query($conn,"DELETE FROM `temporder`");

?>  
