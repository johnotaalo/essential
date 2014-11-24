<?php
class Export extends MY_Controller{

  function __construct()
  {
    parent::__construct();
    /**
     * Load Filetype Specific Export Handlers
     */
    $this->load->module('export/excel_handler');
    $this->load->module('export/pdf_handler');
  $this->load->module('export/table_handler');
  $this->load->module('export/datatable_handler');
  }

  public function index()
  {

  }
  /**
   * [generate description]
   * @param  [type] $data     [description]
   * @param  [type] $filename [description]
   * @param  [type] $form     [description]
   * @return [type]           [description]
   */
  public function generate($data, $filename, $form,$identifier='') {
    // var_dump($identifier);
      switch ($form) {
          case 'table':
              $result = $this->table_handler->normal($data);
              break;

          case 'dynamic_table':
              $result = $this->table_handler->dynamic($data);
              break;

          case 'excel':
              $this->excel_handler->normal($data, $filename);
              $result = '';
              break;
          case 'dynamic_excel':
              $this->excel_handler->dynamic($data, $filename);
              $result = '';
              break;

          case 'editable':
              $result = $this->table_handler->normal($data, 'editable');
              break;

          case 'pdf':
              $this->pdf_handler->normal($data, $filename,'normal');
              $result = '';
              break;

          case 'dynamic_pdf':
              $this->pdf_handler->normal($data, $filename,'dynamic');
              $result = '';
              break;
          case 'datatable':
            $result = $this->datatable_handler->normal($data);
              break;
          case 'x-datatable':
              $result = $this->datatable_handler->editable($data,$identifier);
              break;
      }
      return $result;
  }
}
