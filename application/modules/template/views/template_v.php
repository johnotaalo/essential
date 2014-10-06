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
<<<<<<< HEAD
    <div class="menu-btn"></div>
    <nav class="pushy pushy-left">
    <div class="ui vertical menu">
  <a class="active teal item">
    Inbox
    <div class="ui teal label">1</div>
  </a>
  <a class="item">
    Spam
    <div class="ui label">51</div>
  </a>
  <a class="item">
    Updates
    <div class="ui label">1</div>
  </a>
  <div class="item">
    <div class="ui small icon input">
      <input type="text" placeholder="Search mail...">
      <i class="search icon"></i>
    </div>
  </div>
</div>
</nav>
    <div class="site-overlay"></div>
        <div id="header" class="push">
=======

        <div id="header">
>>>>>>> 7749f2ba9e493a496f77faec4ca7e0489a27a98b
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
<<<<<<< HEAD
        <div id="content" class="push">
            <?php $this -> load->view($content); ?>
        </div>
        <div id="footer" class="push">
            <?php
                $this->load->view($footer);
            ?>
=======

        <div id="content">
            <?php $this -> load->view($content); ?>
        </div>
        
        <div id="footer">
            <?php $this->load->view($footer); ?>
>>>>>>> 7749f2ba9e493a496f77faec4ca7e0489a27a98b
        </div>

    </body>

</html>