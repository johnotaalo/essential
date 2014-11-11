<?php
class Pdf_Handler extends MY_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->library('mpdf');
    $this->load->module('export/table_handler');
  }

  public function index()
  {

  }
/**
 * [loadPDF description]
 * @param  [type] $pdf [description]
 * @return [type]      [description]
 */
public function normal($data, $filename,$type) {
  switch($type){
    case 'normal':
    $data = $this->table_handler->normal($data);
    break;

    case 'dynamic':
    $data = $this->table_handler->dynamic($data);
    break;
  }


    //echo $data;die;
    $stylesheet = ('
        <style>
    input[type="text"]{
        width:200%;
    }
    input[type="number"]{
        width:400px;
    }
    table{
        width:1000px;
    }
    .break { page-break-before: always; }
    .success {
background: #cbc9c9;
color: #000;
border-color: #FFFFEE;
font: bold 100% sans-serif;}
    td:even{
        background:#eee;

    }
    th {
text-align: left;
background: #ddd;
}
.not-read{
background:#aaa;
}
.instruction{
font-weight:bold;
padding:3px;
width:1000px;
margin:0;
background:#fdde0e;

}
    </style>
    ');
    $html = ($data);
    $this->mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
    $this->mpdf->SetTitle('Maternal Newborn and Child Health Assessment');
    $this->mpdf->SetHTMLHeader('<em>Assessment Tool</em>');
    $this->mpdf->SetHTMLFooter('<em>Assessment Tool</em>');
    $this->mpdf->simpleTables = true;
    //$this->mpdf->WriteHTML($stylesheet, 1);
    $this->mpdf->WriteHTML($stylesheet.$html);
    $report_name = $filename . ".pdf";
    $this->mpdf->Output($report_name, 'I');
}
}
