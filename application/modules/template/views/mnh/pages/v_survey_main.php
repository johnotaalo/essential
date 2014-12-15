<?php
$mfName = $this -> session -> userdata('fName');
$mfacilityMFL = $this -> session -> userdata('facilityMFL');
?>


<script type="text/javascript" src="<?php echo base_url()?>assets/javascripts/style-table.js"></script>


<script src="<?php echo base_url()?>assets/javascripts/survey.js"></script>

<script>
    $().ready(function(){
        base_url='<?php  echo base_url(); ?>';
        survey='<?php echo $this->session->userdata("survey"); ?>';
        survey_category='<?php echo $this->session->userdata("survey_category");  ?>';
        district='<?php echo $this->session->userdata("dName");  ?>';
        $(document).ready(startSurvey(base_url, survey, survey_category, district));
        loadSectionList(base_url,survey);

    });
    /**
     * [loadSectionList description]
     * @param  {[type]} base_url    [description]
     * @param  {[type]} survey_type [description]
     * @return {[type]}             [description]
     */
    function loadSectionList(base_url,survey_type){
$.ajax({
            url: base_url + 'survey/loadSection/' + survey_type,
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=x-user-defined");
            },
            success: function(data) {
                obj = jQuery.parseJSON(data);
                console.log(obj);
                $('#steps').html(obj);
            }
        });
    }
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
</script>

<style type="text/css">
    .ui-autocomplete-loading {
        background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
        border-color: #ffffff;
        color:#FF0000;
    }

    .hcw-action
    {
        cursor: pointer;
    }

    .label
    {
        display: block;
        font-size: 90%;
        margin: .5em .5em 0 0;
    }

    .trace, .declined
    {
        cursor: pointer;
    }
    .trace:hover, .declined:hover
    {
        text-decoration: none;
    }
</style>

</head>
<body id="top">


    <div id="site">
        <div class="center-wrapper">
            <div class="form-container ui-widget" >
            <div class="ui vertical steps" id="steps" style="display:none"></div>
            <div class="ui message info" id="click_form">
              <i class="icon attention"></i> Please click on the <b><i>LINK</i></b> corresponding with the respective Survey to Begin / Continue the Survey.

            </div>
<div class='actual-form'>
</div>



            </div>



        </div>
    </div>
    <div id="form_post" class="ui bottom sidebar menu">
      <div>
        <a style="font-size:12px;float:right;margin-top:5px;margin-right:5px" class="positive ui labeled icon button mini" id = "next_btn">
      <i class="icon save"></i>Save Section</a>
      </div>
    </div>
