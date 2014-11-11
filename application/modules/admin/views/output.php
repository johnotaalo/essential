<div class="ui grid">
  <div class="three wide column">
    <div class="ui vertical menu">
      <div class="item">
        <div class="ui input"><input type="text" placeholder="Search..."></div>
      </div>
      <div class="item">
<<<<<<< HEAD
        <i class="home icon"></i> Fields
        <div class="menu">
          <a class="active item">Indicators</a>
          <a class="item">Questions</a>
          <a class="item">Resources</a>
          <a class="item">Supplies</a>
          <a class="item">Equipment</a>
        </div>
      </div>
      <a class="item">
        <i class="grid layout icon"></i> Browse
      </a>
      <a class="item">
        <i class="mail icon"></i> Messages
=======
        <i class="octicon octicon-list-unordered"></i> Fields
        <div class="menu" id="field_list">
          <a class="active item" id="indicators"><i class="ion-toggle"></i>Indicators</a>
          <a class="item" id="questions"><i class="ion-help-circled"></i>Questions</a>
          <a class="item" id="resources"><i class="ion-hammer"></i>Resources</a>
          <a class="item" id="supplies"><i class="ion-ios7-box"></i>Supplies</a>
          <a class="item" id="equipment"><i class="ion-ios7-box"></i>Equipment</a>
          <a class="item" id="hcw"><i class="ion-ios7-people"></i>Health Care Workers</a>
        </div>
      </div>
      <a class="item">
        <i class="ion-gear-a"></i> Admin
>>>>>>> 620c6d83b2ade2cf5ec13e70e9068595b16c23d6
      </a>
      <div class="ui dropdown item">
        More <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item"><i class="edit icon"></i> Edit Profile</a>
          <a class="item"><i class="globe icon"></i> Choose Language</a>
          <a class="item"><i class="settings icon"></i> Account Settings</a>
        </div>
      </div>
<<<<<<< HEAD
    </div>
  </div>
  <div class="right floated twelve wide column">
    <div class="ui segment stacked">

    </div>
  </div>
</div>
=======
      <a class="item">
        <i class="grid layout icon"></i> Browse
      </a>

    </div>
  </div>
  <div class="right floated twelve wide column" >

    <div class="ui segment stacked"  style="min-height:60%">
      <h5 id="title"></h5>
      <div id="display">

      </div>
    </div>
  </div>
</div>
<script>
$('#field_list a').click(function(){
  $('#field_list a').removeClass('active blue');
  $(this).addClass('active blue');
  title = $(this).text();
  object = $(this).attr('id');
  $('#title').text(title);
  $.ajax({
    url:base_url+'admin/get/'+object+'/datatable',
    beforeSend: function(xhr) {
      $('#display').empty();
      $('#display').append('<div class="loader" >Loading...</div>');
    },
    success: function(data) {
      obj = jQuery.parseJSON(data);
      $('#display').empty();
      // console.log(obj);
      table = '<table style="font-size:10px !important">';
      tr='';
      th='';
      thead='';
      tfoot='';
      counter=0;

      thead+='<thead><tr>';
      tfoot+='<tfoot><tr>';

      $.each(obj.title, function(k, v) {
        thead+='<th>'+v+'</th>';
        tfoot+='<th>'+v+'</th>';
      });

      tfoot+='</tr></tfoot>';
      thead+='</tr></thead>';

      table+=thead+tfoot+'</table>';

      // console.log(table);
      $('#display').append(table);
      $('#display table').dataTable( {
        "sPaginationType": "full_numbers",
        "aaData": obj.data
    } );
    $('#DataTables_Table_0_filter label').append(
      '<div class="ui corner label"> <i class="search icon"></i> </div>'
    );
    $('#DataTables_Table_0_filter label').addClass('ui labeled input');
      // $(document).trigger('datatable_loaded');
    }
  });
});
</script>
>>>>>>> 620c6d83b2ade2cf5ec13e70e9068595b16c23d6
