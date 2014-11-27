<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  <!-- Force Latest IE rendering engine -->

<meta name="description" content="<?php echo $application_description; ?>">
<meta name="keywords" content="<?php echo implode(', ', $application_keywords); ?>">
<meta name="author" content="<?php echo $application_authors; ?>">

<link rel="shortcut icon"  href="<?php echo base_url(); ?>assets/images/favicon.ico">

<title><?php echo $application_title; ?></title>

<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-language-english.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-language-english-indicator.css');?>">
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-theme-default.css');?>"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-theme-default-indicator.css');?>">

<?php $this->load->view($application_css); ?>
<script src="<?php echo base_url('assets/bower_components/offline/offline.min.js');?>"></script>
<!-- JS -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/js/offline.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/js/reconnect.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/js/requests.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/js/simulate.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/js/snake.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/offline.min.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/js/ui.js');?>"></script>

<!--script src="<?php echo base_url('assets/bower_components/offlinejs-simulate-ui/offline-simulate-ui.min.js');?>"></script-->

<script>
  $(function(){
Offline.options={
  // Should we check the connection status immediatly on page load.
  checkOnLoad: false,

  // Should we monitor AJAX requests to help decide if we have a connection.
  interceptRequests: true,

  // Should we automatically retest periodically when the connection is down (set to false to disable).
  reconnect: {
    // How many seconds should we wait before rechecking.
    initialDelay: 3
  },

  // Should we store and attempt to remake requests which fail while the connection is down.
  requests: true

  // Should we show a snake game while the connection is down to keep the user entertained?
  // It's not included in the normal build, you should bring in js/snake.js in addition to
  // offline.min.js.

};
        var
            $online = $('.online'),
            $offline = $('.offline');

        Offline.on('confirmed-down', function () {
            $online.fadeOut(function () {
                $offline.fadeIn();
            });
            $('.ui.dropdown').dropdown('destroy');
            $('.ui.dropdown').addClass('error');
            $('.ui.button').addClass('disabled');
            // $('a').attr('onclick','return false;');
        });

        Offline.on('confirmed-up', function () {
            $offline.fadeOut(function () {
                $online.fadeIn();
            });
            $('.ui.dropdown').dropdown('dropdown');
            $('.ui.dropdown').removeClass('error');
            $('.ui.button').removeClass('disabled');
            // $('a').removeAttr('onclick');
        });

    });
</script>
<?php $this->load->view($application_js); ?>
