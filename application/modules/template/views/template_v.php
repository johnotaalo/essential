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
            <?php $this -> load->view($header); ?>

            <?php 
if(isset($logged)){
$this -> load->view('mnh/segments/nav-logged-in'); 
}
else{
   $this -> load->view('mnh/segments/nav-public'); 
}?> 
            
        </div>
        <div id="content" class="push">
            <?php $this -> load->view($content); ?>
        </div>
        <div id="footer" class="push">
            <?php
                $this->load->view($footer);
            ?>
        </div>
    </body>
</html>