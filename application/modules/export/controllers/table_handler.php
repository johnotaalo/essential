<?php
class Table_Handler extends MY_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->library('table');
  }

  public function index()
  {

  }
/**
 * [normal description]
 * @param  [type] $data     [description]
 * @param  string $editable [description]
 * @return [type]           [description]
 */
public function normal($data, $editable = '') {
    if ($custom_titles == '') {
        $pk = 0;

        //set table headers
        foreach ($data[0] as $title => $column) {
            if ($pk != 0) {
                $titles[] = ucwords(str_replace('_', ' ',str_replace('comm','commodity',str_replace('ar_','',str_replace('as_','',str_replace('ae_','',str_replace('ac_','',str_replace('li_','',str_replace('lq_','',str_replace('fac_', 'facility', $title))))))))));
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
		/**
		 * [dynamic description]
		 * @param  [type] $data [description]
		 * @return [type]       [description]
		 */
		public function dynamic($data) {

						//set table headers
						foreach ($data['columns'] as $title) {
								$titles[] = ucwords(str_replace('_', ' ',str_replace('comm','commodity',str_replace('ar_','',str_replace('as_','',str_replace('ae_','',str_replace('ac_','',str_replace('li_','',str_replace('lq_','',str_replace('fac', 'facility',  $title))))))))));
						}
						$this->table->set_heading($titles);

				$counter = 0;
				foreach ($data['data'] as $key => $columns) {
						$row = array();
						foreach($data['columns'] as $title){
								if (array_key_exists($title,$columns)) {
														$row[] = $columns[$title];
										}


						else{
							$row[] = 0;
						}

						$counter++;
				}
				$this->table->add_row($row);
			}
				$generated_table = $this->table->generate();
				return $generated_table;
		}

}
