<!--
    Template Page   
-->
<html>
    <!--
        Head
    -->
    <head>
        <?php $this -> load->view($head) ?>
    </head>

    <body>

        <div id="header">
            <?php $this -> load->view($header); ?>

            <?php 
            if(isset($logged)){
            $this -> load->view('mnh/segments/nav-logged-in'); 
            }
            else{
               $this -> load->view('mnh/segments/nav-public'); 
            }
            ?>
        </div>

        <div id="content">
            <?php $this -> load->view($content); ?>
        </div>
        
        <div id="footer">
            <?php $this->load->view($footer); ?>
        </div>

    </body>

</html>