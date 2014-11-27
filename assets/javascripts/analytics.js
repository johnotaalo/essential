function startAnalytics(base_url, county, survey, survey_category) {
  var chart, div;
  var subID, parentDiv;
  var facility, smallText;
  var district;
  var currentChart, currentDiv;
  var selectedOption;
  var appendToTitle, filter, click, neverList, noList;
  var comparing;
  var extraStat;
  var criteria, value, stat_for, statistic, indicator_type;
  var countyClicked;
  var rawUrl;
  var procedure, statistic;
  criteria = district = value = stat_for = statistic = indicator_type = '';
  loadIndicatorTypes();
  var section;
  var scope;
  var facility_count;
  var district_count;
  /**
   * Run on Page Load
   */
  survey_category = '';
  loadCounties();
  if (county === '') {
    county = 'Unselected';
  }
  $('.analytics_row').hide();
  $('#stats').show();
  loadSurvey(survey);
  if (survey_category != '') {
    if (county == 'Unselected') {
      variableHandler('national', county, district, facility, survey,
        survey_category, indicator_type);
    } else {
      if (district == '') {
        variableHandler('county', county, district, facility, survey,
          survey_category, indicator_type);
      } else {
        variableHandler('district', county, district, facility, survey,
          survey_category, indicator_type);
      }
    }
    getReportingData(base_url, survey, survey_category, '#reporting_left',
      'reportingleft');
    getReportingData(base_url, survey, survey_category, '#reporting_right',
      'reportingright');
  }
  // if (county !== '') {
  //     $("#county_select").parent().find(".menu ").filter(function(index) {
  //         return county === $(this).attr('value');
  //     }).prop("selected", "selected");
  // }
  // if (survey_category !== '') {
  //     $("select#survey_category").find("option").filter(function(index) {
  //         return survey_category === $(this).attr('value');
  //     }).prop("selected", "selected");
  // }
  if (survey !== '') {
    $("select#survey_type").find("option").filter(function(index) {
      return survey === $(this).attr('value');
    }).prop("selected", "selected");
  }
  $('#sectionList li').click(function() {
    $('#sectionList').find('li').removeClass('active');
    $(this).addClass('active');
  });
  $('#survey_type').change(function() {
    survey_type = $('#survey_type').val();

    if(survey_type == 'hcw')
    {
      //alert(survey_type);
      $('#survey_category').addClass('disabled');
    }else{
      $('#survey_category').removeClass('disabled');
    }
    district_select = $('#sub_county_select').val();
    //alert(district_select)
    if (district_select !== 'Please Select a District' && district_select !==
      'All Sub-Counties Selected') {
      district = district_select;
    } else {
      district = '';
    }

    survey = $(this).attr('value');
    if (survey_category != '') {
      loadSimpleGraph(base_url, 'analytics/getFacilityProgress/' + survey +
        '/' + survey_category,
        '#reporting_stat .outer .inner .content .inner-graph');
    }

    loadSurvey(survey);
  });
  $('#survey_category').change(function() {
    district = $("#sub_county_select").val();
    // alert(district);
    survey = $('#survey_type').val();
    survey_category = $('#survey_category').val();
    // alert(survey_category);
    if (district != '') {
      district = encodeURIComponent(district);
      loadFacilities(base_url, district);
      scope = 'district';
      getFacilityCount(base_url, '', '', district, survey,
        survey_category);
    } else {
      district = '';
      if (county != '' && county != 'Unselected') {
        scope = 'county';
        getFacilityCount(base_url, '', county, '', survey,
          survey_category);

      } else {
        scope = 'national';
        getFacilityCount(base_url, 'national', '', '', survey,
          survey_category);
      }
    }
    if (survey != '') {

      getReportingData(base_url, survey, survey_category,
        '#reporting_left', 'reportingleft');
      getReportingData(base_url, survey, survey_category,
        '#reporting_right', 'reportingright');
      section = trim($('.collapse.in').parent().attr('id'), 'mnh-');
      section = trim(section, 'ch-');
      section = trim(section, 'hcw-');
      $('#statistic_summary').show();
      $('#survey_stat').show();
      $('#survey_stat').addClass('animated bounceInUp');
      $('#reporting_stat').show();
      $('#reporting_stat').addClass('animated bounceInUp');
      $('#county_stat').show();
      $('#county_stat').addClass('animated bounceInUp');
      loadSimpleGraph(base_url, 'analytics/getFacilityProgress/' + survey +
        '/' + survey_category,
        '#reporting_stat .outer .inner .content .inner-graph');
      loadSimpleGraph(base_url, 'analytics/getCountyProgress/' + survey +
        '/' + survey_category,
        '#county_stat .outer .inner .content .inner-graph');

      variableHandler(scope, county, district, facility, survey,
        survey_category, indicator_type, section);
    }
    // variableHandler('national', county, district, facility, survey, survey_category, indicator_type);
  });

//Modal Link
$('.modal-link').click(function(){
  if (district != '') {
      district = encodeURIComponent(district);
      scope = 'district';
      value = district;
    } else {
      district = '';
      if (county != '' && county != 'Unselected') {
        scope = 'county';
        value = county;
      } else {
        scope = 'national';
        value = 'Aggregated';
      }
    }
  data = $(this).attr('data-modal');
  switch(data){
    case 'facility_reporting':
      url = 'analytics/getSurveyInfo/'+ survey + '/' + survey_category +'/'+scope +'/' + value;
      title = 'Facility Reporting';
    break;
  }

  form = 'datatable';
// alert(base_url+url+'/'+form);
  showList(base_url,url+'/'+form,title)
});


  $('.ui.selection.dropdown').find('input').change(function() {
    // alert($(this).val());
    if ($(this).parent().find('.text').text() != 'Choose a Sub County' &&
      $(this).parent().find('.text').text() != 'Choose a Facility' && $(
        this).parent().find('.text').text() != 'Choose a County') {
      $(this).parent().css({
        'background': '#428bca',
        'color': 'white'
      });
    } else {
      $(this).parent().css({
        'background': '#fff',
        'color': 'rgba(0, 0, 0, 0.8)'
      });
    }
  });
  $('#county_select').change(function() {
    county = $(this).val();
    survey = $('#survey_type').val();
    survey_category = $('#survey_category').val();
    section = trim($('.collapse.in').parent().attr('id'), 'mnh-');
    section = trim(section, 'ch-');
    section = trim(section, 'hcw-');

    if (county != '' && county != 'All Counties Selected') {
      $('#district_stat .outer .inner .content .text #county').text(
        county);
      county = encodeURIComponent(county);
      district_count = loadDistricts(base_url, county);
      $('#district_stat').show();
      $('#district_stat').addClass('animated bounceInUp');
      $('#district_stat .outer .inner .content .digit').animateNumber({
        number: district_count
      });
      getFacilityCount(base_url, '', county, '', survey, survey_category);

      //district = $('select#sub_county_select option:selected').text();

      scope = 'county';


    } else if (county == 'All Counties Selected') {

      scope = 'national';
      $('#district_stat').hide();
      $('#district_stat').removeClass('animated bounceInUp');
      getFacilityCount(base_url, 'national', '', '', survey,
        survey_category);
      $('#county_select').parent().dropdown('restore defaults');
    }
    // alert(scope);


    variableHandler(scope, county, district, facility, survey,
      survey_category, indicator_type, section);

  });
  $('#sub_county_select').change(function() {
    district = $('#sub_county_select').val();
    if (district != '') {
      district = encodeURIComponent(district);
      loadFacilities(base_url, district);
      scope = 'district';
      survey = $('#survey_type').val();
      survey_category = $('#survey_category').val();
      section = trim($('.collapse.in').parent().attr('id'), 'mnh-');
      section = trim(section, 'ch-');
      section = trim(section, 'hcw-');
      getFacilityCount(base_url, '', '', district, survey,
        survey_category);
      variableHandler(scope, county, district, facility, survey,
        survey_category, indicator_type, section);
    }
  });
  $('#facility_select').change(function() {
    facility = $(this).val();
    if (facility != '') {
      facility = encodeURIComponent(facility);
      scope = 'facility';
      // survey = $('#survey_type').val();
      // survey_category = $('#survey_category').val();
      section = trim($('.collapse.in').parent().attr('id'), 'mnh-');
      section = trim(section, 'ch-');
      section = trim(section, 'hcw-');
      variableHandler(scope, county, district, facility, survey,
        survey_category, indicator_type, section);
    }
  });

  $('select#indicator_types').change(function() {
    indicator_type = $('select#indicator_types option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler('national', county, district, facility, survey,
        survey_category, indicator_type);
    } else {
      if (district == '') {
        subHandler('county', county, district, facility, survey,
          survey_category, indicator_type);
      } else {
        subHandler('district', county, district, facility, survey,
          survey_category, indicator_type);
      }
    }
  });

  $('select#indicator_types1').change(function() {
    indicator_type2 = $('select#indicator_types1 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler2('national', county, district, facility, survey,
        survey_category, indicator_type2);
    } else {
      if (district == '') {
        subHandler2('county', county, district, facility, survey,
          survey_category, indicator_type2);
      } else {
        subHandler2('district', county, district, facility, survey,
          survey_category, indicator_type2);
      }
    }
  });

  $('select#indicator_types2').change(function() {
    indicator_type4 = $('select#indicator_types2 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler4('national', county, district, facility, survey,
        survey_category, indicator_type4);
    } else {
      if (district == '') {
        subHandler4('county', county, district, facility, survey,
          survey_category, indicator_type4);
      } else {
        subHandler4('district', county, district, facility, survey,
          survey_category, indicator_type4);
      }
    }
  });

  $('select#indicator_types3').change(function() {
    indicator_type6 = $('select#indicator_types3 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler6('national', county, district, facility, survey,
        survey_category, indicator_type6);
    } else {
      if (district == '') {
        subHandler6('county', county, district, facility, survey,
          survey_category, indicator_type6);
      } else {
        subHandler6('district', county, district, facility, survey,
          survey_category, indicator_type6);
      }
    }
  });



   $('select#assessment_types').change(function() {
    assessment_types = $('select#assessment_types option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler1('national', county, district, facility, survey,
        survey_category, assessment_types);
    } else {
      if (district == '') {
        subHandler1('county', county, district, facility, survey,
          survey_category, assessment_types);
      } else {
        subHandler1('district', county, district, facility, survey,
          survey_category, assessment_types);
      }
    }
  });


   $('select#assessment_types1').change(function() {
    assessment_types3 = $('select#assessment_types1 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler3('national', county, district, facility, survey,
        survey_category, assessment_types3);
    } else {
      if (district == '') {
        subHandler3('county', county, district, facility, survey,
          survey_category, assessment_types3);
      } else {
        subHandler3('district', county, district, facility, survey,
          survey_category, assessment_types3);
      }
    }
  });

   

   $('select#assessment_types2').change(function() {
    assessment_types5 = $('select#assessment_types2 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler5('national', county, district, facility, survey,
        survey_category, assessment_types5);
    } else {
      if (district == '') {
        subHandler5('county', county, district, facility, survey,
          survey_category, assessment_types5);
      } else {
        subHandler5('district', county, district, facility, survey,
          survey_category, assessment_types5);
      }
    }
  });

   $('select#assessment_types3').change(function() {
    assessment_types7 = $('select#assessment_types3 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler7('national', county, district, facility, survey,
        survey_category, assessment_types7);
    } else {
      if (district == '') {
        subHandler7('county', county, district, facility, survey,
          survey_category, assessment_types7);
      } else {
        subHandler7('district', county, district, facility, survey,
          survey_category, assessment_types7);
      }
    }
  });

   $('select#finding_types').change(function() {
    finding_types8 = $('select#finding_types option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler8('national', county, district, facility, survey,
        survey_category, finding_types8);
    } else {
      if (district == '') {
        subHandler8('county', county, district, facility, survey,
          survey_category, finding_types8);
      } else {
        subHandler8('district', county, district, facility, survey,
          survey_category, finding_types8);
      }
    }
  });

   $('select#finding_types1').change(function() {
    finding_types9 = $('select#finding_types1 option:selected').attr(
      'value');
    // console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler9('national', county, district, facility, survey,
        survey_category, finding_types9);
    } else {
      if (district == '') {
        subHandler9('county', county, district, facility, survey,
          survey_category, finding_types9);
      } else {
        subHandler9('district', county, district, facility, survey,
          survey_category, finding_types9);
      }
    }
  });

   $('select#finding_types2').change(function() {
    finding_types10 = $('select#finding_types2 option:selected').attr(
      'value');
     //console.log(indicator_type);
    if (county == 'Unselected') {
      subHandler10('national', county, district, facility, survey,
        survey_category, finding_types10);
    } else {
      if (district == '') {
        subHandler10('county', county, district, facility, survey,
          survey_category, finding_types10);
      } else {
        subHandler10('district', county, district, facility, survey,
          survey_category, finding_types10);
      }
    }
  });



  /**
   * [description]
   * @return {[type]} [description]
   */
  $('.sizer').click(function() {
    graph_url = $(this).attr('data-url');
    graph_text = $(this).attr('data-text');
    data_parent = $(this).attr('data-parent');
    data_for = $(this).attr('data-for');
    statistics = $(this).attr('data-statistic') + '_raw';
    raw_url = '';
    if (county == 'Unselected') {
      raw_url = setRawUrl('national', county, district, facility, survey,
        survey_category, data_for, data_parent, statistics);
    } else {
      if (district == '' || district == 'Please Select a District') {
        raw_url = setRawUrl('county', county, district, facility, survey,
          survey_category, data_for, data_parent, statistics);
      } else {
        raw_url = setRawUrl('district', county, district, facility,
          survey, survey_category, data_for, data_parent, statistics);
      }
    }
    showEnlargedGraph(base_url, graph_url, graph_text, raw_url);
  });

  //Change Event for District Select
  $('select#compare_1').change(function() {
    $("#graph_10").empty();
    compar2 = $('select#compare_1 option:selected').text();
    compar2 = encodeURIComponent(compar2);
    $("#graph_10").load(currentChart + compare + '/' + compar2 + '/' +
      survey + '/' + extraStat);
    //$('#graph_10').load(currentChart+'district/'+district+'/ch/'+extraStat);
  });
  $('select#compare_2').change(function() {
    $("#graph_11").empty();
    compar = $('select#compare_2 option:selected').text();
    compar = encodeURIComponent(compar);
    $("#graph_11").load(currentChart + compare + '/' + compar + '/' +
      survey + '/' + extraStat);
    //$('#graph_10').load(currentChart+'district/'+district+'/ch/'+extraStat);
  });
  /**
   * Collapse handler
   */
  $('.panel-collapse.collapse.in').parent().find('.panel-heading h4 a i.fa').attr(
    'class', 'fa fa-chevron-down');
  //Handling Collapses
  $('.panel-collapse').on('show.bs.collapse', function() {
    section = trim($(this).parent().attr('id'), 'mnh-');
    section = trim(section, 'ch-');
    section = trim(section, 'hcw-');
    // alert(section);
    $(this).parent().find('.panel-heading h4 a i.fa').attr('class',
      'fa fa-chevron-down');
    $(this).parent().find('.panel-heading h4 a span .txt').text(
      'Click to Minimize');
    $('.chart div').width($('.chart div').parent().width());
    variableHandler(scope, county, district, facility, survey,
      survey_category, indicator_type, section);
    //$('.panel-collapse collapse in').collapse('hide');
    //$(this).collapse('show');
  })
  $('.panel-collapse').on('hide.bs.collapse', function() {
    $(this).parent().find('.panel-heading h4 a i.fa').attr('class',
      'fa fa-chevron-right');
    $(this).parent().find('.panel-heading h4 a span .txt').text(
      'Click to Expand');
    //$('.panel-collapse collapse in').collapse('hide');
    //$(this).collapse('show');
  });

}

function loadSurvey(survey) {
    $('.analytics_row').hide();
    $('#reporting-parent').show();
    $('.analytics_row[data-survey="' + survey + '"]').show();
    $.ajax({
      url: base_url + 'analytics/getSectionsChosen/' + survey,
      beforeSend: function(xhr) {
        xhr.overrideMimeType("text/plain; charset=x-user-defined");
      },
      success: function(data) {
        obj = jQuery.parseJSON(data);
        // console.log(obj);
        $('#sectionList').empty();
        $('#sectionList').append(obj);
      }
    });
  }
  /**
   * [getReportingData description]
   * @param  {[type]} base_url        [description]
   * @param  {[type]} survey_type     [description]
   * @param  {[type]} survey_category [description]
   * @param  {[type]} container       [description]
   * @return {[type]}                 [description]
   */
function getReportingData(base_url, survey_type, survey_category, container,
  option) {
  progressRow = '';
  $.ajax({
    async: false,
    url: base_url + 'analytics/getAllReportedCounties/' + survey_type +
      '/' + survey_category + '/' + option,
    beforeSend: function(xhr) {
      $(container).empty();
      $(container).append('<div class="loader" >Loading...</div>');
      xhr.overrideMimeType("text/plain; charset=x-user-defined");
    },
    success: function(data) {
      obj = null;
      obj = jQuery.parseJSON(data);
      //console.log(obj);
      $.each(obj, function(k, v) {
        //alert(k);
        county = '<label>' + v['county'] + '</label>';
        progress =
          '<div class = "progress"><div class = "progress-bar" aria-valuenow = "' +
          v['percentage'] + '" aria-valuemax = "100" style="width:' +
          v['percentage'] + '%;background:' + v['color'] + '">' + v[
            'percentage'] + '%</div></div>';
        progressRow += '<div class="progressRow">' + county +
          progress + '</div>';
        // alert(progressRow);
      });
      $(container).empty();
      $(container).append(progressRow);
    }
  });
}

function loadIndicatorTypes() {
   $('#indicator_types').load(base_url + 'analytics/getIndicatorTypes');

   $('#indicator_types1').load(base_url + 'analytics/getIndicatorTypes2A');

   $('#indicator_types2').load(base_url + 'analytics/getIndicatorTypes2B');

   $('#indicator_types3').load(base_url + 'analytics/getIndicatorTypes3');

   $('#assessment_types').load(base_url + 'analytics/getIndicatorTypes');

   $('#assessment_types1').load(base_url + 'analytics/getIndicatorTypes2A');

   $('#assessment_types2').load(base_url + 'analytics/getIndicatorTypes2B');

   $('#assessment_types3').load(base_url + 'analytics/getIndicatorTypes3');

   $('#finding_types').load(base_url + 'analytics/getIndicatorTypes2A');

   $('#finding_types1').load(base_url + 'analytics/getIndicatorTypes2B');

   $('#finding_types2').load(base_url + 'analytics/getIndicatorTypes3');

}

function loadFacilities(base_url, district) {
  facilityList = '';
  $.ajax({
    url: base_url + 'analytics/getFacilityNamesJSON/' + district,
    beforeSend: function(xhr) {
      xhr.overrideMimeType("text/plain; charset=x-user-defined");
    },
    success: function(data) {
      obj = jQuery.parseJSON(data);
      // console.log(obj);
      // countyList='<div class="item" data-value="All Counties Selected">All Counties Selected</div>';
      $.each(obj, function(k, v) {
        facilityList += '<div class="item" data-value="' + v.text +
          '">' + v.text + '</div>';
      });
      $('#facility_select').parent().dropdown('restore defaults');
      // $('#sub_county_select').dropdown('restore defaults');
      $('#facility_select').parent().find('.menu').html(facilityList);
      // $('#facility_select').parent().width($('#facility_select').parent().find('.menu').width());
      $('#facility_select').parent().dropdown();
    }
  });
}

function variableHandler(criteria, county, district, facility, survey,
  survey_category, indicator_type, section) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      statisticsHandler(criteria, value, survey, survey_category,
        indicator_type, section);
      break;
    case 'county':
      value = county;
      statisticsHandler(criteria, value, survey, survey_category,
        indicator_type, section);
      break;
    case 'district':
      value = district;
      statisticsHandler(criteria, value, survey, survey_category,
        indicator_type, section);
      break;
    case 'facility':
      value = facility;
      statisticsHandler(criteria, value, survey, survey_category,
        indicator_type, section);
      break;
  }
}

function subHandler(criteria, county, district, facility, survey,
  survey_category, indicator_type) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'county':
      value = county;
      indicatorHandler(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'district':
      value = district;
      indicatorHandler(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'facility':
      value = facility;
      indicatorHandler(criteria, value, survey, survey_category,


        indicator_type,'correctness');
      break;
  }
}




function subHandler1(criteria, county, district, facility, survey,
  survey_category, assessment_types) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler1(criteria, value, survey, survey_category,
        assessment_types,'assessment');
      break;
    case 'county':
      value = county;
      indicatorHandler1(criteria, value, survey, survey_category,
        assessment_types,'assessment');
      break;
    case 'district':
      value = district;
      indicatorHandler1(criteria, value, survey, survey_category,
        assessment_types,'assessment');
      break;
    case 'facility':
      value = facility;
      indicatorHandler1(criteria, value, survey, survey_category,
        assessment_types,'assessment');


      break;
  }
}

function subHandler2(criteria, county, district, facility, survey,
  survey_category, indicator_type) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler2(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'county':
      value = county;
      indicatorHandler2(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'district':
      value = district;
      indicatorHandler2(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'facility':
      value = facility;
      indicatorHandler2(criteria, value, survey, survey_category,

        indicator_type,'correctness');
      break;
  }
}

function subHandler3(criteria, county, district, facility, survey,
  survey_category, assessment_types3) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler3(criteria, value, survey, survey_category,
        assessment_types3,'assessment');
      break;
    case 'county':
      value = county;
      indicatorHandler3(criteria, value, survey, survey_category,
        assessment_types3,'assessment');
      break;
    case 'district':
      value = district;
      indicatorHandler3(criteria, value, survey, survey_category,
        assessment_types3,'assessment');
      break;
    case 'facility':
      value = facility;
      indicatorHandler3(criteria, value, survey, survey_category,
        assessment_types3,'assessment');


      break;
  }
}

function subHandler4(criteria, county, district, facility, survey,
  survey_category, indicator_type) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler4(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'county':
      value = county;
      indicatorHandler4(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'district':
      value = district;
      indicatorHandler4(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'facility':
      value = facility;
      indicatorHandler4(criteria, value, survey, survey_category,

        indicator_type,'correctness');
      break;
  }
}

function subHandler5(criteria, county, district, facility, survey,
  survey_category, assessment_types5) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler5(criteria, value, survey, survey_category,
        assessment_types5,'assessment');
      break;
    case 'county':
      value = county;
      indicatorHandler5(criteria, value, survey, survey_category,
        assessment_types5,'assessment');
      break;
    case 'district':
      value = district;
      indicatorHandler5(criteria, value, survey, survey_category,
        assessment_types5,'assessment');
      break;
    case 'facility':
      value = facility;
      indicatorHandler5(criteria, value, survey, survey_category,
        assessment_types5,'assessment');


      break;
  }
}

function subHandler6(criteria, county, district, facility, survey,
  survey_category, indicator_type) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler6(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'county':
      value = county;
      indicatorHandler6(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'district':
      value = district;
      indicatorHandler6(criteria, value, survey, survey_category,

        indicator_type,'correctness');

      break;
    case 'facility':
      value = facility;
      indicatorHandler6(criteria, value, survey, survey_category,


        indicator_type,'correctness');
      break;
  }
}

function subHandler7(criteria, county, district, facility, survey,
  survey_category, assessment_types7) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler7(criteria, value, survey, survey_category,
        assessment_types7,'assessment');
      break;
    case 'county':
      value = county;
      indicatorHandler7(criteria, value, survey, survey_category,
        assessment_types7,'assessment');
      break;
    case 'district':
      value = district;
      indicatorHandler7(criteria, value, survey, survey_category,
        assessment_types7,'assessment');
      break;
    case 'facility':
      value = facility;
      indicatorHandler7(criteria, value, survey, survey_category,
        assessment_types7,'assessment');


      break;
  }
}

function subHandler8(criteria, county, district, facility, survey,
  survey_category, finding_types8) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler8(criteria, value, survey, survey_category,
        finding_types8,'findings');
      break;
    case 'county':
      value = county;
      indicatorHandler8(criteria, value, survey, survey_category,
        finding_types8,'findings');
      break;
    case 'district':
      value = district;
      indicatorHandler8(criteria, value, survey, survey_category,
        finding_types8,'findings');
      break;
    case 'facility':
      value = facility;
      indicatorHandler8(criteria, value, survey, survey_category,
        finding_types8,'findings');


      break;
  }
}

function subHandler9(criteria, county, district, facility, survey,
  survey_category, finding_types9) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler9(criteria, value, survey, survey_category,
        finding_types9,'findings');
      break;
    case 'county':
      value = county;
      indicatorHandler9(criteria, value, survey, survey_category,
        finding_types9,'findings');
      break;
    case 'district':
      value = district;
      indicatorHandler9(criteria, value, survey, survey_category,
        finding_types9,'findings');
      break;
    case 'facility':
      value = facility;
      indicatorHandler9(criteria, value, survey, survey_category,
        finding_types9,'findings');


      break;
  }
}

function subHandler10(criteria, county, district, facility, survey,
  survey_category, assessment_types) {
  switch (criteria) {
    case 'national':
      value = 'Aggegated';
      indicatorHandler10(criteria, value, survey, survey_category,
        assessment_types,'findings');
      break;
    case 'county':
      value = county;
      indicatorHandler10(criteria, value, survey, survey_category,
        assessment_types,'findings');
      break;
    case 'district':
      value = district;
      indicatorHandler10(criteria, value, survey, survey_category,
        assessment_types,'findings');
      break;
    case 'facility':
      value = facility;
      indicatorHandler10(criteria, value, survey, survey_category,
        assessment_types,'findings');


      break;
  }
}

function indicatorHandler(criteria, value, survey, survey_category,

  indicator_type,statistic) {
  loadGraph(base_url, 'analytics/getIndicatorComparison/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + indicator_type + '/' + statistic,
    '#indicator_comparison');

  }

  

function indicatorHandler1(criteria, value, survey, survey_category,
  assessment_types,statistic) {
  loadGraph(base_url, 'analytics/getAssessmentComparison/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + assessment_types + '/' + statistic,
    '#assessment_comparison');


  
}

function indicatorHandler2(criteria, value, survey, survey_category,

  indicator_type,statistic) {
  loadGraph(base_url, 'analytics/getHcwCorrectness/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + indicator_type + '/' + statistic,
    '#indicator_comparison1');

  }

function indicatorHandler3(criteria, value, survey, survey_category,
  assessment_types,statistic) {
  loadGraph(base_url, 'analytics/getHcwAssessment/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + assessment_types + '/' + statistic,
    '#assessment_comparison1');
 
}

function indicatorHandler4(criteria, value, survey, survey_category,

  indicator_type,statistic) {
  loadGraph(base_url, 'analytics/getHcwCorrectness/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + indicator_type + '/' + statistic,
    '#indicator_comparison2');

  }

  function indicatorHandler5(criteria, value, survey, survey_category,
  assessment_types,statistic) {
  loadGraph(base_url, 'analytics/getHcwAssessment/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + assessment_types + '/' + statistic,
    '#assessment_comparison2');
 
}

function indicatorHandler6(criteria, value, survey, survey_category,

  indicator_type,statistic) {
  loadGraph(base_url, 'analytics/getHcwCorrectness/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + indicator_type + '/' + statistic,
    '#indicator_comparison3');

  }

  function indicatorHandler7(criteria, value, survey, survey_category,
  assessment_types,statistic) {
  loadGraph(base_url, 'analytics/getHcwAssessment/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + assessment_types + '/' + statistic,
    '#assessment_comparison3');
 
}

function indicatorHandler8(criteria, value, survey, survey_category,
  finding_types,statistic) {
  loadGraph(base_url, 'analytics/getHCWIndicatorFindings/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + finding_types + '/' + statistic,
    '#symptompresence');
 
}

function indicatorHandler9(criteria, value, survey, survey_category,
  finding_types,statistic) {
  loadGraph(base_url, 'analytics/getHCWIndicatorFindings/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + finding_types + '/' + statistic,
    '#symptompresence1');
 
}

function indicatorHandler10(criteria, value, survey, survey_category,
  finding_types,statistic) {
  loadGraph(base_url, 'analytics/getHCWIndicatorFindings/' + criteria + '/' +
    value + '/' + survey + '/' + survey_category + '/' + finding_types + '/' + statistic,
    '#symptompresence2');
 
}

function setRawUrl(criteria, county, district, facility, survey,
    survey_category, data_for, data_parent, statistic) {
    // alert(procedure);
    var raw_url = '';
    switch (criteria) {
      case 'national':
        value = 'Aggregated';
        break;
      case 'county':
        value = county;
        break;
      case 'district':
        value = district;
        break;
      case 'facility':
        value = facility;
        break;
    }
    switch (data_parent) {
      case 'question':
        raw_url = 'analytics/getQuestionRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for + '/' + statistic;
        break;
      case 'indicator':
        raw_url = 'analytics/getIndicatorRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for;
        break;
      case 'commodity':
        raw_url = 'analytics/getCommodityRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for + '/' + statistic;
        break;
      case 'equipment':
        raw_url = 'analytics/getEquipmentRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for + '/' + statistic;
        break;
      case 'resource':
        raw_url = 'analytics/getResourceRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for + '/' + statistic;
        break;
      case 'supplies':
        raw_url = 'analytics/getSuppliesRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for + '/' + statistic;
        break;
      case 'treatment':
        raw_url = 'analytics/getTreatmentRaw/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for + '/' + statistic;
        break;
      case 'staff_availability':
        raw_url = 'analytics/getStaffAvailabilityRAW/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for;
        break;
      case 'staff_retention':
        raw_url = 'analytics/getStaffRetentionRAW/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for;
        break;
      case 'staff_trained':
        raw_url = 'analytics/getTrainedStaffRAW/' + criteria + '/' + value + '/' +
          survey + '/' + survey_category + '/' + data_for;
        break;
    }
    return raw_url;
  }
  // function setScope(criteria, county, district, facility, survey, survey_category) {
  // }
function loadEnlargedGraph(base_url, graph_url, title, raw_url) {
  var contents = [];
  if (raw_url != '') {
    contents['graph'] =
      '<div class="x-large-graph active side" id="graph"></div>';
    contents['facility_data'] =
      '<div class="x-large-graph side" id="facility_data"></div>';

    loadModalForm(base_url, '', title, '90%', contents);
    loadGraph(base_url, graph_url, '#graph');
    loadRawDownload(base_url, raw_url);
    $('#show_data').show();
    $('#pdf').removeClass('disabled');
    $('#excel').removeClass('disabled');
    $('#show_data').click(function() {
      $('#graph').hide();
      $('#show_data').hide();
      $('#show_graph').show();
      loadFacilityRawData(base_url, raw_url, '#facility_data');
    });
    $('#show_graph').click(function() {
      $('#graph').show();
      $('#facility_data').empty();
      $('#show_graph').hide();
      $('#show_data').show();
      loadGraph(base_url, graph_url, '#graph');
    });

  } else {
    $('#pdf').addClass('disabled');
    $('#excel').addClass('disabled');
    $('.download').attr('data-url', '');
    contents['graph'] =
      '<div class="x-large-graph active side" id="graph"></div>';
    contents['facility_data'] = '';
    loadModalForm(base_url, '', title, '90%', contents);
    loadGraph(base_url, graph_url, '#graph');
    $('#show_data').hide();
  }
}

function loadDistricts(base_url, county) {
  subcountyList = '';
  district_count = 0;
  $.ajax({
    url: base_url + 'analytics/getSpecificDistrictNamesChosen/' + county,
    async: false,
    beforeSend: function(xhr) {
      xhr.overrideMimeType("text/plain; charset=x-user-defined");
    },
    success: function(data) {
      obj = jQuery.parseJSON(data);
      district_count = obj.length;
      // alert(district_count);
      // console.log(obj);
      // countyList='<div class="item" data-value="All Counties Selected">All Counties Selected</div>';
      $.each(obj, function(k, v) {
        subcountyList += '<div class="item" data-value="' + v.text +
          '">' + v.text + '</div>';
      });
      $('#sub_county_select').parent().dropdown('restore defaults');
      $('#facility_select').parent().dropdown('restore defaults');
      $('#facility_select').parent().find('.menu').html('');
      // $('#sub_county_select').dropdown('restore defaults');
      $('#sub_county_select').parent().find('.menu').html(subcountyList);
      // alert($('#sub_county_select').parent().find('.menu .item').width());
      // $('#sub_county_select').parent().width($('#sub_county_select').parent().find('.menu .item').width());
      $('#sub_county_select').parent().dropdown();
    }
  });
  return district_count;
}

function loadCounties() {
    countyList = '';
    $.ajax({
      url: base_url + 'analytics/getCountyNamesJSON',
      beforeSend: function(xhr) {
        xhr.overrideMimeType("text/plain; charset=x-user-defined");
      },
      success: function(data) {
        obj = jQuery.parseJSON(data);
        // console.log(obj);
        countyList =
          '<div class="item" data-value="All Counties Selected">All Counties Selected</div>';
        $.each(obj, function(k, v) {
          countyList += '<div class="item" data-value="' + v.text +
            '"><input type="checkbox">' + v.text + '</div>';
        });
        // alert(countyList);
        $('#county_select').parent().find('.menu').html(countyList);
        // $('#county_select').parent().width($('#county_select').parent().find('.menu').width());
        $('#county_select').parent().dropdown();
      }
    });
  }
  /**
   * [getNationalData description]
   * @param  {[type]} base_url        [description]
   * @param  {[type]} survey_type     [description]
   * @param  {[type]} survey_category [description]
   * @return {[type]}                 [description]
   */
function getNationalData(base_url, survey_type, survey_category) {
    result = '';
    $.ajax({
      url: base_url + 'survey/getNationalData/' + survey_type + '/' +
        survey_category,
      async: false,
      beforeSend: function(xhr) {
        xhr.overrideMimeType("text/plain; charset=x-user-defined");
      },
      success: function(data) {
        obj = jQuery.parseJSON(data);
        // console.log(obj);
        result = obj;


      }
    });
    return result;
  }
  /**
   * [getCountyData description]
   * @param  {[type]} base_url        [description]
   * @param  {[type]} survey_type     [description]
   * @param  {[type]} survey_category [description]
   * @param  {[type]} county          [description]
   * @return {[type]}                 [description]
   */
function getCountyData(base_url, survey_type, survey_category, county) {
  result = '';
  $.ajax({
    url: base_url + 'survey/getCountyData/' + survey_type + '/' +
      survey_category + '/' + county,
    async: false,
    beforeSend: function(xhr) {
      xhr.overrideMimeType("text/plain; charset=x-user-defined");
    },
    success: function(data) {
      obj = jQuery.parseJSON(data);
      // console.log(obj);
      result = obj;


    }
  });
  return result;
}

function getDistrictData(base_url, survey_type, survey_category, district) {
    result = '';
    $.ajax({
      url: base_url + 'survey/getDistrictData/' + survey_type + '/' +
        survey_category + '/' + district,
      async: false,
      beforeSend: function(xhr) {
        xhr.overrideMimeType("text/plain; charset=x-user-defined");
      },
      success: function(data) {
        obj = jQuery.parseJSON(data);
        // console.log(obj);
        result = obj;


      }
    });
    return result;
  }
  /**
   * [getFacilityCount description]
   * @param  {[type]} base_url        [description]
   * @param  {[type]} national        [description]
   * @param  {[type]} county          [description]
   * @param  {[type]} district        [description]
   * @param  {[type]} survey          [description]
   * @param  {[type]} survey_category [description]
   * @return {[type]}                 [description]
   */
function getFacilityCount(base_url, national, county, district, survey,survey_category) {
  if (national != '') {
    data = getNationalData(base_url, survey, survey_category);
  } else if (county != '') {
    data = getCountyData(base_url, survey, survey_category, county);
  } else if (district != '') {
    data = getDistrictData(base_url, survey, survey_category, district);
  }

  $('#targeted').animateNumber({
    number: data[0].actual
  });
  $('#finished').animateNumber({
    number: data[0].reported
  });
  $('#not-finished').animateNumber({
    number: data[0].pending
  });
  $('#not-started').animateNumber({
    number: data[0].notstarted
  });
  $('span').popup();
  $('#survey_stat .outer .inner .content .digit').quickfit({
    min: 18
  });
}


/**
 * [statisticsHandler description]
 * @param  {[type]} criteria        [description]
 * @param  {[type]} value           [description]
 * @param  {[type]} survey          [description]
 * @param  {[type]} survey_category [description]
 * @param  {[type]} indicator_type  [description]
 * @param  {[type]} section         [description]
 * @return {[type]}                 [description]
 */
function statisticsHandler(criteria, value, survey, survey_category,
  indicator_type, section) {
  switch (survey) {
    case 'mnh':
      //MNH Analytics
      //Section 1 MNH
      switch (section) {
        case 'section-1':
          loadGraph(base_url, 'analytics/getFacilityOwnerPerCounty/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#MNHfacility_ownership');
          loadGraph(base_url, 'analytics/getFacilityLevelPerCounty/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#MNHfacility_levels');
          loadGraph(base_url, 'analytics/getFacilityTypePerCounty/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#MNHfacility_type');
          loadGraph(base_url, 'analytics/getDeliveryServices/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#DeliveryReasons');
          loadGraph(base_url, 'analytics/getDeliveryReason/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category,
            '#MainDeliveryReasons');
          loadGraph(base_url, 'analytics/getServices/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category, '#24Hr');
          loadGraph(base_url, 'analytics/getHFM/' + criteria + '/' + value +
            '/' + survey + '/' + survey_category, '#HFM');
          loadGraph(base_url, 'analytics/getBedStatistics/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/total',
            '#Beds');
          break;
        case 'section-2':
          //Section 2 MNH
          loadGraph(base_url, 'analytics/getDiarrhoeaStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#MNHdeliveries');
          loadGraph(base_url, 'analytics/getBemoncQuestion/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category,
            '#BEMONCQuestions');
          loadGraph(base_url, 'analytics/getBemONCReason/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category, '#BEMONCReasons');
          loadGraph(base_url, 'analytics/getCEOC/' + criteria + '/' + value +
            '/' + survey + '/' + survey_category, '#CEmONC');
          loadGraph(base_url, 'analytics/getCSReasons/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/cs',
            '#CEOCReasons');
          loadGraph(base_url, 'analytics/getCSReasons/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/transfusion',
            '#TransfusionReasons');
          loadGraph(base_url, 'analytics/getBloodMainSource/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#bloodmainsource');
          loadGraph(base_url, 'analytics/getNewborn/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category, '#MNHnewborn');
          loadGraph(base_url, 'analytics/getKangarooMotherCare/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category, '#MNHkmc');
          loadGraph(base_url, 'analytics/getDeliveries/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/total',
            '#delivery_preparedness');
          loadGraph(base_url, 'analytics/getHIV/' + criteria + '/' + value +
            '/' + survey + '/' + survey_category, '#MNHhiv');
          break;
        case 'section-3':
          loadGraph(base_url, 'analytics/getGuidelinesAvailabilityMNH/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#MNHguidelines');
          loadGraph(base_url, 'analytics/getJobAids/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category, '#MNHjob_aids');
          loadGraph(base_url, 'analytics/getMNHTools/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category, '#MNHtools');
          break;
        case 'section-4':
          loadGraph(base_url, 'analytics/getTrainedStaff/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/' + survey,
            '#mnhStaffAvailability');
          loadGraph(base_url, 'analytics/getStaffRetention/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/' + survey,
            '#MNHstaffRetention');
          loadGraph(base_url, 'analytics/getStaffAvailability/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#MNHStaffTraining');
          break;
        case 'section-5':
          loadGraph(base_url,
            'analytics/getMNHCommodityAvailabilityFrequency/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#MNHcommodity_availability');
          loadGraph(base_url,
            'analytics/getMNHCommodityAvailabilityUnavailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#MNHcommodity_unavailability');
          loadGraph(base_url, 'analytics/getMNHCommodityLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#MNHcommodity_location');
          loadGraph(base_url, 'analytics/getMNHCommoditySupplier/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#MNHcommodity_supplier');

          //case'section-6':
          loadGraph(base_url, 'analytics/getCommodityUsage/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/' + survey +
            '/consumption', '#MNHcommodity_consumption');
          loadGraph(base_url, 'analytics/getCommodityUsage/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/' + survey +
            '/unavailability', '#MNHunavailability');
          loadGraph(base_url, 'analytics/getCommodityUsage/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/' + survey +
            '/reason', '#MNHReason');
          break;

        case 'section-7':
          loadGraph(base_url, 'analytics/getMNHEquipmentFrequency/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhequipment_availability');
          loadGraph(base_url, 'analytics/getMNHEquipmentFunctionality/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhequipment_functionality');
          loadGraph(base_url, 'analytics/getMNHEquipmentLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#mnhequipment_location');
          loadGraph(base_url, 'analytics/getMNHTestingSuppliesAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhtesting_availability');
          loadGraph(base_url, 'analytics/getMNHTestingSuppliesLocation/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhtesting_supplies');
          //section 7 of 8: Part II
          loadGraph(base_url, 'analytics/getMNHDeliveryKitsAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhDelivery_availability');
          loadGraph(base_url, 'analytics/getMNHDeliveryKitsLocation/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhDelivery_location');
          loadGraph(base_url, 'analytics/getMNHDeliveryKitsFunctionality/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhDelivery_functionality');
          loadGraph(base_url, 'analytics/getMNHSuppliesAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhsupplies_availability');
          loadGraph(base_url, 'analytics/getMNHSuppliesNameLocation/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#mnhsupplies_location');
          loadGraph(base_url, 'analytics/getMNHSuppliesReason/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#mnhsupplies_reason');

          //section 7 of 8: Part III
          loadGraph(base_url, 'analytics/getRunningWaterAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#mnhresource_availability');
          loadGraph(base_url, 'analytics/getRunningWaterLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#mnhresource_location');
          loadGraph(base_url, 'analytics/getRunningWaterStorage/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#mnhwatersource');
          loadGraph(base_url, 'analytics/getmnhWaterStorage/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#mnhwateravailability');
          loadGraph(base_url, 'analytics/getMNHresourcesSupplier/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#mnhresource_mainSource');
          loadGraph(base_url, 'analytics/getWasteStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#mnhresource_wasteDisposal');
          loadGraph(base_url, 'analytics/getMNHEquipmentElectricity/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#mnhequipment_electricity');
          loadGraph(base_url, 'analytics/getMNHMainSupplier/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#mnhelectricitysupplier');
          //loadGraph(base_url, 'analytics/getMNHElectricityMainSource/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhelectricitysource');
          //section 7 of 8: Other
          //loadGraph(base_url, 'analytics/getMNHSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHsupplies_availability');
          //loadGraph(base_url, 'analytics/getMNHSuppliesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHsupplies_location');
          //loadGraph(base_url, 'analytics/getMNHSuppliers/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/', '#MNHsupplies_supplier');

          break;


        case 'section-8':

          loadGraph(base_url, 'analytics/getCommunityStrategyMNH/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/community', '#community_units');
          loadGraph(base_url, 'analytics/getCommunityStrategyMNH/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/referral', '#community_cases');
          loadGraph(base_url, 'analytics/getCommunityStrategyMNH/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/trained',
            '#imci_trainings');
          break;


      }
      break;
    case 'ch':
      switch (section) {
        case 'section-1':
          loadGraph(base_url, 'analytics/getFacilityOwnership/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#facility_owner');
          loadGraph(base_url, 'analytics/getFacilityLevel/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#facility_levels');
          loadGraph(base_url, 'analytics/getFacilitytype/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#facility_type');
          loadGraph(base_url, 'analytics/getTrainedStaff/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category + '/' + survey,
            '#staff_training');
          loadGraph(base_url, 'analytics/getStaffAvailability/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#staff_availability');
          //loadGraph(base_url, 'analytics/getStaffRetention/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#staff_retention');
          loadGraph(base_url, 'analytics/getIMCI/' + criteria + '/' + value +
            '/' + survey + '/' + survey_category, '#imci');
          loadGraph(base_url, 'analytics/getHS/' + criteria + '/' + value +
            '/' + survey + '/' + survey_category, '#chhealth_service');
          break;
        case 'section-2':
          loadGraph(base_url, 'analytics/getGuidelinesAvailabilityCH/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#guidelines');
          loadGraph(base_url, 'analytics/getTools/' + criteria + '/' + value +
            '/' + survey + '/' + survey_category, '#tools');
          loadGraph(base_url, 'analytics/getChallengeStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#challenge');
          break;
        case 'section-3':
          loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/cases',
            '#u5_register');

          loadGraph(base_url, 'analytics/getCorrectClassification/' +
            criteria +

            '/' + value + '/' + survey + '/' + survey_category + '/cases',
            '#correct_classification');
          loadGraph(base_url, 'analytics/getDangerSigns/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category, '#danger_signs');
          loadGraph(base_url, 'analytics/getIndicatorFindings/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#finding_signs');
          loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/treatment', '#treatment_options');
          loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/other_treatment/dia', '#other_treatment_options_dia');
          loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/other_treatment/pne', '#other_treatment_options_pne');
          loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/other_treatment/fev', '#other_treatment_options_fev');
          //loadGraph(base_url, 'analytics/getIndicatorComparison/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + indicator_type, '#indicator_comparison');
          break;
        case 'section-4':
          loadGraph(base_url,
            'analytics/getCHCommodityAvailabilityFrequency/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#commodity_availability');
          loadGraph(base_url,
            'analytics/getCHCommodityAvailabilityUnavailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#commodity_unavailability');
          loadGraph(base_url, 'analytics/getCHCommodityLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#commodity_location');
          loadGraph(base_url, 'analytics/getCHCommoditySuppliers/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#commodity_supplier');
          loadGraph(base_url, 'analytics/getbundlingFrequency/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#bundling_availability');
          loadGraph(base_url, 'analytics/getbundlingUnavailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/' + survey, '#bundling_unavailability');
          loadGraph(base_url, 'analytics/getbundlingLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/' +
            survey, '#bundling_location');

          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/availability/dia', '#diarrhoeaAvailability');
          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/unavailability/dia', '#diarrhoeaReasons');
          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/location/dia', '#diarrhoeaLocation');

          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/availability/fev', '#malariaAvailability');
          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/unavailability/fev', '#malariaReasons');
          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/location/fev', '#malariaLocation');

          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/availability/pne', '#pneumoniaAvailability');
          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/unavailability/pne', '#pneumoniaReasons');
          loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' +
            value + '/' + survey + '/' + survey_category +
            '/ch/location/pne', '#pneumoniaLocation');


          break;
        case 'section-5':

          loadGraph(base_url, 'analytics/getORTAvailability/' + criteria +
            '/' + value +

            '/' + survey + '/' + survey_category, '#ort_availability');
          loadGraph(base_url, 'analytics/getLocationStatistics/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#ort_location');
          loadGraph(base_url, 'analytics/getORTFunctionality/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#ort_reason');
          break;
        case 'section-6':
          loadGraph(base_url, 'analytics/getCHEquipmentFrequency/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#equipment_availability');
          loadGraph(base_url, 'analytics/getCHEquipmentLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#equipment_location');
          loadGraph(base_url, 'analytics/getCHEquipmentFunctionality/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#equipment_functionality');
          break;
        case 'section-7':
          loadGraph(base_url, 'analytics/getCHSuppliesAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#supplies_availability');
          loadGraph(base_url, 'analytics/getCHSuppliesLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#supplies_location');
          loadGraph(base_url, 'analytics/getCHTestingSupplies/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#testing_supplies');
          loadGraph(base_url, 'analytics/getCHSuppliesSupplier/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#ch_suppliers');
          loadGraph(base_url, 'analytics/getCHTestingSuppliesAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#testingSuppliesAvailability');
          break;
        case 'section-8':
          loadGraph(base_url, 'analytics/getCHresourcesAvailability/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#resource_availability');
          loadGraph(base_url, 'analytics/getCHResourcesLocation/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#resource_location');
          loadGraph(base_url, 'analytics/getCHresourcesSupplier/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category,
            '#resource_suppliers');
          break;
        case 'section-9':
          loadGraph(base_url, 'analytics/getCommunityStrategyCH/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/community', '#chcommunity_units');
          loadGraph(base_url, 'analytics/getCommunityStrategyCH/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category +
            '/referral', '#chCases');
          loadGraph(base_url, 'analytics/getCommunityStrategyCH/' + criteria +
            '/' + value + '/' + survey + '/' + survey_category + '/trained',
            '#chIMCITraining');
          break;
      }
      break;

    case 'hcw':
      //MNH Analytics
      //Section 1 MNH
      switch (section) {
        case 'section-1':
          loadGraph(base_url, 'analytics/getFacilityOwnerPerCounty/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#HCWfacility_owner');
          loadGraph(base_url, 'analytics/getFacilityLevelPerCounty/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#HCWfacility_levels');
          loadGraph(base_url, 'analytics/getFacilityTypePerCounty/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#HCWfacility_type');
          loadGraph(base_url, 'analytics/getHCWProfileRaw/' +

            criteria + '/' + value + '/' + survey + '/' + survey_category +
            '/profile_raw/table',

            '#HCW_Profile');

          loadGraph(base_url, 'analytics/getServiceUnit/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#current_service');
          loadGraph(base_url, 'analytics/getRetentionAfter/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#retentiontraining');
          loadGraph(base_url, 'analytics/getTransferTraining/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#transfertraining');


          break;

           case 'section-2':
         loadGraph(base_url, 'analytics/getHcwServicesOffered/' + criteria + '/' + value + '/' + survey + '/' + survey_category,'#servicesoffered');
         loadGraph(base_url, 'analytics/getHcwDangerSignsAssessment/' + criteria + '/' + value + '/' + survey + '/' + survey_category,'#hcwdangersignsAssessment');
         loadGraph(base_url, 'analytics/getHcwDangerSignsPresence/' + criteria + '/' + value + '/' + survey + '/' + survey_category,'#hcwdangersignsPresence');
          break;

          
        // case 'section-2':
        //   loadGraph(base_url, 'analytics/getCasesPresentation/' +
        //     criteria + '/' + value + '/' + survey + '/' + survey_category,
        //     '#casepresentation');

        //   loadGraph(base_url, 'analytics/getChildrenServices/' +
        //     criteria + '/' + value + '/' + survey + '/' + survey_category,
        //     '#serviceprovision');

        //   loadGraph(base_url, 'analytics/getDangerSigns/' +
        //     criteria + '/' + value + '/' + survey + '/' + survey_category,
        //     '#signsassessment');

        //   loadGraph(base_url, 'analytics/getHCWIndicatorFindings/' +
        //     criteria + '/' + value + '/' + survey + '/' + survey_category,
        //     '#signspresence');


        //   break;


        case 'section-3':
        
          break;

        case 'section-6':

          loadGraph(base_url, 'analytics/getIMCIConsultation/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#consultationobserved');

          loadGraph(base_url, 'analytics/getIMCIInterview/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#interviewcaregiver');


          break;

        case 'section-7':

          loadGraph(base_url, 'analytics/getIMCICertificateA/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#certificatesectionA');

          loadGraph(base_url, 'analytics/getIMCICertificateB/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#certificatesectionB');

          loadGraph(base_url, 'analytics/getIMCICertificate/' +
            criteria + '/' + value + '/' + survey + '/' + survey_category,
            '#certification'); 


          break;

          
      }
  }
}
