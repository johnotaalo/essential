<div class="ui grid">
  <div class="three wide column">
    <div class="ui vertical menu">
      <div class="item">
        <div class="ui input"><input type="text" placeholder="Search..."></div>
      </div>
      <div class="item">

        <i class="octicon octicon-list-unordered"></i> Fields
        <div class="menu list-items" id="field_list">
          <a class="active item" id="indicators" data-identifier="indicator_code" data-form="x-datatable"><i class="icon ion-toggle"></i>Indicators</a>
          <a class="item" id="questions" data-identifier="question_code" data-form="x-datatable"><i class="icon ion-help-circled"></i>Questions</a>
          <a class="item" id="resources" data-identifier="eq_code" data-form="x-datatable"><i class="icon ion-hammer"></i>Resources</a>
          <a class="item" id="supplies" data-identifier="supply_code" data-form="x-datatable"><i class="icon ion-ios7-box"></i>Supplies</a>
          <a class="item" id="equipment" data-identifier="eq_code" data-form="x-datatable"><i class="icon ion-ios7-box"></i>Equipment</a>
          <a class="item" id="hcw" data-identifier="id" data-form="x-datatable"><i class="icon ion-ios7-people"></i>Health Care Workers</a>
        </div>
      </div>
      <div class="item">
        <i class="ion-gear-a"></i> Admin
         <div class="menu list-items" id="admin_list">
          <a class="item" id="users" data-identifier="userId" data-form="x-datatable"><i class="icon ion-person-stalker"></i>Users</a>
        </div>
      </div>
      <div class="ui dropdown item">
        More <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item"><i class="edit icon"></i> Edit Profile</a>
          <a class="item"><i class="globe icon"></i> Choose Language</a>
          <a class="item"><i class="settings icon"></i> Account Settings</a>
        </div>
      </div>

      <a class="item">
        <i class="grid layout icon"></i> Browse
      </a>

    </div>
  </div>
  <div class="right floated twelve wide column" >

    <div class="ui segment stacked"  style="min-height:60%">
     
      <div class="ui menu">
      <div class="left menu">
        <a id="title" class="item disabled" style="color:#aaa !important;"></a>
        <a class="item" id="stats"><i class="icon ion-arrow-graph-up-left"></i> Stats</a>
      </div>
      <div class="right menu">
        <a class="item" id="add_row"><i class="icon ion-plus-round"></i> Add</a>
        <a class="item" id="upload"><i class="icon ion-upload"></i> Upload</a>
        <a class="item download" id="pdf"><i class="icon ion-document-text"></i> PDF</a>
        <a class="item download" id="excel"><i class="icon ion-document-text"></i> Excel</a>
      </div>
    </div>
    <div id="display">
  </div>
</div>
  </div>
</div>
<script>
var column_count;
$('#upload').click(function(){
  console.log('uploaded');
  $('#display').load(base_url+'upload/widget');
});

$('.list-items > a').click(function(){
  /**
  * Primary Key
  */
  identifier = $(this).attr('data-identifier');
  /**
  * Export Form / Type
  */
  form = $(this).attr('data-form');
  /**
   * Get Icon
   */
  icon = $(this).find('i').attr('class');

  $('.list-items a').removeClass('active');

  $(this).addClass('active');
  title = $(this).text();
  object = $(this).attr('id');
  $('#title').html('<i></i>'+title);
  $('#title i').addClass(icon);
  $.ajax({
    url:base_url+'admin/get/'+object+'/'+form+'/'+identifier,
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
      column_count=0;
      $.each(obj.title, function(k, v) {
        thead+='<th>'+v+'</th>';
        tfoot+='<th>'+v+'</th>';
        column_count++;
      });

      tfoot+='</tr></tfoot>';
      thead+='</tr></thead>';

      table+=thead+tfoot+'</table>';

      // console.log(table);
      $('#display').append(table);
      $('#display table').dataTable( {
        "sPaginationType": "full_numbers",
        "aaData": obj.data,
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
          $('td a', nRow).editable({
            url: base_url+'admin/edit/'+object,
          });
        }
      });    
      loadExport(base_url,object);
    }
  });
});

$('#add_row').click(function(){
  var table = $('#display table').DataTable();
  var new_row=[];
  
  for ( var i = 0; i < column_count; i++ ) {
new_row.push('<a class="editable">New Column</a>');
}

table.row.add( new_row ).draw();
});

/**
 * [loadExport description]
 * @param  {[type]} base_url     [description]
 * @param  {[type]} function_url [description]
 * @return {[type]}              [description]
 */
function loadExport(base_url,criteria) {
    $('#pdf').attr('data-url', base_url+'admin/get/'+criteria+'/dynamic_pdf');
    $('#excel').attr('data-url', base_url+'admin/get/'+criteria+'/dynamic_excel');
    
    $('.download').click(function() {
      url = $(this).attr('data-url');
      if (url != '') {
        window.open(url);
      }
    });

  }


</script>
