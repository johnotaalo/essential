<html>

  <head><?php
    // Load system wide assets
    $this->load->view('system_head'); 
  ?></head>

  <body><?php
    // Load application body content
    // var_dump($application_body); die();
    foreach ($application_body as  $value) {
      $this->load->view($value);
    }
    
    // Load application footer
    $this->load->view($application_footer);
  ?></body>

</html>