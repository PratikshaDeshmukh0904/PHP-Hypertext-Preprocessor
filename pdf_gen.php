<?php
require_once 'FPDF/fpdf.php';
require_once 'connection.php';
$sql = "select * from tblexpense ";
$data=mysqli_query($conn,$sql);

if(isset($_POST['btn_pdf'])){
    
    $pdf = new FPDF(orientation: 'p',unit:'mm',size:'a4');
    $pdf->SetFont(family:'arial',style:'b',size:'14');
    $pdf->AddPage();
    $pdf->cell(w:'40',h:'10',txt:'ID',border:'1',ln:'0',align:'C');
    $pdf->cell(w:'40',h:'10',txt:'Date',border:'1',ln:'0',align:'C');
    $pdf->cell(w:'40',h:'10',txt:'Item',border:'1',ln:'0',align:'C');
    $pdf->cell(w:'40',h:'10',txt:'Cost',border:'1',ln:'1',align:'C');

    while($row = mysqli_fetch_assoc($data))
    {
        $pdf->cell(w:'40',h:'10',txt: $row['UserId'] ,border:'1',ln:'0',align:'C');
        $pdf->cell(w:'40',h:'10',txt: $row['ExpenseDate'],border:'1',ln:'0',align:'C');
        $pdf->cell(w:'40',h:'10',txt: $row['ExpenseItem'],border:'1',ln:'0',align:'C');
        $pdf->cell(w:'40',h:'10',txt: $row['ExpenseCost'],border:'1',ln:'1',align:'C');
    }
    $pdf->Output();
}



?>