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
            variableHandler('national', county, district, facility, survey, survey_category, indicator_type);
        } else {
            if (district == '') {
                variableHandler('county', county, district, facility, survey, survey_category, indicator_type);
            } else {
                variableHandler('district', county, district, facility, survey, survey_category, indicator_type);
            }
        }
        getReportingData(base_url, survey, survey_category, '#reporting');
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
        district_select = $('#sub_county_select').val();
        //alert(district_select)
        if (district_select !== 'Please Select a District' && district_select !== 'All Sub-Counties Selected') {
            district = district_select;
        } else {
            district = '';
        }

        survey = $(this).attr('value');
        if (survey_category != '') {
            loadSimpleGraph(base_url, 'analytics/getFacilityProgress/' + survey + '/' + survey_category, '#reporting_stat .outer .inner .content .inner-graph');
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
            getFacilityCount(base_url, '', '', district, survey, survey_category);
        } else {
            district = '';
            if (county != '' && county != 'Unselected') {
                scope = 'county';
                getFacilityCount(base_url, '', county, '', survey, survey_category);

            } else {
                scope = 'national';
                getFacilityCount(base_url, 'national', '', '', survey, survey_category);
            }
        }
        if (survey != '') {

            getReportingData(base_url, survey, survey_category, '#reporting');
            section = trim($('.collapse.in').parent().attr('id'), 'mnh-');
            section = trim(section, 'ch-');
            $('#statistic_summary').show();
            $('#survey_stat').show();
            $('#survey_stat').addClass('animated bounceInUp');
            $('#reporting_stat').show();
            $('#reporting_stat').addClass('animated bounceInUp');
            $('#county_stat').show();
            $('#county_stat').addClass('animated bounceInUp');
            loadSimpleGraph(base_url, 'analytics/getFacilityProgress/' + survey + '/' + survey_category, '#reporting_stat .outer .inner .content .inner-graph');
            loadSimpleGraph(base_url, 'analytics/getCountyProgress/' + survey + '/' + survey_category, '#county_stat .outer .inner .content .inner-graph');

            variableHandler(scope, county, district, facility, survey, survey_category, indicator_type, section);
        }
        // variableHandler('national', county, district, facility, survey, survey_category, indicator_type);
    });
    $('.ui.selection.dropdown').find('input').change(function() {
        // alert($(this).val());
        if ($(this).parent().find('.text').text() != 'Choose a Sub County' && $(this).parent().find('.text').text() != 'Choose a Facility' && $(this).parent().find('.text').text() != 'Choose a County') {
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

        if (county != '' && county != 'All Counties Selected') {
            $('#district_stat .outer .inner .content .text #county').text(county);
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
            getFacilityCount(base_url, 'national', '', '', survey, survey_category);
            $('#county_select').parent().dropdown('restore defaults');
        }
        // alert(scope);


        variableHandler(scope, county, district, facility, survey, survey_category, indicator_type, section);

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
            getFacilityCount(base_url, '', '', district, survey, survey_category);
            variableHandler(scope, county, district, facility, survey, survey_category, indicator_type, section);
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
            variableHandler(scope, county, district, facility, survey, survey_category, indicator_type, section);
        }
    });
    $(document).on('datatable_loaded', function() {
        $('.dataTable').dataTable({
            "sPaginationType": "full_numbers"
        });
        $('.dataTables_info').addClass('breadcrumb');
    });
    $('select#indicator_types').change(function() {
        indicator_type = $('select#indicator_types option:selected').attr('value');
        // console.log(indicator_type);
        if (county == 'Unselected') {
            subHandler('national', county, district, facility, survey, survey_category, indicator_type);
        } else {
            if (district == '') {
                subHandler('county', county, district, facility, survey, survey_category, indicator_type);
            } else {
                subHandler('district', county, district, facility, survey, survey_category, indicator_type);
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
            raw_url = setRawUrl('national', county, district, facility, survey, survey_category, data_for, data_parent, statistics);
        } else {
            if (district == '' || district == 'Please Select a District') {
                raw_url = setRawUrl('county', county, district, facility, survey, survey_category, data_for, data_parent, statistics);
            } else {
                raw_url = setRawUrl('district', county, district, facility, survey, survey_category, data_for, data_parent, statistics);
            }
        }
        showEnlargedGraph(base_url, graph_url, graph_text, raw_url);
    });

    //Change Event for District Select
    $('select#compare_1').change(function() {
        $("#graph_10").empty();
        compar2 = $('select#compare_1 option:selected').text();
        compar2 = encodeURIComponent(compar2);
        $("#graph_10").load(currentChart + compare + '/' + compar2 + '/' + survey + '/' + extraStat);
        //$('#graph_10').load(currentChart+'district/'+district+'/ch/'+extraStat);
    });
    $('select#compare_2').change(function() {
        $("#graph_11").empty();
        compar = $('select#compare_2 option:selected').text();
        compar = encodeURIComponent(compar);
        $("#graph_11").load(currentChart + compare + '/' + compar + '/' + survey + '/' + extraStat);
        //$('#graph_10').load(currentChart+'district/'+district+'/ch/'+extraStat);
    });
    /**
     * Collapse handler
     */
    $('.panel-collapse.collapse.in').parent().find('.panel-heading h4 a i').attr('class', 'fa fa-chevron-down');
    //Handling Collapses
    $('.panel-collapse').on('show.bs.collapse', function() {
        section = trim($(this).parent().attr('id'), 'mnh-');
        section = trim(section, 'ch-');
        // alert(section);
        $(this).parent().find('.panel-heading h4 a i').attr('class', 'fa fa-chevron-down');
        $(this).parent().find('.panel-heading h4 a span .txt').text('Click to Minimize');
        $('.chart div').width($('.chart div').parent().width());
        variableHandler(scope, county, district, facility, survey, survey_category, indicator_type, section);
        //$('.panel-collapse collapse in').collapse('hide');
        //$(this).collapse('show');
    })
    $('.panel-collapse').on('hide.bs.collapse', function() {
        $(this).parent().find('.panel-heading h4 a i').attr('class', 'fa fa-chevron-right');
        $(this).parent().find('.panel-heading h4 a span .txt').text('Click to Expand');
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
function getReportingData(base_url, survey_type, survey_category, container) {
    progressRow = '';
    $.ajax({
        url: base_url + 'analytics/getAllReportedCounties/' + survey_type + '/' + survey_category,
        beforeSend: function(xhr) {
            $(container).empty();
            $(container).append('<div class="loader" >Loading...</div>');
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            //console.log(obj);
            $.each(obj, function(k, v) {
                //alert(k);
                county = '<label>' + v['county'] + '</label>';
                progress = '<div class = "progress"><div class = "progress-bar" aria-valuenow = "' + v['percentage'] + '" aria-valuemax = "100" style="width:' + v['percentage'] + '%;background:' + v['color'] + '">' + v['percentage'] + '%</div></div>';
                progressRow += '<div class="progressRow">' + county + progress + '</div>';
                // alert(progressRow);
            });
            $(container).empty();
            $(container).append(progressRow);
        }
    });
}

function loadIndicatorTypes() {
    $('#indicator_types').load(base_url + 'analytics/getIndicatorTypes');
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
                facilityList += '<div class="item" data-value="' + v.text + '">' + v.text + '</div>';
            });
            $('#facility_select').parent().dropdown('restore defaults');
            // $('#sub_county_select').dropdown('restore defaults');
            $('#facility_select').parent().find('.menu').html(facilityList);
            // $('#facility_select').parent().width($('#facility_select').parent().find('.menu').width());
            $('#facility_select').parent().dropdown();
        }
    });
}

function variableHandler(criteria, county, district, facility, survey, survey_category, indicator_type, section) {
    switch (criteria) {
        case 'national':
            value = 'Aggegated';
            statisticsHandler(criteria, value, survey, survey_category, indicator_type, section);
            break;
        case 'county':
            value = county;
            statisticsHandler(criteria, value, survey, survey_category, indicator_type, section);
            break;
        case 'district':
            value = district;
            statisticsHandler(criteria, value, survey, survey_category, indicator_type, section);
            break;
        case 'facility':
            value = facility;
            statisticsHandler(criteria, value, survey, survey_category, indicator_type, section);
            break;
    }
}

function subHandler(criteria, county, district, facility, survey, survey_category, indicator_type) {
    switch (criteria) {
        case 'national':
            value = 'Aggegated';
            indicatorHandler(criteria, value, survey, survey_category, indicator_type);
            break;
        case 'county':
            value = county;
            indicatorHandler(criteria, value, survey, survey_category, indicator_type);
            break;
        case 'district':
            value = district;
            indicatorHandler(criteria, value, survey, survey_category, indicator_type);
            break;
        case 'facility':
            value = facility;
            indicatorHandler(criteria, value, survey, survey_category, indicator_type);
            break;
    }
}

function indicatorHandler(criteria, value, survey, survey_category, indicator_type) {
    loadGraph(base_url, 'analytics/getIndicatorComparison/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + indicator_type, '#indicator_comparison');
}

function setRawUrl(criteria, county, district, facility, survey, survey_category, data_for, data_parent, statistic) {
    // alert(procedure);
    var raw_url = '';
    switch (criteria) {
        case 'national':
            value = 'Aggegated';
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
            raw_url = 'analytics/getQuestionRaw/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + data_for + '/' + statistic;
            break;
         case 'indicator':
            raw_url = 'analytics/getIndicatorRaw/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + data_for ;
            break;   
            case 'commodity':
            raw_url = 'analytics/getCommodityRaw/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + data_for+ '/' + statistic ;
            break;   
    }
    return raw_url;
}
// function setScope(criteria, county, district, facility, survey, survey_category) {
// }
function loadEnlargedGraph(base_url, graph_url, title, raw_url) {
    var contents = [];
    if (raw_url != '') {
        contents['graph'] = '<div class="x-large-graph active side" id="graph"></div>';
        contents['facility_data'] = '<div class="x-large-graph side" id="facility_data"></div>';

        loadModalForm(base_url, '', title, '90%', contents);
        loadGraph(base_url, graph_url, '#graph');
        loadRawDownload(base_url,raw_url);
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
        $('.download').attr('data-url','');
        contents['graph'] = '<div class="x-large-graph active side" id="graph"></div>';
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
                subcountyList += '<div class="item" data-value="' + v.text + '">' + v.text + '</div>';
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
            countyList = '<div class="item" data-value="All Counties Selected">All Counties Selected</div>';
            $.each(obj, function(k, v) {
                countyList += '<div class="item" data-value="' + v.text + '">' + v.text + '</div>';
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
        url: base_url + 'survey/getNationalData/' + survey_type + '/' + survey_category,
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
        url: base_url + 'survey/getCountyData/' + survey_type + '/' + survey_category + '/' + county,
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
        url: base_url + 'survey/getDistrictData/' + survey_type + '/' + survey_category + '/' + district,
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
function getFacilityCount(base_url, national, county, district, survey, survey_category) {
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
function statisticsHandler(criteria, value, survey, survey_category, indicator_type, section) {
    switch (survey) {
        case 'mnh':
            //MNH Analytics
            //Section 1 MNH
            switch (section) {
                case 'section-1':
                    loadGraph(base_url, 'analytics/getFacilityOwnerPerCounty/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHfacility_ownership');
                    loadGraph(base_url, 'analytics/getFacilityLevelPerCounty/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHfacility_levels');
                    loadGraph(base_url, 'analytics/getFacilityTypePerCounty/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHfacility_type');
                    loadGraph(base_url, 'analytics/getDeliveryServices/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#DeliveryReasons');
                    loadGraph(base_url, 'analytics/getDeliveryReason/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MainDeliveryReasons');
                    loadGraph(base_url, 'analytics/getServices/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#24Hr');
                    loadGraph(base_url, 'analytics/getHFM/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#HFM');
                    loadGraph(base_url, 'analytics/getBedStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/total', '#NnB');
                    break;
                case 'section-2':
                    //Section 2 MNH 
                    loadGraph(base_url, 'analytics/getDiarrhoeaStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHdeliveries');
                    loadGraph(base_url, 'analytics/getBemoncQuestion/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#BEMONCQuestions');
                    loadGraph(base_url, 'analytics/getBemONCReason/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#BEMONCReasons');
                    loadGraph(base_url, 'analytics/getCEOC/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#CEmONC');
                    loadGraph(base_url, 'analytics/getCSReasons/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/cs', '#CEOCReasons');
                    loadGraph(base_url, 'analytics/getCSReasons/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/transfusion', '#TransfusionReasons');
                    loadGraph(base_url, 'analytics/getBloodMainSource/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#bloodmainsource');
                    loadGraph(base_url, 'analytics/getNewborn/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHnewborn');
                    loadGraph(base_url, 'analytics/getKangarooMotherCare/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHkmc');
                    loadGraph(base_url, 'analytics/getDeliveries/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/total', '#delivery_preparedness');
                    loadGraph(base_url, 'analytics/getHIV/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHhiv');
                    break;
                case 'section-3':
                    loadGraph(base_url, 'analytics/getGuidelinesAvailabilityMNH/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHguidelines');
                    loadGraph(base_url, 'analytics/getJobAids/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHjob_aids');
                    loadGraph(base_url, 'analytics/getMNHTools/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHtools');
                    break;
                case 'section-4':
                    loadGraph(base_url, 'analytics/getTrainedStaff/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhStaffAvailability');
                    loadGraph(base_url, 'analytics/getStaffRetention/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHstaffRetention');
                    loadGraph(base_url, 'analytics/getStaffAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHStaffTraining');
                    break;
                case 'section-5':
                    loadGraph(base_url, 'analytics/getMNHCommodityAvailabilityFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHcommodity_availability');
                    loadGraph(base_url, 'analytics/getMNHCommodityAvailabilityUnavailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHcommodity_unavailability');
                    loadGraph(base_url, 'analytics/getMNHCommodityLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHcommodity_location');
                    loadGraph(base_url, 'analytics/getMNHCommoditySupplier/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHcommodity_supplier');
                    loadGraph(base_url, 'analytics/getCommodityUsage/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey + '/consumption', '#MNHcommodity_consumption');
                    loadGraph(base_url, 'analytics/getCommodityUsage/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey + '/unavailability', '#MNHunavailability');
                    loadGraph(base_url, 'analytics/getCommodityUsage/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey + '/reason', '#MNHReason');
                    break;
                
                case 'section-7':
                    loadGraph(base_url, 'analytics/getMNHEquipmentFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhequipment_availability');
                    loadGraph(base_url, 'analytics/getMNHEquipmentFunctionality/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhequipment_functionality');
                    loadGraph(base_url, 'analytics/getMNHEquipmentLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhequipment_location');
                    loadGraph(base_url, 'analytics/getMNHTestingSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhtesting_availability');
                    loadGraph(base_url, 'analytics/getMNHTestingSuppliesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhtesting_supplies');
                    //section 7 of 8: Part II
                    loadGraph(base_url, 'analytics/getMNHDeliveryKitsAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhDelivery_availability');
                    loadGraph(base_url, 'analytics/getMNHDeliveryKitsLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhDelivery_location');
                    loadGraph(base_url, 'analytics/getMNHDeliveryKitsFunctionality/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhDelivery_functionality');
                    loadGraph(base_url, 'analytics/getMNHSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhsupplies_availability');
                    loadGraph(base_url, 'analytics/getMNHSuppliesNameLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhsupplies_location');
                    //section 7 of 8: Part III
                    loadGraph(base_url, 'analytics/getRunningWaterAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhresource_availability');
                    loadGraph(base_url, 'analytics/getRunningWaterLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhresource_location');
                    loadGraph(base_url, 'analytics/getRunningWaterStorage/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhwatersource');
                    loadGraph(base_url, 'analytics/getmnhWaterStorage/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhwateravailability');
                    loadGraph(base_url, 'analytics/getMNHresourcesSupplier/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhresource_mainSource');
                    loadGraph(base_url, 'analytics/getWasteStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhresource_wasteDisposal');
                    loadGraph(base_url, 'analytics/getMNHEquipmentElectricity/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhequipment_electricity');
                    loadGraph(base_url, 'analytics/getMNHMainSupplier/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhelectricitysupplier');
                    //loadGraph(base_url, 'analytics/getMNHElectricityMainSource/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#mnhelectricitysource');
                    //section 7 of 8: Other
                    loadGraph(base_url, 'analytics/getMNHSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHsupplies_availability');
                    loadGraph(base_url, 'analytics/getMNHSuppliesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHsupplies_location');
                    loadGraph(base_url, 'analytics/getMNHSuppliers/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/', '#MNHsupplies_supplier');

                    break;


                case 'section-8':

                    loadGraph(base_url, 'analytics/getCommunityStrategyMNH/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/community', '#community_units');
                    loadGraph(base_url, 'analytics/getCommunityStrategyMNH/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/referral', '#community_cases');
                    loadGraph(base_url, 'analytics/getCommunityStrategyMNH/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/trained', '#imci_trainings');
                    break;


            }
            break;
        case 'ch':
            switch (section) {
                case 'section-1':
                    loadGraph(base_url, 'analytics/getFacilityOwnerPerCounty/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#facility_owner');
                    loadGraph(base_url, 'analytics/getFacilityLevelPerCounty/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#facility_levels');
                    loadGraph(base_url, 'analytics/getFacilityTypePerCounty/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#facility_type');
                    loadGraph(base_url, 'analytics/getTrainedStaff/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#staff_training');
                    loadGraph(base_url, 'analytics/getStaffAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#staff_availability');
                    //loadGraph(base_url, 'analytics/getStaffRetention/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#staff_retention');
                    loadGraph(base_url, 'analytics/getIMCI/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#imci');
                    loadGraph(base_url, 'analytics/getHS/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#chhealth_service');
                    break;
                case 'section-2':
                    loadGraph(base_url, 'analytics/getGuidelinesAvailabilityCH/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#guidelines');
                    loadGraph(base_url, 'analytics/getTools/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#tools');
                    loadGraph(base_url, 'analytics/getChallengeStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#challenge');
                    break;
                case 'section-3':
                    loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/cases', '#u5_register');
                    loadGraph(base_url, 'analytics/getDangerSigns/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#danger_signs');
                    loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/treatment', '#treatment_options');
                    loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/other_treatment/dia', '#other_treatment_options_dia');
                    loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/other_treatment/pne', '#other_treatment_options_pne');
                    loadGraph(base_url, 'analytics/getTreatmentStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/other_treatment/fev', '#other_treatment_options_fev');
                    //loadGraph(base_url, 'analytics/getIndicatorComparison/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + indicator_type, '#indicator_comparison');
                    break;
                case 'section-4':
                    loadGraph(base_url, 'analytics/getCHCommodityAvailabilityFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#commodity_availability');
                    loadGraph(base_url, 'analytics/getCHCommodityAvailabilityUnavailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#commodity_unavailability');
                    loadGraph(base_url, 'analytics/getCHCommodityLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#commodity_location');
                    loadGraph(base_url, 'analytics/getCHCommoditySuppliers/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#commodity_supplier');
                    loadGraph(base_url, 'analytics/getbundlingFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#bundling_availability');
                    loadGraph(base_url, 'analytics/getbundlingUnavailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#bundling_unavailability');
                    loadGraph(base_url, 'analytics/getbundlingLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#bundling_location');
                    
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/availability/dia', '#diarrhoeaAvailability');
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/unavailability/dia', '#diarrhoeaReasons');
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/location/dia', '#diarrhoeaLocation');

                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/availability/fev', '#malariaAvailability');
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/unavailability/fev', '#malariaReasons');
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/location/fev', '#malariaLocation');

                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/availability/pne', '#pneumoniaAvailability');
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/unavailability/pne', '#pneumoniaReasons');
                    loadGraph(base_url, 'analytics/getCaseTreatment/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/ch/location/pne', '#pneumoniaLocation');


                    break;
                case 'section-5':
                    loadGraph(base_url, 'analytics/getORTAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_availability');
                    loadGraph(base_url, 'analytics/getLocationStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_location');
                    loadGraph(base_url, 'analytics/getORTFunctionality/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_reason');
                    break;
                case 'section-6':
                    loadGraph(base_url, 'analytics/getCHEquipmentFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#equipment_availability');
                    loadGraph(base_url, 'analytics/getCHEquipmentLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#equipment_location');
                    loadGraph(base_url, 'analytics/getCHEquipmentFunctionality/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#equipment_functionality');
                    break;
                case 'section-7':
                    loadGraph(base_url, 'analytics/getCHSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#supplies_availability');
                    loadGraph(base_url, 'analytics/getCHSuppliesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#supplies_location');
                    loadGraph(base_url, 'analytics/getCHTestingSupplies/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#testing_supplies');
                    loadGraph(base_url, 'analytics/getCHSuppliesSupplier/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ch_suppliers');
                    loadGraph(base_url, 'analytics/getCHTestingSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#testingSuppliesAvailability');
                    break;
                case 'section-8':
                    loadGraph(base_url, 'analytics/getCHresourcesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#resource_availability');
                    loadGraph(base_url, 'analytics/getCHResourcesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#resource_location');
                    loadGraph(base_url, 'analytics/getCHresourcesSupplier/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#resource_suppliers');
                    break;
                case 'section-9':
                    loadGraph(base_url, 'analytics/getCommunityStrategyCH/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/community', '#chcommunity_units');
                    loadGraph(base_url, 'analytics/getCommunityStrategyCH/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/referral', '#chCases');
                    loadGraph(base_url, 'analytics/getCommunityStrategyCH/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/trained', '#chIMCITraining');
                    break;
            }
            break;
    }
}