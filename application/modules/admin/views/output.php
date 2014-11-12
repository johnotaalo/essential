<div class="ui grid">
  <div class="three wide column">
    <div class="ui vertical menu">
      <div class="item">
        <div class="ui input"><input type="text" placeholder="Search..."></div>
      </div>
      <div class="item">

        <i class="octicon octicon-list-unordered"></i> Fields
        <div class="menu" id="field_list">
          <a class="active item" id="indicators" data-identifier="indicator_code" data-form="x-datatable"><i class="ion-toggle"></i>Indicators</a>
          <a class="item" id="questions" data-identifier="question_code" data-form="x-datatable"><i class="ion-help-circled"></i>Questions</a>
          <a class="item" id="resources" data-identifier="eq_code" data-form="x-datatable"><i class="ion-hammer"></i>Resources</a>
          <a class="item" id="supplies" data-identifier="supply_code" data-form="x-datatable"><i class="ion-ios7-box"></i>Supplies</a>
          <a class="item" id="equipment" data-identifier="eq_code" data-form="x-datatable"><i class="ion-ios7-box"></i>Equipment</a>
          <a class="item" id="hcw" data-identifier="id" data-form="x-datatable"><i class="ion-ios7-people"></i>Health Care Workers</a>
        </div>
      </div>
      <a class="item">
        <i class="ion-gear-a"></i> Admin
      </a>
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
      <h5 id="title"></h5>
      <div id="display">

      </div>
    </div>
  </div>
</div>
<script>
$('#field_list a').click(function(){
  /**
  * Primary Key
  */
  identifier = $(this).attr('data-identifier');
  /**
  * Export Form / Type
  */
  form = $(this).attr('data-form');
  console.log(identifier);

  $('#field_list a').removeClass('active blue');
  $(this).addClass('active blue');
  title = $(this).text();
  object = $(this).attr('id');
  $('#title').text(title);
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
        "aaData": obj.data,
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
          $('td a', nRow).editable({
            url: base_url+'admin/edit/'+object,
          });
        }
      });
      $('#DataTables_Table_0_filter label').append(
        '<div class="ui corner label"> <i class="search icon"></i> </div>'
      );
      $('#DataTables_Table_0_filter label').addClass('ui labeled input');
      // $('.editable').editable({
      //   url: base_url+'admin/edit/'+object,
      // });
      // $(document).trigger('datatable_loaded');
    }
  });
});
</script>
