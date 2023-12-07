<?php
$output="";
if(isset($_POST['submit'])){
    require_once "../../../Controllers/ProductController.php";
    
    require_once('./TCPDF/tcpdf.php');
    require_once('./TCPDF/config/tcpdf_config.php');

    // use TCPDF\TCPDF;
    $pd= new ProductController;
    $products=$pd->getAllProducts();

    // Create a new TCPDF object
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set the document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Yahia Mohammed Abdelrahman');
    $pdf->SetTitle('Products Report');
    $pdf->SetSubject('Products Report');

    // Add a new page to the document
    $pdf->AddPage();

    // Set the font and font size
    $pdf->SetFont('dejavusans', '', 12) ;
    
    $output.='
    <table class="table" id="dataTable">
                                   
    <tr>
        <th class="text-end">المنشأ</th>
        <th class="text-end">النوع</th>
        <th class="text-end">وصف</th>
        <th class="text-end">بيع</th>
        <th class="text-end">السعر</th>
        <th class="text-end">الكمية&nbsp;</th>
        <th class="text-end">الاسم&nbsp;</th>
        <th class="text-end">الرقم&nbsp;</th>
    </tr>
                                    
    ';
    foreach($products as $product){
        $output.='
        <tr>
            <td>'. $product['madein']   .'</td>
            <td>'. $product['type_name'].'</td>
            <td>'. $product['property'] .'</td>
            <td>'. $product['sellprice'].'</td>
            <td>'. $product['price']    .'</td>
            <td>'. $product['quantity'] .'</td>
            <td>'. $product['pname']    .'</td>
            <td>'. $product['sku']      .'</td>
         </tr>   
        ';
    }
    $output.=  '</table>';
    /* make a excel and print it as download.php 
    then take a copy of content and paste it in 
    a Excel file
     */ 
    
    // header('Content-Type: application/xls');
    // header('Content-Disposition:attachment;filname=reports.xls');
    // echo $output;

    // Write the HTML to the PDF
    $pdf->writeHTML($output, true, false, true, false, '');

    // Set the headers to download the file
    $pdf->Output('products_report.pdf', 'D');
    exit;
}else{
    echo "No data or error";
}
?>
