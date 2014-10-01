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
        </div>
        <div id="content">
            <?php $this -> load->view($content); ?>
        </div>
        <div id="footer">
            <?php
                $this->load->view($footer);
            ?>
        </div>
    </body>
</html>