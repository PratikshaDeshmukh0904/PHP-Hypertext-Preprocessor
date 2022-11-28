<?php
require_once('../../inc/config/constants.php');
require_once('../../inc/config/db.php');

$itemDetailsSearchSql = 'SELECT * FROM item WHERE stock < itemMinStock';
$itemDetailsSearchStatement = $conn->prepare($itemDetailsSearchSql);
$itemDetailsSearchStatement->execute();



$output = '<table id="itemMinStockReportsTable" class="table table-sm table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 10px !important;"><input type="checkbox" name="check" class="cbxMain" onchange="checkMain(this)"/></th>
                    <th>Lookup Code</th>
                    <th>Item Name</th>
                
                    <th>Current Stock</th>
                    <th>Unit Cost</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Minimum Stock</th>
                    <th>Vendor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

// Create table rows from the selected data
while($row = $itemDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
$itemNumber = $row['itemNumber'];
$itemName = $row['itemName'];
$stock = $row['stock'];
$unitPrice = $row['unitPrice'];
$status = $row['status'];
$description = $row['description'];
$itemMinStock = $row['itemMinStock'];
$itemVendor = $row['itemVendor'];

    $output .= '<tr>' .
                    
                    '<td>' . ' <input type="checkbox" name="check[]" class="check"  '. '</td> '. 
                    '<td>' . $itemNumber . '</td>' .
                    //'<td>' . $row['itemName'] . '</td>' .
                    '<td><a href="#" class="itemDetailsHover" data-toggle="popover" id="' . $row['productID'] . '">' . $itemName . '</a></td>' .
    
                    '<td>' . $stock. '</td>' .
                    '<td>' . $unitPrice. '</td>' .
                    '<td>' . $status . '</td>' .
                    '<td>' . $description . '</td>' .
                    '<td>' . $itemMinStock . '</td>' .
                    '<td>' . $itemVendor . '</td>' .
                    '<td>' .'<button type="button" id="deleteItem" class="btn btn-danger">Delete</button> '. '</td>' .
                '</tr>';
}

$itemDetailsSearchStatement->closeCursor();

$output .= '</tbody>
                <tfoot>
            
                <br>
                <th> <br>   <button type="button" id="addItem" name="btn_po" class="btn btn-success">Proceed to PO</button> </th>
            
                 </tfoot>
            </table>';
echo $output;


if(isset($_POST['btn_po']))
{
   $checkbox = $_POST['check'];         
   for($i=0;$i<count($checkbox);$i++)
   {
        $check_id = $checkbox[$i];


        $stockSql = 'SELECT stock FROM item WHERE itemNumber=:itemNumber';
            $stockStatement = $conn->prepare($stockSql);
            $stockStatement->execute(['itemNumber' => $itemNumber]);
            if($stockStatement->rowCount() > 0){
                //$row = $stockStatement->fetch(PDO::FETCH_ASSOC);
                //$quantity = $quantity + $row['stock'];
                echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Item already exists in DB. Please click the <strong>Update</strong> button to update the details. Or use a different Item Number.</div>';
                exit();
            } else {
                // Item does not exist, therefore, you can add it to DB as a new item
                // Start the insert process
                $insertItemSql = 'INSERT INTO item_po(itemNumber,itemName,stock,unitPrice,status,description,itemMinStock,itemMaxStock,itemVendor) VALUES (:itemNumber, :itemName,:stock, :unitPrice, :status, :description, :itemMinStock, :itemVendor)';

                $insertItemStatement = $conn->prepare($insertItemSql);
                $insertItemStatement->execute(['itemNumber' => $itemNumber, 'itemName' => $itemName, 'stock' => $stock, 'unitPrice' => $unitPrice, 'status' => $status, 'description' => $description, 'itemMinStock' => $itemMinStock, 'itemVendor' => $itemVendor   ]);

                echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Item failed to insert in database.</div>';
                exit();
        }
    }
}

?>