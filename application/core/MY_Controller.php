<?php

error_reporting(1);
ini_set('memory_limit', '-1');

//# Extend CI_Controller to include Doctrine Entity Manager

class MY_Controller extends MX_Controller
{
	public $questions,$indicators,$commodities,$survey,$survey_form;

    public function __construct() {
        parent::__construct();
        
       
// $this->survey_form='';
        // Load IMCI defaults if one is accessing IMCI
        if($this->uri->segment(1) === 'imci')
        {
            $this->load_imci_defaults();
        }

    }
    
    public function load_imci_defaults()
    {
        $this->meta_description = 'The INtegrated Management of Childhood Infections';
        $this->meta_keywords = array('html', 'css', 'javascript', 'bootstrap', 'codeigniter', 'nairobi', 'kenya');
        $this->meta_author = 'HP-Strathmore Lab, Clinton Health Access Initiative, @Biggie_1969';

        $this->nav_brand = 'IMCI Platform';
        $this->nav_brand_title = 'Small sub-title here...';

        $footer_links = array(
            anchor('#', 'About', 'About'),
            anchor('#', 'Contacts', 'Contacts'),
            anchor('#', 'Help', 'Get Help'),
        );
        $this->footer_links = implode(' | ', $footer_links);

        $this->company_name = 'Integrated Management of Childhood Infections';
        $this->company_link_title = 'Link title goes here...';

        $extra_footer_links = array(
            anchor('#', 'Privacy Policy', 'Link title'),
            anchor('#', 'Terms of Use', 'Link title'),
        );
        $this->extra_footer_links = implode(' | ', $extra_footer_links);
    }

    public function imci_template($template, $data)
    {
        $this->load->module('template');
        $this->template->imci($data);
    }
    public function generateData($data, $filename, $form) {
        switch ($form) {
            case 'table':
                $result = $this->loadTable($data);
                break;

            case 'excel':
                $this->loadExcel($data, $filename);
                $result = '';
                break;

            case 'editable':
                $result = $this->loadTable($data, 'editable');
                break;

            case 'pdf':
                $this->loadPDF($data, $filename);
                $result = '';
                break;
        }
        return $result;
    }
    
    /**
     * [loadExcel description]
     * @param  [type] $data     [description]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
    public function loadExcel($data, $filename) {
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
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, ucwords(str_replace('comm','commodity',str_replace('ar','',str_replace('as','',str_replace('ae','',str_replace('ac','',str_replace('li','',str_replace('lq','',str_replace('fac', 'facility', str_replace('_', ' ', $k)))))))))));
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
     * [loadPDF description]
     * @param  [type] $pdf [description]
     * @return [type]      [description]
     */
    public function loadPDF($data, $filename) {
        $data = $this->loadTable($data);
        
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
        $this->load->library('mpdf');
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
    
    /**
     * [loadTable description]
     * @param  [type] $data     [description]
     * @param  string $editable [description]
     * @return [type]           [description]
     */
    public function loadTable($data, $editable = '') {
        $tmpl = array('table_open' => '<div class="table-container"><table cellpadding="4" cellspacing="0" class="table table-condensed table-striped table-bordered table-hover dataTable">', 'heading_row_start' => '<tr>', 'heading_row_end' => '</tr>', 'heading_cell_start' => '<th>', 'heading_cell_end' => '</th>', 'row_start' => '<tr>', 'row_end' => '</tr>', 'cell_start' => '<td>', 'cell_end' => '</td>', 'row_alt_start' => '<tr>', 'row_alt_end' => '</tr>', 'cell_alt_start' => '<td>', 'cell_alt_end' => '</td>', 'table_close' => '</table></div>');
        
        $this->table->set_template($tmpl);
        
        if ($custom_titles == '') {
            $pk = 0;
            
            //set table headers
            foreach ($data[0] as $title => $column) {
                if ($pk != 0) {
                    $titles[] = ucwords(str_replace('comm','commodity',str_replace('ar','',str_replace('as','',str_replace('ae','',str_replace('ac','',str_replace('li','',str_replace('lq','',str_replace('fac', 'facility', str_replace('_', ' ', $title))))))))));
                } else {
                    $primary_key = $title;
                }
                $pk++;
            }
            $this->table->set_heading($titles);
        } else {
            $this->table->set_heading($custom_titles);
        }
        $counter = 0;
        foreach ($data as $key => $columns) {
            $row = array();
            foreach ($columns as $column => $value) {

                if ($column != $primary_key) {
                    switch ($editable) {
                        case 'editable':
                            $row[] = '<a id="' . $column . '_' . $counter . '" data-type="text" data-name="'.$column.'" data-pk="'.$columns[$primary_key].'" class="editable">' . $value . '</a>';
                            break;

                        default:
                            $row[] = $value;
                            break;
                    }
                }
            }
            $counter++;
            
            //echo '<pre>';print_r($row);echo '</pre>';die;
            $this->table->add_row($row);
        }
        $generated_table = $this->table->generate();
        return $generated_table;
    }

}


