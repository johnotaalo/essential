function startSurvey(base_url, survey, survey_category, district) {
  var form_id = '';
  var link_id = '';
  var linkIdUrl = '';
  var linkSub = '';
  var linkDomain = '';
  var visit_site = '';
  var devices = '';
  var fac_mfl = '';
  var fac_county = '';
  var fac_district = '';

  if (survey != 'hcw') {
    getDistrictData(base_url, district, survey, survey_category);
  } else {
    $('#current_survey').text(survey.toUpperCase() + ' SURVEY');
  }
  // Bound Events



  //start of close_opened_form click event
  $("#close_opened_form").click(function() {

    $(".form-container .actual-form").load(base_url +
      'reporting/formviewer',
      function() {

        //delegate events
        loadGlobalScript();

      });
  });

  /*end of close_opened_form click event */


  /*----------------------------------------------------------------------------------------------------------------*/

  //try saving data

  $("#next_btn").click(function() {
    curr_section = parseInt($('.step:visible[id]').attr("id").split('-')[
      1]);
    form_id = $('form').attr("id");
    the_url = '';
    the_url = base_url + "survey/complete_survey";
    var formData = $('#' + form_id).serializeArray();
    $.ajax({
      url: the_url,
      type: 'POST',
      data: formData,
      beforeSend: function(data) {
        $("#result").append(
          '<center><div class="ui small blue message" style = "margin-bottom: 5px;"><h4><span class = "fa fa-spinner fa-spin"></span> Please wait...</h4></div></center>'
        );
      },
      success: function(data) {
        console.log('Response is  :' + data);
        nextsection = curr_section += 1;
        thethat = $('.step[data-section="' + nextsection + '"]');
        changeSection(curr_section, thethat);
      },
      fail: function() {
        console.log("error");
      }
    });

  });



  /*start of loadGlobalJS*/
  var onload_queue = [];
  var dom_loaded = false;

  /**
   * [loadGlobalJS description]
   * @param  {[type]}   src      [description]
   * @param  {Function} callback [description]
   * @return {[type]}            [description]
   */
  function loadGlobalJS(src, callback) {
      var script = document.createElement('script');
      script.type = "text/javascript";
      script.async = true;
      script.src = src;
      script.onload = script.onreadystatechange = function() {
        if (dom_loaded) {
          callback();
        } else {
          onload_queue.push(callback);
          // clean up for IE and Opera
          script.onload = null;
          script.onreadystatechange = null;
        }
      };
      var head = document.getElementsByTagName('head')[0];
      head.appendChild(script);
    } /*end of loadGlobalJS*/
    /**
     * [domLoaded description]
     * @return {[type]} [description]
     */
  function domLoaded() {
    dom_loaded = true;
    var len = onload_queue.length;
    for (var i = 0; i < len; i++) {
      onload_queue[i]();
    }
    onload_queue = null;
  } /*end of domLoaded*/

  /*-----------------------------------------------------------------------------------------------------------*/

  //check box/checked radio function was here

  domLoaded();

  /*----------------------------------------------------------------------------------------------------------------*/

  /*reset form event*/
  /*start of reset_current_form click event*/
  $("#reset_current_form").click(function() {
    $(form_id).resetForm();

  }); /*end of reset_current_form click event*/

  /*----------------------------------------------------------------------------------------------------------------*/
  var loaded = false;
  /**
   * [loadGlobalScript description]
   * @return {[type]} [description]
   */
  function loadGlobalScript() {
      loaded = true;

      var scripts = [base_url + 'assets/javascripts/js_ajax_load.js'];

      for (i = 0; i < scripts.length; i++) {
        loadGlobalJS(scripts[i], function() {});
      }
      form_id = '#' + $(".form-container .actual-form").find('form').attr(
        'id');

    }
    /*----------------------------------------------------------------------------------------------------------------*/



  //load 1st section of the assessment on page load
  $(".form-container .actual-form").load(base_url +
    'survey/createFacilityTable',
    function() {
      $(document).trigger('datatable_loaded');

      // facilityMFL=12864;
      //loadGlobalScript();//renderFacilityInfo(facilityMFL);


      // $('.dataTables_length').addClass('breadcrumb');

      $('.activity-text').each(function() {
        time = $(this).text();
        if (time != 'not started yet') {
          newTime = moment(time, 'YYYY-MM-DD H:i:s').fromNow();
          $(this).text(newTime.toLowerCase());
        }
        //alert(moment().fromNow());
      });

      //so which link was clicked?
      $('.action').live('click', function() {
        link_id = '#' + $(this).attr('data-mfl');
        link_id = link_id.substr(link_id.indexOf('#') + 1, link_id.length);
        section = $(this).attr('data-section');
        action = $(this).attr('data-action');
        console.log(section);
        //linkSub=$(link_id).attr('class');
        //linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
        facilityMFL = link_id;
        the_url = base_url + 'survey/startSurvey/' + survey + '/' +
          survey_category + '/' + facilityMFL + '/2013-2014';
        $.ajax({
          type: 'POST',
          data: '',
          async: false,
          url: the_url,
          beforeSend: function() {
            $(".form-container .actual-form").empty();
            $(".form-container .actual-form").append(
              '<div class="loader" >Loading...</div>');

          },
          success: function(data) {
            obj = jQuery.parseJSON(data);
            console.log(obj);
            fac_name = obj[0].fac_name;
            fac_district = obj[0].fac_district;
            fac_county = obj[0].fac_county;
            message = obj[0].fac_name + ' in ' + obj[0].fac_district +
              ' District, ' + obj[0].fac_county +
              ' County, is now reporting on the ' + survey.toUpperCase() +
              ' Survey.';
            console.log(message);
            // runNotification(base_url, 'c_admin/getContacts', message);
          }
        });
        //alert(link_id);
        if (link_id) {
          current_form = 'survey/load/online/' + survey;
        }
        $(".form-container .actual-form").load(base_url + current_form,
          function() {
            loadGlobalScript();
            // renderFacilityInfo(facilityMFL);
            // break_form_to_steps(form_id);
            select_option_changed();
            loadSection(section, action);
            $('#steps').show();
            $('#form_post').addClass('active');
            $('#click_form').fadeOut();
            $('select').select2();
            // $('actual-form .step').hide();
            $('.bs-date').datepicker();
            $('.bs-month').datepicker({
              minViewMode: 1
            });
            // $('radio.other').change(function() {
            //   alert('changed');
            // });

          });

        //Step Handler
        $('.ui.step').click(function() {
          section = $(this).attr('data-section');
          changeSection(section, this);

        });

      }); /*end of which link was clicked*/

      /*hcw-action clicked*/
      $('.hcw-action').live('click', function() {
        hcwid = $(this).attr('data-hcwid');
        section = $(this).attr('data-section');
        action = $(this).attr('data-action');
        the_url = base_url + 'survey/startAssessment/' + hcwid;
        $.ajax({
          type: 'POST',
          data: '',
          async: false,
          url: the_url,
          beforeSend: function() {
            $(".form-container .actual-form").empty();
            $(".form-container .actual-form").append(
              '<div class="loader" >Loading...</div>');

          },
          success: function(data) {
            console.log("assessing hcw: " + data);
          }
        });

        if (hcwid) {
          current_form = 'survey/load/online/' + survey;
        }

        $(".form-container .actual-form").load(base_url + current_form,
          function() {
            loadGlobalScript();
            // renderFacilityInfo(facilityMFL);
            // break_form_to_steps(form_id);
            select_option_changed();
            loadSection(section, action);
            $('#steps').show();
            $('#form_post').addClass('active');
            $('#click_form').fadeOut();
            $('select').select2();
            $('.bs-date').datepicker();
            $('.bs-month').datepicker({
              minViewMode: 1
            });
            $('.ui.checkbox').checkbox();
            // $('actual-form .step').hide();

          });

        //Step Handler
        $('.ui.step').click(function() {
          section = $(this).attr('data-section');
          changeSection(section, this);
        });


        
      }); /*end of hcw action*/
    }); /*close form-container LOAD FN() */

  // $('#m_county_choose').live(function(){
  // 	console.log('changed');
  // 	county = this.value;
  // 	createFacilityDropDown(county);
  // });
  /*----------------------------------------------------------------------------------------------------------------*/
  /**
   * [loadSection description]
   * @param  {[type]} section [description]
   * @param  {[type]} action  [description]
   * @param  {[type]} survey  [description]
   * @return {[type]}         [description]
   */
  function loadSection(section, action, survey) {
      section = (section == '') ? '1' : parseInt(section) + 1;
      console.log(section);
      $('.actual-form .step').hide();
      $('#section-' + section).show();
      disableFields(section);

      $('#steps').find("[data-section='" + section + "']").addClass('active');
    }
    /**
     * [disableFields description]
     * @param  {[type]} section [description]
     * @return {[type]}         [description]
     */
  function disableFields(section) {
      //Disable all Input Fields except for Section
      $('form :input').attr('disabled', 'disabled');
      $('#section-' + section + ' :input').removeAttr('disabled');
    }
    /**
     * [changeSection description]
     * @param  {[type]} section [description]
     * @return {[type]}         [description]
     */
  function changeSection(section, that) {
      $('.ui.step').removeClass('active');
      $(that).addClass('active');
      if ($('#section-' + section).length > 0) {
        $('.actual-form .step').hide();
        $('#section-' + section).show();
      } else {
        $('.actual-form .step').hide();
        // Go back to Facility List
        window.location = base_url + 'mnch/takesurvey';
      }
      disableFields(section);
    }
    //equipment availability change detectors
  function select_option_changed() {
      /*
       * Checking for all SELECT inputs
       */
      $(form_id).find('select').on("change", function() {
        /*
         * Identify the class of the SELECT input
         *
         * IF(class matches 'cloned is-guideline')
         * Then
         *  ->Get the SELECT's ID
         *
         */
        if ($(this).attr('class') == 'cloned is-guideline') {
          cb_id = '#' + $(this).attr('id');

          //alert(cb_id);
          cb_no = cb_id.substr(cb_id.indexOf('_') + 1, (cb_id.length)) //for the numerical part of the id

          //substr(id.indexOf('_')+1,id.length)
          //cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
          //alert(cb_no);
          /*
           * Checking if the user selected 'No'
           */
          if (($(cb_id).val() == "No")) {

            //alert(cb_no);
            //$('#ortcGuidesCount_'+cb_no).hide();
            //$('#ortcGuidesCount_'+cb_no).removeClass('label.error');
            $('#ortcGuidesCount_' + cb_no).val(0);
            //$('#ortcGuidesCount_'+cb_no).prop('disabled', true);
          }
          /*
           * Else leave activated
           */
          else {

            //$('#ortcGuidesCount_'+cb_no).prop('disabled', false);
            $('#ortcGuidesCount_' + cb_no).val('');
            //$('#ortcGuidesCount_'+cb_no).show();
            //  $('#ortcGuidesCount_'+cb_no).siblings('label').removeClass('error');
          }
        } //close if($(this).attr('class')=='cloned is-guideline')

        //mnh section 2 follow up questions
        //if($(this).attr('class')=='cloned ceoc'){
        //transfusion
        if ($(this).attr('id') == 'mnhceocAspectResponse_1' && $(this).val() ==
          'Yes') {
          //show yes follow up qn
          $('#transfusion_n').hide();
          $('#transfusion_n').prop('disabled', true);

          $('#mnhceocFollowUpOther_1').prop('disabled', false);
          $('#mnhceocFollowUpOther_1').show();
          $('#mnhceocFollowUp_1').prop('disabled', false);
          $('#mnhceocFollowUp_1').show();
          $('#label_followup_other_1').show();

          $('#transfusion_y').prop('disabled', false);
          $('#transfusion_y').show();

        }

        if ($(this).attr('id') == 'mnhceocAspectResponse_1' && $(this).val() ==
          'No') {

          //show no follow up qn, and hide yes one
          $('#transfusion_y').hide();
          $('#transfusion_y').prop('disabled', true);

          $('#mnhceocFollowUpOther_1').hide();
          $('#label_followup_other_1').hide();
          $('#mnhceocFollowUpOther_1').prop('disabled', true);
          $('#mnhceocFollowUp_1').prop('disabled', true);
          $('#mnhceocFollowUp_1').hide();


          $('#transfusion_n').prop('disabled', false);
          $('#transfusion_n').show();
        }

        if ($(this).attr('id') == 'mnhceocAspectResponse_4' && $(this).val() ==
          'Yes') {
          //CS conduction
          //hide follow up qn
          $('#csdone_n').hide();
          $('#csdone_n').prop('disabled', true);

          $('#mnhceocReasonOther_2').hide();
          $('#label_reason_other_2').hide();
          $('#mnhceocReasonOther_2').prop('disabled', true);


        }
        if ($(this).attr('id') == 'mnhceocAspectResponse_4' && $(this).val() ==
          'No') {
          //show no follow up qn
          $('#csdone_n').prop('disabled', false);
          $('#csdone_n').show();
        }


        if ($(this).attr('id') == 'mnhceocFollowUp_1' && $(this).val() ==
          'Other') {
          //show input field on other

          $('#mnhceocFollowUpOther_1').show();
          $('#label_followup_other_1').show();
          $('#mnhceocFollowUpOther_1').prop('disabled', false);


        }
        if ($(this).attr('id') == 'mnhceocFollowUp_1' && $(this).val() !=
          'Other') {

          //hide other input field
          $('#mnhceocFollowUpOther_1').prop('disabled', true);
          $('#mnhceocFollowUpOther_1').hide();
          $('#label_followup_other_1').hide();
        }

        if ($(this).attr('id') == 'mnhceocReason_1' && $(this).val() ==
          'Other') {
          //show input field on other

          $('#mnhceocReasonOther_1').prop('disabled', false);
          $('#mnhceocReasonOther_1').show();
          $('#label_reason_other_1').show();

        }

        if ($(this).attr('id') == 'mnhceocReason_1' && $(this).val() !=
          'Other') {

          //hide other input field
          $('#mnhceocReasonOther_1').prop('disabled', true);
          $('#mnhceocReasonOther_1').hide();
          $('#label_reason_other_1').hide();
        }

        if ($(this).attr('id') == 'mnhceocReason_4' && $(this).val() ==
          'Other') {
          //show input field on other

          $('#mnhceocReasonOther_2').prop('disabled', false);
          $('#mnhceocReasonOther_2').show();
          $('#label_reason_other_2').show();

        }

        if ($(this).attr('id') == 'mnhceocReason_4' && $(this).val() !=
          'Other') {

          //hide other input field
          $('#mnhceocReasonOther_2').prop('disabled', true);
          $('#mnhceocReasonOther_2').hide();
          $('#label_reason_other_2').hide();
        }

        //	}//close if class is ceoc
      });

      $(form_id).find(':radio').on('change', function() {
        r_id = '#' + $(this).attr('name');
        r_no = r_id.substr(r_id.indexOf('_') + 1, (r_id.length)) //for the numerical part of the name
        if ($(this).val() == 'Never Available') {
          $('#cqNumberOfUnits_' + r_no).val(0);
          $('#cqExpiryDate_' + r_no).val('n/a');
          $('#cqLocNA_' + r_no).prop('checked', true);

          $('#eqQtyFullyFunctional_' + r_no).val(0);
          $('#eqQtyNonFunctional_' + r_no).val(0);
          $('#eqLocOther_' + r_no).prop('checked', true);

          if ($(this).attr('name') == 'sqAvailability_' + r_no) {
            $('#sqLocOther_' + r_no).prop('checked', true);
            $('#sqNumberOfUnits_' + r_no).val(0);
            // $("#sqSupplier_"+r_no+" option").filter(function() {return $('#sqSupplier_'+r_no).val() == 'Not Applicable';}).first().prop("selected", true);
          } else if ($(this).attr('name') == 'hwAvailability_' + r_no) {
            $('#hwLocOther_' + r_no).prop('checked', true);
            //$("#hwSupplier_"+r_no+" option").filter(function() {return $('#hwSupplier_'+r_no).val() == 'Not Applicable';}).first().prop("selected", true);
          }

        } else {
          $('#cqNumberOfUnits_' + r_no).val('');
          $('#cqExpiryDate_' + r_no).val('');
          $('#cqLocNA_' + r_no).prop('checked', false);

          $('#eqQtyFullyFunctional_' + r_no).val('');
          $('#eqQtyNonFunctional_' + r_no).val('');
          $('#eqLocOther_' + r_no).prop('checked', false);

          if ($(this).attr('name') == 'sqAvailability_' + r_no) {
            $('#sqLocOther_' + r_no).prop('checked', false);
            $('#sqNumberOfUnits_' + r_no).val('');
            //$("#sqSupplier_"+r_no+" option").filter(function() {return $('#sqSupplier_'+r_no).val() == 'Select One';}).first().prop("selected", true);
          } else if ($(this).attr('name') == 'hwAvailability_' + r_no) {
            $('#hwLocOther_' + r_no).prop('checked', false);
            //$("#hwSupplier_"+r_no+" option").filter(function() {return $('#hwSupplier_'+r_no).val() == 'Select One';}).first().prop("selected", true);
          }

        }
      });

      //date picker
      $('.expiryDate').datepicker({
        defaultDate: new Date(),
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        minDate: '-5y',
        maxDate: "5y"
      });


      //to review equipment assessment--enables the disabled select options
      $(
        '#editEquipmentListTopButton,#editEquipmentListTopButton_2,#editEquipmentListTopButton_3a,#editEquipmentListTopButton_3b,#editEquipmentListTopButton_4'
      ).click(function() {
        $(
          '#tableEquipmentList,#tableEquipmentList_2,#tableEquipmentList_3a,#tableEquipmentList_3b,#tableEquipmentList_4'
        ).find('select[class="cloned left-combo"]').prop('disabled',
          false);
      });
    } //end of select_option_changed
  $(".Options").click(function() {
    //$("div[id*='PayMethod_']:visible").slideToggle("slow");
    var ID = $(this).attr("id");
    if (this.checked) {
      $("#ind_" + ID).slideToggle("slow");
    }
  });
  /**
   * [selectpnesevereTreatment description]
   * @param  {[type]} select [description]
   * @return {[type]}        [description]
   */
  function selectpnesevereTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "pnesevereTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[SeverePneumonia][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        li.setAttribute('class', 'treatment');
        ul.appendChild(li);
        var code = select.options[select.selectedIndex].value;
        var txt = document.createElement("input");
        txt.setAttribute("value", code);
        txt.setAttribute("type", "hidden");
        txt.setAttribute("name", "pneTreat[]");

        var diver = document.getElementById("pneTreatmentSection");

        diver.appendChild(txt);


      }
    } // close select treatment
    /**
     * [selectpneTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectpneTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "pneTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[Pneumonia][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        li.setAttribute('class', 'treatment');
        ul.appendChild(li);
        var code = select.options[select.selectedIndex].value;
        var txt = document.createElement("input");
        txt.setAttribute("value", code);
        txt.setAttribute("type", "hidden");
        txt.setAttribute("name", "pneTreat[]");

        var diver = document.getElementById("pneTreatmentSection");

        diver.appendChild(txt);
      }
    } // close select treatment
    /**
     * [selectmalconfirmedTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectmalconfirmedTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "malconfrimedTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[ConfirmedMalaria][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        li.setAttribute('class', 'treatment');
        ul.appendChild(li);
        var code = select.options[select.selectedIndex].value;
        var txt = document.createElement("input");
        txt.setAttribute("value", code);
        txt.setAttribute("type", "hidden");
        txt.setAttribute("name", "malTreat[]");

        var diver = document.getElementById("malTreatmentSection");

        diver.appendChild(txt);
      }
    } // close select treatment
    /**
     * [selectmalnotconfirmedTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectmalnotconfirmedTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "malnotconfrimedTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[NotConfirmedMalaria][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        li.setAttribute('class', 'treatment');
        ul.appendChild(li);
        var code = select.options[select.selectedIndex].value;
        var txt = document.createElement("input");
        txt.setAttribute("value", code);
        txt.setAttribute("type", "hidden");
        txt.setAttribute("name", "malTreat[]");

        var diver = document.getElementById("malTreatmentSection");

        diver.appendChild(txt);
      }
    } // close select treatment
    /**
     * [selectseverediaTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectseverediaTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "severediaTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[SevereDehydration][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectsomedehydrationdiaTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectsomedehydrationdiaTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "somedehydrationdiaTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[SomeDehydration][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectdysentryTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectdysentryTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "dysentryTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[Dysentry][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectnodehydrationdiaTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectnodehydrationdiaTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "nodehydrationTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[NoDehydration][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectnoclassificationTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectnoclassificationTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "noclassificationTreatment_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'mchtreatment[NoClassification][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectothertreatmentTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectothertreatmentTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "othertreat_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'indicatormchsymptom[pne][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectdiaresponseTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectdiaresponseTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "diaresponse_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'indicatormchsymptom[dia][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectfevresponseTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectfevresponseTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "fevresponse_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'indicatormchsymptom[fev][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [selectearresponseTreatment description]
     * @param  {[type]} select [description]
     * @return {[type]}        [description]
     */
  function selectearresponseTreatment(select) {
      var value = select.options[select.selectedIndex].value;
      if (value != "earresponse_0") {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ol')[0];
        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
          if (choices[i].value == option.value)
            return;
        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);
        input.type = 'hidden';
        input.name = 'indicatormchsymptom[ear][]';
        input.value = option.value;
        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute("id", code);
        li.setAttribute('class', 'treatment');
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
        var code = select.options[select.selectedIndex].value;
        ul.appendChild(li);
      }
    } // close select treatment
    /**
     * [toggle_table description]
     * @param  {[type]} el [description]
     * @return {[type]}    [description]
     */
  function toggle_table(el) {
      id = $(el).attr("id");
      name = $(el).attr("name");
      radioValue = $(el).attr("value");
      // alert("This is the id: "+id+" and definately the name: "+name);
      if (radioValue === '1') {
        $('.' + name).show();
      } else {
        $('.' + name).hide();
      }
    }
    /**
     * [break_form_to_steps description]
     * @param  {[type]} form_id [description]
     * @return {[type]}         [description]
     */
  function break_form_to_steps(form_id) {
      //form_id='#zinc_ors_inventory';
      //alert(form_id);
      var end_url;
      $(form_id).formwizard({
        formPluginEnabled: false,
        validationEnabled: false,
        historyEnabled: true,
        focusFirstInput: true,
        textNext: 'Save and Go to the Next Section',
        textBack: 'View Previous Section',
        formOptions: {
          //success: function(data){$("#status").fadeTo(500,1,function(){ $(this).html("Thank you for completing this assessment! :) ").fadeTo(5000, 0); })},
          //beforeSubmit: function(data){$("#data").html("Processing...");},
          dataType: 'json',
          resetForm: true,
          disableUIStyles: true
        }
      });

      //remove some jQueryUI styles
      $(form_id).find('input,select,radio,form').removeClass(
        'ui-helper-reset ui-state-default ui-helper-reset ui-wizard-content'
      );

      var remoteAjax = {}; // empty options object

      $(form_id + " .step").each(function() { // for each step in the wizard, add an option to the remoteAjax object...
        if (survey == 'mnh') {
          form_url = base_url + "submit/c_form/complete_mnh_survey";
        } else if (survey == 'hcw') {
          form_url = base_url + "submit/c_form/complete_hcw_survey";
        } else {
          form_url = base_url + "submit/c_form/complete_ch_survey";
        }

        remoteAjax[$(this).attr("id")] = {
          url: form_url,
          dataType: 'json',
          beforeSubmit: function(data) {
            $("#data").html('<div class="loader" >Loading...</div>')
          },
          //beforeSubmit: function(data){$("#data").html("Saving the previous section's response")},
          success: function(data) {
            if (data) { //data is either true or false (returned from store_in_database.html) simulating successful / failing store
              //$("#data").show();
              $("#data").html("Section was Saved Successfully...").fadeTo(
                "slow", 0);
              $(form_id).bind("after_remote_ajax", function(event,
                fdata) {
                //console.log($(form_id).formwizard('state'));
                if (survey == 'mnh') {
                  if (fdata.currentStep == 'section-8') {

                    $(".form-container .actual-form").load(
                      base_url + 'survey/survey_complete',
                      function() {
                        window.location = base_url +
                          '/assessment';
                      });

                    message = fac_name + ' in ' + fac_district +
                      ' District, ' + fac_county +
                      ' County, has completed the ' + survey.toUpperCase() +
                      ' Survey.';
                    console.log(message);
                    // runNotification(base_url, 'c_admin/getContacts', message);
                  }

                } else if (survey == 'ch') {
                  if (fdata.currentStep == 'section-9') {
                    //alert('Yes');
                    //$(form_id).formwizard('reset');
                    //$(form_id).formwizard('show','No');
                    // console.log($(form_id).formwizard('state'));
                    $(".form-container .actual-form").load(
                      base_url + 'survey/survey_complete',
                      function() {
                        window.location = base_url +
                          '/assessment';
                      });

                    message = fac_name + ' in ' + fac_district +
                      ' District, ' + fac_county +
                      ' County, has completed the ' + survey.toUpperCase() +
                      ' Survey.';
                    console.log(message);
                    // runNotification(base_url, 'c_admin/getContacts', message);
                  }
                } else {
                  if (fdata.currentStep == 'section-5') {
                    //alert('Yes');
                    //$(form_id).formwizard('reset');
                    //$(form_id).formwizard('show','No');
                    // console.log($(form_id).formwizard('state'));
                    $(".form-container .actual-form").load(
                      base_url + 'survey/survey_complete',
                      function() {
                        window.location = base_url +
                          '/assessment';
                      });

                    message = fac_name + ' in ' + fac_district +
                      ' District, ' + fac_county +
                      ' County, has completed the ' + survey.toUpperCase() +
                      ' Survey.';
                    console.log(message);
                    // runNotification(base_url, 'c_admin/getContacts', message);
                  }
                }

              });
            } else {
              $("#data").html("");
              alert(
                "An unknown error occurred, try retaking the survey later on. Kindly report this incidence."
              );
              return false;
            }

            return data; //return true to make the wizard move to the next step, false will cause the wizard to stay on the current step
          }

        };


      });

      $(form_id).formwizard("option", "remoteAjax", remoteAjax); // set the remoteAjax option for the wizard



      $(form_id).bind("before_step_shown", function(event, data) {

        //alert(form_id);
        if (form_id == "#mch_tool") {
          if (data.previousStep == 'section-6') {
            //alert('yes');
            if (data.currentStep == 'No') {
              $("#data").fadeTo(5000, 0);
              $('#sectionNavigation').hide();

            }
          } else if (data.currentStep == 'section-6') {
            //$(form_id).formwizard("destroy");
            $('#back').prop('disabled', true);
          } else {
            $('#sectionNavigation').show();
          }

        } else {
          if (data.previousStep == 'section-1') {
            //alert('yes');
            if (data.currentStep == 'No') {
              $("#data").fadeTo(5000, 0);
              //$('#sectionNavigation').hide();
              $(".form-container .actual-form").load(base_url +
                'survey/survey_complete',
                function() {
                  window.location = base_url + '/assessment';
                });

            }
          } else if (data.currentStep == 'section-6') {
            //$(form_id).formwizard("destroy");
            $('#back').prop('disabled', true);
          } else {
            $('#sectionNavigation').show();
          }
        }
      });

      /**
       * [description]
       * @return {[type]} [description]
       */
      $('#facDeliveriesDone').change(function() {
        if ($(this).val() == "Yes" || $(this).val() == "") {
          //show next section, hide this section
          $('#delivery_centre').find('input').prop('disabled', true);
          $('#delivery_centre').hide();

          //alert('Y');
        } else if ($(this).val() == "No") {
          //show the follow up qn
          $('#delivery_centre').find('input').prop('disabled', false);
          $('#delivery_centre').show();

          //alert('N');
        }
      });

      /**
       * [UpdateTableHeaders description]
       */
      function UpdateTableHeaders() {
          $(".persist-area").each(function() {

            var el = $(this),
              offset = el.offset(),
              scrollTop = $(window).scrollTop(),
              floatingHeader = $(".floatingHeader", this)

            if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
              floatingHeader.css({
                "visibility": "visible"
              });
            } else {
              floatingHeader.css({
                "visibility": "hidden"
              });
            };
          });
        }
        /**
         * [description]
         * @return {[type]} [description]
         */
      $(function() {

        var clonedHeaderRow;

        $(".persist-area").each(function() {
          clonedHeaderRow = $(".persist-header", this);
          clonedHeaderRow
            .before(clonedHeaderRow.clone())
            .css("width", clonedHeaderRow.width())
            .addClass("floatingHeader");

        });

        $(window)
          .scroll(UpdateTableHeaders())
          .trigger("scroll");

      });


    } //--end of function break_form_to_steps(form_id)
    /**
     * [getDistrictData description]
     * @param  {[type]} base_url        [description]
     * @param  {[type]} county          [description]
     * @param  {[type]} survey_type     [description]
     * @param  {[type]} survey_category [description]
     * @return {[type]}                 [description]
     */
  function getDistrictData(base_url, district, survey_type, survey_category) {
      //alert(county);
      $.ajax({
        url: base_url + 'survey/getDistrictData/' + survey_type + '/' +
          survey_category + '/' + district,
        beforeSend: function(xhr) {
          xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
          obj = jQuery.parseJSON(data);
          console.log(obj);
          $('#current_survey').text(survey_type.toUpperCase() +
            ' SURVEY');
          $('#targeted').text(obj[0].actual);
          $('#finished').text(obj[0].reported);
          $('#not-finished').text(obj[0].pending);
          $('#not-started').text(obj[0].notstarted);
          var percentage = Math.round((obj[0].reported / obj[0].actual *
            100), 2);
          $('#percentage_completed').text(percentage + '%')
            // $('#district_progress').attr('aria-valuenow', percentage);
          $('#district_progress .bar').css('width', percentage + '%');
        }
      });
    }

    function getCountyData(base_url)
    {

      $.ajax({
        url: base_url + 'survey/getCountyCountData',
        beforeSend: function(xhr) {
          xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data)
        {
          alert(data);
          obj = jQuery.parseJSON(data);
          console.log(obj);
        },
        fail: function()
        {
          alert("failed");
        }
      });
    }
    /**
     * [check description]
     * @param  {[type]} el [description]
     * @return {[type]}    [description]
     */
  function check(el) {

      id = $(el).attr("id");
      name = $(el).attr("name");


      if ($('#' + id).prop("checked")) {
        $('.' + id).attr("readonly", false);
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'mchtreatmentnew[' + name + '][]';
        input.value = el.value;
        document.getElementById("chells").appendChild(input);

      } else {
        $('.' + id).attr("readonly", true);
        $('.' + id).attr("value", 0);
      }

    }
    /**
     * [loadSection description]
     * @param  {[type]} section [description]
     * @param  {[type]} action  [description]
     * @return {[type]}         [description]
     */
    /*function loadSection(survey_type,survey_category,$facility){
		$('.actual-form .step').hide();
		$.ajax({
			url: base_url + 'survey/getFacilitySection/' + survey_type + '/' + survey_category + '/' + facility,
			beforeSend: function(xhr) {
				xhr.overrideMimeType("text/plain; charset=x-user-defined");
			},
			success: function(data) {
				obj = jQuery.parseJSON(data);
				console.log(obj);
				(data != '') ? $('#'+data).show() : $('#section-1').show;
	//
			}
		});

		}
	}*/


}

/*---------------------end form wizard functions----------------------------------------------------------------*/
