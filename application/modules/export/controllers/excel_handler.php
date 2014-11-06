<?php
class Excel_Handler extends MY_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->library('PHPExcel');
  }

  public function index()
  {

  }
  /**
   * [normal description]
   * @param  [type] $data     [description]
   * @param  [type] $filename [description]
   * @return [type]           [description]
   */
  public function normal($data, $filename) {
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getProperties()->setCreator("Rufus Mbugua");
      $objPHPExcel->getProperties()->setLastModifiedBy("Rufus Mbugua");
      $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
      $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
      $objPHPExcel->getProperties()->setDescription(" ");

      // Add some data
      //  echo date('H:i:s') . " Add some data\n";
      $objPHPExcel->setActiveSheetIndex(0);

      $rowExec = 1;

      //Looping through the cells
      $column = 0;
      //echo '<pre>';print_r($data);echo'</pre>';die;
      foreach ($data[0] as $k=>$cell) {

          //echo $column . $rowExec; die;
          $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, ucwords(str_replace('comm','commodity',str_replace('ar_','',str_replace('as_','',str_replace('ae_','',str_replace('ac_','',str_replace('li_','',
          str_replace('lq_','',str_replace('fac', 'facility', str_replace('_', ' ', $k)))))))))));
          $objPHPExcel->getActiveSheet()->getStyle(PHPExcel_Cell::stringFromColumnIndex($column) . $rowExec)->getFont()->setBold(true)->setSize(14);
          $objPHPExcel->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($column))->setAutoSize(true);

          $column++;
      }
      $rowExec = 2;
      foreach ($data as $key=>$rowset) {

          //Looping through the cells per facility
          $column = 0;
          //var_dump($rowset);die;
          foreach ($rowset as $cell) {
              $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, $cell);
              $column++;
          }
          $rowExec++;
      }

      //die ;

      // Rename sheet
      //  echo date('H:i:s') . " Rename sheet\n";
      $objPHPExcel->getActiveSheet()->setTitle('Simple');

      // Save Excel 2007 file
      //echo date('H:i:s') . " Write to Excel2007 format\n";
      $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

      // We'll be outputting an excel file
      header('Content-type: application/vnd.ms-excel');

      // It will be called file.xls
      header('Content-Disposition: attachment; filename=' . $filename . '.xlsx');

      // Write file to the browser
      $objWriter->save('php://output');

      // Echo done
      //echo date('H:i:s') . " Done writing file.\r\n";


  }
  /**
   * [dynamic description]
   * @param  [type] $data     [description]
   * @param  [type] $filename [description]
   * @return [type]           [description]
   */
  public function dynamic($data, $filename) {
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getProperties()->setCreator("Rufus Mbugua");
      $objPHPExcel->getProperties()->setLastModifiedBy("Rufus Mbugua");
      $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
      $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
      $objPHPExcel->getProperties()->setDescription(" ");

      // Add some data
      //  echo date('H:i:s') . " Add some data\n";
      $objPHPExcel->setActiveSheetIndex(0);

      $rowExec = 1;

      //Looping through the cells
      $column = 0;
      //echo '<pre>';print_r($data);echo'</pre>';die;
      foreach ($data['columns'] as $cell) {

          //echo $column . $rowExec; die;
          $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, ucwords(str_replace('comm','commodity',str_replace('ar_','',str_replace('as_','',str_replace('ae_','',str_replace('ac_','',str_replace('li_','',
          str_replace('lq_','',str_replace('fac', 'facility', str_replace('_', ' ', $cell)))))))))));
          $objPHPExcel->getActiveSheet()->getStyle(PHPExcel_Cell::stringFromColumnIndex($column) . $rowExec)->getFont()->setBold(true)->setSize(14);
          $objPHPExcel->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($column))->setAutoSize(true);

          $column++;
      }
      $rowExec = 2;
      foreach ($data['data'] as $key=>$rowset) {

          //Looping through the cells per facility
          $column = 0;
          //var_dump($rowset);die;
          foreach($data['columns'] as $title){
                if (array_key_exists($title,$rowset)) {
                            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, $rowset[$title]);
                    }

            else{
              $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, "");
            }

          $column++;
      }
      $rowExec++;
    }

      //die ;

      // Rename sheet
      //  echo date('H:i:s') . " Rename sheet\n";
      $objPHPExcel->getActiveSheet()->setTitle('Simple');

      // Save Excel 2007 file
      //echo date('H:i:s') . " Write to Excel2007 format\n";
      $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

      // We'll be outputting an excel file
      header('Content-type: application/vnd.ms-excel');

      // It will be called file.xls
      header('Content-Disposition: attachment; filename=' . $filename . '.xlsx');

      // Write file to the browser
      $objWriter->save('php://output');

      // Echo done
      //echo date('H:i:s') . " Done writing file.\r\n";


  }
}
