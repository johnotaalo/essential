<?php
class Generate extends MY_Controller
{
    public $mode;
    function __construct() {
        parent::__construct();
        $this->load->model('data_model');
        $this->survey_form = $this->session->userdata('survey_form');

        // echo $this->survey_form;



        /**
         * Call Sections Creators
         */

        // $mode = $this->survey_form;
        // echo $mode;die;
        // $this->createIndicatorSection();
        // $this->createQuestionSection();


    }

    /**
     * [getRepositoryByFormName description]
     * @param  [type] $form [description]
     * @return [type]       [description]
     */
    function getRepositoryByFormName($form) {
        $this->the_form = $this->em->getRepository($form);
        return $this->theForm;
    }

    /**
     * [createIndicatorSection description]
     * @return [type] [description]
     */
    public function createIndicatorSection() {
        $data_found = $this->data_model->getIndicators();

        // var_dump($data_found);die;
        $retrieved = $this->data_model->retrieveData('log_indicators', 'indicator_code');
        $counter = 0;
        $countme = 0;
        $section = '';
        $numbering = array_merge(range('A', 'Z'), range('a', 'z'));
        $base = 0;
        $b = 0;
        $current = "";
        $responseHCWRow = $responseAssessorRow = '';
        switch ($this->survey_form) {
            case 'online':
            foreach ($data_found as $value) {
                $counter++;
                $b++;
                $section = $value['indicatorFor'];
                $current = ($base == 0) ? $section : $current;
                $base = ($current != $section) ? 0 : $base;
                $current = ($base == 0) ? $section : $current;

                if (array_key_exists($value['indicatorCode'], $retrieved)) {
                    $indicatorHCWResponse = ($retrieved[$value['indicatorCode']]['li_hcwResponse'] != 'N/A') ? $retrieved[$value['indicatorCode']]['li_hcwResponse'] : '';
                    $indicatorAssessorResponse = ($retrieved[$value['indicatorCode']]['li_assessorResponse'] != 'N/A') ? $retrieved[$value['indicatorCode']]['li_assessorResponse'] : '';

                    $indicatorHCWFindings = ($retrieved[$value['indicatorCode']]['li_hcwFindings'] != 'N/A') ? $retrieved[$value['indicatorCode']]['li_hcwFindings'] : '';
                    $indicatorAssessorFindings = ($retrieved[$value['indicatorCode']]['li_assessorFindings'] != 'N/A') ? $retrieved[$value['indicatorCode']]['li_assessorFindings'] : '';
                }
                if ($indicatorHCWResponse == 'Yes') {
                    $responseHCWRow = '<td>Yes <input id="indicatorhcwResponse_' . $counter . '" checked="checked" name="indicatorhcwResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" id="indicatorhcwResponse_' . $counter . '" name="indicatorhcwResponse_' . $counter . '"  type="radio">';
                } else if ($indicatorHCWResponse == 'No') {
                    $responseHCWRow = '<td>Yes <input id="indicatorhcwResponse_' . $counter . '" name="indicatorhcwResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" checked="checked" id="indicatorhcwResponse_' . $counter . '" name="indicatorhcwResponse_' . $counter . '"  type="radio">';
                } else {
                    $responseHCWRow = '<td>Yes <input id="indicatorhcwResponse_' . $counter . '" name="indicatorhcwResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" id="indicatorhcwResponse_' . $counter . '" name="indicatorhcwResponse_' . $counter . '"  type="radio">';
                }

                if ($indicatorAssessorResponse == 'Yes') {
                    $responseAssessorRow = '<td>Yes <input checked="checked" name="indicatorassessorResponse_' . $counter . '" id="indicatorassessorResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="indicatorassessorResponse_' . $counter . '" id="indicatorassessorResponse_' . $counter . '" type="radio">';
                } else if ($indicatorAssessorResponse == 'No') {
                    $responseAssessorRow = '<td>Yes <input name="indicatorassessorResponse_' . $counter . '" id="indicatorassessorResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" checked="checked" name="indicatorassessorResponse_' . $counter . '" id="indicatorassessorResponse_' . $counter . '" type="radio">';
                } else {
                    $responseAssessorRow = '<td>Yes <input name="indicatorassessorResponse_' . $counter . '" id="indicatorassessorResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="indicatorassessorResponse_' . $counter . '" id="indicatorassessorResponse_' . $counter . '" type="radio">';
                }

                $base++;
                $findingRow = '';

                $findingHCWRow = $findingAssessorRow = "";
                if ($value['indicatorFindings'] != NULL) {
                    $findings = explode(';', $value['indicatorFindings']);
                    if (sizeof($findings) == 1) {
                        foreach ($findings as $finding) {
                            $findingHCWRow = $finding . ' <input value="' . $indicatorHCWFindings . '" type="text" name="indicatorhcwFindings_' . $counter . '" id="indicatorhcwFindings_' . $counter . '">';
                            $findingAssessorRow = $finding . ' <input type="text" value="' . $indicatorAssessorFindings . '" name="indicatorassessorFindings_' . $counter . '" id="indicatorassessorFindings_' . $counter . '">';
                        }
                    } else {
                        $findingHCWRow = $findingAssessorRow = '';
                        foreach ($findings as $finding) {

                            if ($finding == 'other (specify)') {
                                if ($indicatorHCWFindings == $finding) {
                                    $findingHCWRow.= $finding . ' <input name="indicatorhcwFindings_' . $counter . '" checked="checked" id="indicatorhcwFindings_' . $counter . '"  type="radio"><input type="text" style="display:none" name="indicatorhcwOtherFindings_' . $counter . '" id="indicatorhcwOtherFindings_' . $counter . '" />';
                                } else {
                                    $findingHCWRow.= $finding . ' <input name="indicatorhcwFindings_' . $counter . '" id="indicatorhcwFindings_' . $counter . '"  type="radio"><input type="text" style="display:none" name="indicatorhcwOtherFindings_' . $counter . '" id="indicatorhcwOtherFindings_' . $counter . '" />';
                                }
                                if ($indicatorAssesorFindings == $finding) {
                                    $findingAssessorRow.= $finding . ' <input name="indicatorassessorFindings_' . $counter . '" checked="checked" id="indicatorassessorFindings_' . $counter . '"  type="radio"><input type="text" style="display:none" name="indicatorassessorOtherFindings_' . $counter . '" id="indicatorassessorOtherFindings_' . $counter . '" />';
                                } else {
                                    $findingAssessorRow.= $finding . ' <input name="indicatorassessorFindings_' . $counter . '" id="indicatorassessorFindings_' . $counter . '"  type="radio"><input type="text" style="display:none" name="indicatorassessorOtherFindings_' . $counter . '" id="indicatorassessorOtherFindings_' . $counter . '" />';
                                }
                            } else {
                                if ($indicatorHCWFindings == $finding) {
                                    $findingHCWRow.= $finding . ' <input name="indicatorhcwFindings_' . $counter . '" checked="checked" id="indicatorhcwFindings_' . $counter . '"  type="radio" value="' . $finding . '">';
                                } else {
                                    $findingHCWRow.= $finding . ' <input name="indicatorhcwFindings_' . $counter . '" id="indicatorhcwFindings_' . $counter . '"  type="radio" value="' . $finding . '">';
                                }
                                if ($indicatorAssesorFindings == $finding) {
                                    $findingAssessorRow.= $finding . ' <input name="indicatorassessorFindings_' . $counter . '" checked="checked" id="indicatorassessorFindings_' . $counter . '"  type="radio" value="' . $finding . '">';
                                } else {
                                    $findingAssessorRow.= $finding . ' <input name="indicatorassessorFindings_' . $counter . '" id="indicatorassessorFindings_' . $counter . '"  type="radio" value="' . $finding . '">';
                                }
                            }
                        }
                    }
                }
                if ($section != 'svc' && $section != 'ror' && $section != 'tl') {
                    if ($value['indicatorName'] == 'Correct Classification') {
                        $data[$section][] = '
<tr>
                                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                        <td></td>
                                        <td></td>
                                        ' . $responseAssessorRow . '
                                        <td></td>
                                        <input type="hidden"  name="indicatorCode_' . $counter . '" id="indicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                    } else if ($section == 'sgn') {
                        $data[$section][] = '
<tr>
                                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                        ' . $responseHCWRow . '
                                        <td>' . $findingHCWRow . '</td>
                                        <input type="hidden"  name="indicatorCode_' . $counter . '" id="indicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                    } else {
                        if ($value['indicatorCode'] == 'CHI105') {
                            $data[$section][] = '<tr><th colspan="5"><strong>(' . $numbering[$base - 1] . ')</strong>Breathing</th></tr>';
                        }
                        if (($value['indicatorCode'] >= 'CHI105') && ($value['indicatorCode'] <= 'CHI110')) {
                            $countme++;
                            $data[$section][] = '
<tr>
                                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                        ' . $responseHCWRow . '
                                        <td>' . $findingHCWRow . '</td>
                                        ' . $responseAssessorRow . '
                                        <td>' . $findingAssessorRow . '</td>
                                        <input type="hidden"  name="indicatorCode_' . $counter . '" id="indicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                        } else {
                            $data[$section][] = '
<tr>
                                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                        ' . $responseHCWRow . '
                                        <td>' . $findingHCWRow . '</td>
                                        ' . $responseAssessorRow . '
                                        <td>' . $findingAssessorRow . '</td>
                                        <input type="hidden"  name="indicatorCode_' . $counter . '" id="indicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                        }
                    }
                } else {
                    $data[$section][] = '
<tr>
                                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                        ' . $responseHCWRow . '
                                        <td>' . $findingHCWRow . '</td>
                                        <input type="hidden"  name="indicatorCode_' . $counter . '" id="indicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                }
            }
            break;

            case 'offline':
            foreach ($data_found as $value) {
                $counter++;
                $section = $value['indicatorFor'];
                $current = ($base == 0) ? $section : $current;
                $base = ($current != $section) ? 0 : $base;
                $current = ($base == 0) ? $section : $current;

                $base++;

                $findingRow = '';
                if ($section != 'sgn' && $section != 'svc' && $section != 'ror' && $section != 'tl') {

                    $findings = explode(';', $value['indicatorFindings']);
                    if (sizeof($findings) == 1) {
                        foreach ($findings as $finding) {
                            $findingRow = $finding . ' <input type="text">';
                        }
                    } else {
                        foreach ($findings as $finding) {
                            if ($finding == 'other (specify)') {
                                $findingRow.= $finding . ' <input name="mchIndicatorFinding_' . $counter . '"  type="text">';
                            } else {
                                $findingRow.= $finding . ' <input name="mchIndicatorFinding_' . $counter . '" value="' . $finding . '" type="radio">';
                            }
                        }
                    }
                    if ($value['indicatorName'] == 'Correct Classification') {
                        $data[$section][] = '
<tr>
                                    <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                    <td></td><td></td><td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio"></td><td></td>
                                    <input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                    } else {
                        $data[$section][] = '
<tr>
                                    <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
                                    <td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio">
</td>
<td>' . $findingRow . '</td>
<td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio">
</td>
<td>' . $findingRow . '</td>
<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                    }
                } elseif ($section == 'sgn') {
                    $data[$section][] = '
                <tr>
<td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
<td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio">
</td>
<td>Present <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> Not Present <input value="No" name="mchIndicator_' . $counter . '"  type="radio">
</td>
<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                } elseif ($section == 'svc') {
                    $findings = explode(';', $value['indicatorFindings']);
                    foreach ($findings as $finding) {
                        if (!empty($finding)) {
                            $findingRow = '<input type="text"> ' . $finding;
                        }
                    }
                    $data[$section][] = '
                <tr>
<td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
<td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio">
</td>
<td>' . $findingRow . '</td>
<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                } else {
                    $data[$section][] = '
                <tr>
<td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['indicatorName'] . '</td>
<td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio">
</td>
<input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['indicatorCode'] . '" />
</tr>';
                }
            }
            break;
        }

        foreach ($data as $key => $value) {
            $this->indicators[$key] = '';
            foreach ($value as $val) {
                $this->indicators[$key].= $val;
            }
        }

        // echo $this->indicators['ear'];die;
        return $this->indicators;
    }

    /**
         * [createQuestionSection description]
         * @return [type] [description]
         */
    public function createQuestionSection() {

        // echo $this->survey_form;die;
        $data_found = $this->data_model->getQuestions();

        /**
             * [$data description]
             * @var array
             */
        $data = array();

        /**
             * [$retrieved description]
             * @var [type]
             */
        $retrieved = $this->data_model->retrieveData('log_questions', 'question_code');

        /**
             * [$counter description]
             * @var integer
             */
        $counter = 0;

        /**
             * [$section description]
             * @var string
             */
        $section = '';

        /**
             * [$numbering description]
             * @var array
             */
        $numbering = array_merge(range('A', 'Z'), range('a', 'z'));

        /**
             * [$base description]
             * @var integer
             */
        $base = 0;

        /**
             * [$current description]
             * @var string
             */
        $current = "";

        switch ($this->survey_form) {
            case 'online':
            foreach ($data_found as $value) {
                $counter++;

                $section = $value['questionFor'];
                $current = ($base == 0) ? $section : $current;
                $base = ($current != $section) ? 0 : $base;
                $current = ($base == 0) ? $section : $current;
                $questionResponse = '';
                if (array_key_exists($value['questionCode'], $retrieved)) {
                    $questionResponse = ($retrieved[$value['questionCode']]['lq_response'] != 'n/a') ? $retrieved[$value['questionCode']]['lq_response'] : '';
                    $questionCount = ($retrieved[$value['questionCode']]['lq_response_count'] != 'n/a') ? $retrieved[$value['questionCode']]['lq_response_count'] : '';
                    $questionReason = ($retrieved[$value['questionCode']]['lq_reason'] != 'n/a') ? $retrieved[$value['questionCode']]['lq_reason'] : '';
                }
                $base++;
                if ($section == 'nur') {
                    $data[$section][] = '
                <tr>
                <td colspan = "1"<strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['questionName'] . '</td>
                <td><input type = "text" name = "questionCount_' . $counter . '" value = "' . $questionCount . '"></td>
                <input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
                </tr>';
                } else if ($section == 'hs') {
                    $data[$section][] = '<tr>
                    <td >' . $value['questionName'] . '</td>
                    <td >
                    <label for="General_OPD" style="font-weight:normal">General OPD</label>
                    <input type="radio" value= "General OPD" name="questionResponse_' . $counter . '[]" id="questionResponse_GeneralOPD' . $counter . '" class="cloned"/>
                    <label for="Paediatric_OPD" style="font-weight:normal">Paediatric OPD</label>
                    <input type="radio" value= "Paediatric OPD" name="questionResponse_' . $counter . '[]" id="questionResponse_PaediatricOPD' . $counter . '" class="cloned"/>
                    <label for="MCH" style="font-weight:normal">MCH</label>
                    <input type="radio" value= "MCH" name="questionResponse_' . $counter . '[]" id="questionResponse_MCH' . $counter . '" class="cloned"/>
                    <label for="Other" style="font-weight:normal">Other</label>
                    <input type="radio" value= "Other" name="questionResponse_' . $counter . '[]" id="questionResponse_Other' . $counter . '" class="cloned"/>
                    <input type="text" name="questionResponseOther_' . $counter . '[]" id="questionResponseOther_' . $counter . '" class="cloned"/>
                    </td>
                    <input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
                </tr>';
                } else if ($section == 'guide' || $section == 'job') {
                    $guidelinequestions = '<tr>
            <td>' . $value['questionName'] . '</td>
            <td>
            <select name="questionResponse_' . $counter . '" id="questionResponse_' . $counter . '" class="cloned is-guideline">';
                    if ($questionResponse == 'Yes') {
                        $guidelinequestions.= '<option value="">Select One</option>
                <option value="Yes" selected="selected">Yes</option>
                <option value="No">No</option>';
                    } else if ($questionResponse == 'No') {
                        $guidelinequestions.= '<option value="">Select One</option>
                <option value="Yes">Yes</option>
                <option value="No" selected="selected">No</option>';
                    } else {
                        $guidelinequestions.= '<option value="" selected="selected">Select One</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>';
                    }
                    $guidelinequestions.= '</select>
            </td>
            <td ><input type="text" name="questionCount_' . $counter . '" id="questionCount_' . $counter . '" size="6" class="numbers" value = "' . $questionCount . '" disabled/></td>
            <input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                    $data[$section][] = $guidelinequestions;
                } else {
                    if ($value['questionName'] == 'Document cases seen over 3 months') {
                        $numbers = explode(',', $questionResponse);
                        $data[$section][] = '
                            <tr>
                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['questionName'] . '</td>
                     <td>March <input name="questionResponse_' . $counter . '[' . 'March' . ']"  type="number" value = "' . $numbers[0] . '">  April <input name="questionResponse_' . $counter . '[' . 'April' . ']"  type="number" value = "' . $numbers[1] . '">
                        May <input name="questionResponse_' . $counter . '[' . 'May' . ']"  type="number" value = "' . $numbers[2] . '"></td>
                        <input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
                    </tr>';
                    } else {
                        if ($questionResponse == 'Yes') {
                            $questionRow = '<td>Yes <input name="questionResponse_' . $counter . '" checked="checked" value="Yes" type="radio"> No <input value="No" name="questionResponse_' . $counter . '"  type="radio"><input type="text" style="display:none" name="questionReason_' . $counter . '"></td>';
                        } else if ($questionResponse == 'No') {
                            $questionRow = '<td>Yes <input name="questionResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" checked="checked" name="questionResponse_' . $counter . '"  type="radio"><input type="text" name="questionReason_' . $counter . '"></td>';
                        } else {
                            $questionRow = '<td>Yes <input name="questionResponse_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="questionResponse_' . $counter . '"  type="radio"></td>';
                        }
                        $data[$section][] = '
                            <tr>
                        <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['questionName'] . '</td>
                            ' . $questionRow . '
                        <input type="hidden"  name="questionCode_' . $counter . '" id="questionCode_' . $counter . '" value="' . $value['questionCode'] . '" />
                    </tr>';
                    }
                }
            }
            break;

            case 'offline':
            foreach ($data_found as $value) {
                $counter++;
                $section = $value['questionFor'];
                $current = ($base == 0) ? $section : $current;
                $base = ($current != $section) ? 0 : $base;
                $current = ($base == 0) ? $section : $current;

                $base++;
                if ($value['questionName'] == 'Document cases seen over 3 months') {

                    $data[$section][] = '
                <tr>
            <td colspan="1"><strong>(' . $numbering[$base - 1] . ')</strong> ' . $value['questionName'] . '</td>
         <td>March <input name="questionResponse_' . $counter . '"  type="text">  April <input name="questionResponse_' . $counter . '"  type="text">
            May <input name="questionResponse_' . $counter . '"  type="text"></td>
            <input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                } else {
                    if ($section == 'ceoc') {
                        if ($value['questionCode'] == 'QMNH03') {
                            $follow_up_question = '
            <tr id="transfusion_y">
    <td><b>(A)</b> If blood transfusion is performed, indicate <strong>main source</strong> of blood</td>
    <td>
        1. Blood bank available<input type="checkbox">2. Transfusions done but no blood bank<input type="checkbox">3. Other(specify)<input type="checkbox">

    <br/>
    <label id="label_followup_other_' . $counter . '">Provide Other</label>
    <br/>
    <input type="text"  name="mnhceocFollowUpOther_' . $counter . '" id="mnhceocFollowUpOther_' . $counter . '" value="" size="64" class="cloned" />
    </td>
</tr>
<tr id="transfusion_n">
    <td><b>(B)</b>Give a reason why blood transfusion is <strong>not</strong> performed</td>
    <td>
    1. Blood not available<input type="checkbox">2. Supplies and equipment not available<input type="checkbox">3. Other(specify)<input type="checkbox">
    <br/>
    <label id="label_reason_other_' . $counter . '">Other Reason</label>
    <br/>
    <input type="text"  name="mnhceocReasonOther_' . $counter . '" id="mnhceocReasonOther_' . $counter . '" value="" size="64" class="cloned" />
    </td>
</tr>';
                        } elseif ($value['questionCode'] == 'QMNH06a' || $value['questionCode'] == 'QMNH06b') {
                            $follow_up_question = '';
                        } else {
                            $follow_up_question = '<tr id="csdone_n">
    <td><b>(A)</b>If NO, Give the MAIN reason for <strong>not</strong> conducting Caeserian Section</td>
    <td>
    1. Supplies and equipment not available<input type="checkbox">
    2. Theatre space not available<input type="checkbox">
    3. Human Resource not available<input type="checkbox">
    4. Other(specify)<input type="checkbox">
    <br/>
    <label id="label_reason_other_' . $counter . '">Other Reason</label>
    <br/>
    <input type="text"  name="mnhceocReasonOther_' . $counter . '" id="mnhceocReasonOther_' . $counter . '" value="" size="64" class="cloned" />
    </td>
</tr>';
                        }

                        $data[$section][] = '<tr>
        <td ><strong>(' . ($base) . ').</strong> ' . $value['questionName'] . '</td>
        <td >
        Yes<input type="checkbox">No<input type="checkbox">
        </td>' . $follow_up_question . '
        <input type="hidden"  name="mnhceocAspectCode_' . $counter . '" id="mnhceocAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
    </tr>';
                    } else if ($section == 'hiv') {
                        $data[$section][] = '
                <tr>
            <td colspan="1"> <strong>(' . $base . ')</strong>' . $value['questionName'] . '</td>
         <td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio">If NO, give MAIN reason <input type="text" style="width:200px"></td>
            <input type="hidden"  name="questionCode' . $counter . '" id="questionCode' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                    } else if ($section == 'waste') {
                        $data[$section][] = '<tr>
        <td colspan="1"><strong>(' . $base . ').</strong> ' . $value['questionName'] . '</td>
        <td colspan="1">
        Waste Pit<input type="radio">Placenta Pit<input type="radio">Incinerator<input type="radio">Burning<input type="radio">Other<input type="radio">
        </td>' . '
        <input type="hidden"  name="wastedisposalAspectCode_' . $counter . '" id="wastedisposalAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
    </tr>';
                    }

                    /**
                             * If Section is Job Aids, Guidelines MNH or Guidelines MCH
                             * @var [type]
                             */
                    else if ($section == 'job' || $section == 'guide' || $section == 'gp') {
                        $data[$section][] = '
                <tr>
            <td colspan="1"> <strong>(' . $base . ')</strong>' . $value['questionName'] . '</td>
         <td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="radio"> No <input value="No" name="mchIndicator_' . $counter . '"  type="radio"></td>
          <td><input type="number"></td>
            <input type="hidden"  name="questionCode' . $counter . '" id="questionCode' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                    }

                    /**
                             * If Section is Water Resource
                             * @var [type]
                             */
                    else if ($section == 'mnhw') {
                        $supplierOptions = $this->createSupplierOptions();
                        $aspect_response_on_yes = '';

                        if ($value['questionCode'] == 'QMNH01') {
                            $aspect_response_on_yes = '<label>Water Storage Point</label><br/>
            <input type="text"  name="mnhwAspectWaterSpecify_' . $counter . '" id="mnhwStoragePoint_' . $counter . '" value="" size="45" placeholder="specify"/>';
                        } else {
                            $aspect_response_on_yes = '<label style="font-weight:bold">Main Source</label><br/>' . $supplierOptions['mh'];
                        }
                        $data[$section][] = '<tr>
            <td>' . $value['questionName'] . '</td>
            <td>
            Yes<input type="checkbox">No<input type="checkbox">
            </td>
            <td >
            ' . $aspect_response_on_yes . '
            </td>
            <input type="hidden"  name="mnhwAspectCode_' . $counter . '" id="mnhwAspectCode_' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                    }

                    /**
                             * If Section is Community Strategy
                             * @var [type]
                             */
                    else if ($section == 'cms') {
                        $foundC = strpos($value['questionCode'], 'QUC');
                        $foundM = strpos($value['questionCode'], 'QMNH');
                        $section = ($foundM !== false) ? 'cmsM' : 'cmsC';
                        $data[$section][] = '
                <tr>
            <td colspan="1"><strong>(' . $base . ')</strong> ' . $value['questionName'] . '</td>
         <td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="checkbox"> No <input value="No" name="mchIndicator_' . $counter . '"  type="checkbox"></td>
            <input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                    } else {
                        $data[$section][] = '
                <tr>
            <td colspan="1"><strong>(' . $base . ')</strong> ' . $value['questionName'] . '</td>
         <td>Yes <input name="mchIndicator_' . $counter . '" value="Yes" type="checkbox"> No <input value="No" name="mchIndicator_' . $counter . '"  type="checkbox"></td>
            <input type="hidden"  name="mchIndicatorCode_' . $counter . '" id="mchIndicatorCode_' . $counter . '" value="' . $value['questionCode'] . '" />
        </tr>';
                    }
                }
            }
            break;
        }

        // echo '<pre>'; print_r( $data);echo '</pre>';die;
        foreach ($data as $key => $value) {
            $this->questions[$key] = '';
            foreach ($value as $val) {
                $this->questions[$key].= $val;
            }
        }

        // var_dump($this->questions['cms']);die;
        return $this->questions;
    }
    public function createCommoditySection() {
        $data_found = $this->data_model->getCommodities();
        $retrieved = $this->data_model->retrieveData('available_commodities', 'comm_code');

        // echo"<pre>";print_r($data_found);die;
        $counter = 0;
        $survey = $this->session->userdata('survey');
        switch ($survey) {
            case 'mnh':
            $locations = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Pharmacy', 'Other', 'Not Applicable');
            break;

            case 'ch':

            $locations = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Pharmacy', 'Other', 'Not Applicable');
            break;
        }

        /**
                 * [$availabilities description]
                 * @var array
                 */
        $availabilities = array('Available', 'Never Available');

        /**
                 * [$reasons description]
                 * @var array
                 */
        $reasons = array('Select One', '1. Not Ordered', '2. Ordered but not yet Received', '3. Expired');

        /**
                 * [$reasonUnavailable description]
                 * @var string
                 */
        $reasonUnavailable = '';

        switch ($this->survey_form) {
            case 'online':
            foreach ($data_found as $value) {
                $counter++;
                $availabilityRow = $locationRow = $expiryRow = $quantityRow = $reasonUnavailableRow = '';
                if (array_key_exists($value['commCode'], $retrieved)) {

                    /**
                                 * [$availability description]
                                 * @var [type]
                                 */
                    $availability = ($retrieved[$value['commCode']]['ac_availability'] != 'N/A') ? $retrieved[$value['commCode']]['ac_availability'] : '';

                    /**
                                 * [$location description]
                                 * @var [type]
                                 */
                    $location = ($retrieved[$value['commCode']]['ac_location'] != 'N/A') ? $retrieved[$value['commCode']]['ac_location'] : '';

                    /**
                                 * [$expiryDate description]
                                 * @var [type]
                                 */
                    $expiryDate = ($retrieved[$value['commCode']]['ac_expiry_date'] != 'N/A') ? $retrieved[$value['commCode']]['ac_expiry_date'] : '';

                    /**
                                 * [$reasonUnavailable description]
                                 * @var [type]
                                 */
                    $reasonUnavailable = $retrieved[$value['commCode']]['ac_reason_unavailable'];

                    /**
                                 * [$quantity description]
                                 * @var [type]
                                 */
                    $quantity = ($retrieved[$value['commCode']]['ac_quantity'] != 'N/A') ? $retrieved[$value['commCode']]['ac_quantity'] : '';
                }

                /**
                             * [$location description]
                             * @var [type]
                             */
                $location = explode(',', $location);
                foreach ($availabilities as $aval) {
                    if ($availability == $aval) {
                        $availabilityRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input checked="checked" name="cqAvailability_' . $counter . '" type="radio" value="' . $aval . '" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>';
                    } else {
                        $availabilityRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="cqAvailability_' . $counter . '" type="radio" value="' . $aval . '" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>';
                    }
                }
                foreach ($locations as $loc) {
                    if (in_array($loc, $location)) {
                        $locationRow.= '<td style ="text-align:center;">
            <input checked="checked" name="cqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
            </td>';
                    } else {
                        $locationRow.= '<td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
            </td>';
                    }
                }
                if ($expiryDate != '') {
                    $expiryRow = '<td style ="text-align:center;">
            <input name="cqExpiryDate_' . $counter . '" id="cqExpiryDate_' . $counter . '" type="text" size="350" class="cloned expiryDate" value="' . $expiryDate . '"/>
            </td>';
                } else {
                    $expiryRow = '<td style ="text-align:center;">
            <input name="cqExpiryDate_' . $counter . '" id="cqExpiryDate_' . $counter . '" type="text" size="350" class="cloned expiryDate"/>
            </td>';
                }
                if ($quantity != '') {
                    $quantityRow = '<td style ="text-align:center;">
            <input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="100" class="cloned numbers" value="' . $quantity . '"/>
            </td>';
                } else {
                    $quantityRow = '<td style ="text-align:center;">
            <input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="100" class="cloned numbers"/>
            </td>';
                }

                // echo '<li>' . $reasonUnavailable .'</li>';
                foreach ($reasons as $reason) {
                    if ($reasonUnavailable == $reason) {

                        // echo 'Found: ' . $reason;
                        $reasonUnavailableRow.= '<option selected="selected" value="' . $reason . '">' . $reason . '</option>';
                    } else {

                        // echo 'Could not Find: ' . $reason . '<br/>';
                        $reasonUnavailableRow.= '<option value="' . $reason . '">' . $reason . '</option>';
                    }
                }
                $this->commodities[$value['commFor']].= '<tr><td> ' . $value['commName'] . ' </td><td> ' . $value['commUnit'] . '</td>' . $availabilityRow . '
           <td width="60">
            <select name="cqReason_' . $counter . '" id="cqReason_' . $counter . '" style="width:110px" class="cloned">
               ' . $reasonUnavailableRow . '
            </select></td>
            ' . $locationRow . $quantityRow . $expiryRow . '
            <input type="hidden"  name="cqCommCode_' . $counter . '" id="cqCommCode_' . $counter . '" value="' . $value['commCode'] . '" />
    </tr>';
            }
            break;

            case 'offline':
            foreach ($data_found as $value) {
                $counter++;
                $this->commodities[$value['commFor']].= '<tr>
            <td> ' . $value['commName'] . ' </td>
            <td> ' . $value['commUnit'] . '</td>
            <td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="cqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="cqAvailability_' . $counter . '" type="radio" value="Never Available" class="cloned"/>
            </td>
            <td width="60">
                1. Not Ordered<input type="checkbox">
                2. Ordered but not yet Received<input type="checkbox">
                3. Expired<input type="checkbox">
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" type="checkbox" value="Other" />
            </td>
            <td style ="text-align:center;">
            <input name="cqLocation_' . $counter . '[]" id="cqLocNA_' . $counter . '" type="checkbox" value="Not Applicable" />
            </td>
            <td style ="text-align:center;">
            <input name="cqNumberOfUnits_' . $counter . '" id="cqNumberOfUnits_' . $counter . '" type="text" size="5" class="cloned numbers"/>
            </td>
            <td style ="text-align:center;">
            <input name="cqExpiryDate_' . $counter . '" id="cqExpiryDate_' . $counter . '" type="text" size="15" class="cloned expiryDate"/>
            </td>
            <input type="hidden"  name="cqCommCode_' . $counter . '" id="cqcommCode_' . $counter . '" value="' . $value['commCode'] . '" />
    </tr>';
            }
            break;
        }

        // echo '<pre>';print_r($this->commodities);die;

        return $this->commodities;
    }
    public function createCommodityUsageandOutageSection() {
        $data_found = $this->data_model->getSpecificCommodities('mnh');
        $retrieved = $this->data_model->retrieveData('log_commodity_stock_outs', 'comm_id');
        $OutageOptions = array('1', '2', '3', '4', '5');
        $UnavailabilityTimes = array('' => 'Select One', 'Once' => 'a. 1 Week', '2-3' => 'b. 2 weeks', '5-5' => 'c. 1 month', 'more than 5' => 'd. more than 1 month');

        // echo "<pre>";print_r($retrieved);die;

        // var_dump($this->data_model_found);die;
        $unit = "";
        $counter = 0;
        switch ($this->survey_form) {
            case 'online':
            foreach ($data_found as $value) {
                $counter++;
                $commodityUsage = $unavailableTimes = $optionsOnOutage = '';
                if (array_key_exists($value['commCode'], $retrieved)) {
                    $commodityUsage = $retrieved[$value['commCode']]['lcso_usage'];
                    $unavailableTimes = $retrieved[$value['commCode']]['lcso_unavailable_times'];
                    $optionsOnOutage = $retrieved[$value['commCode']]['lcso_option_on_outage'];

                    // echo $unavailableTimes;


                }
                if ($value['commUnit'] != null) {
                    $unit = $value['commUnit'];
                } else {
                    $unit = '';
                }
                $lsocrow = '<tr>
            <td style="width:200px;">' . $value['commName'] . ' </td><td >' . $unit . ' </td>
            <td >
            <input name="usocUsage_' . $counter . '" type="text" size="5" class="cloned numbers" value = "' . $commodityUsage . '" />
            </td>';
                $lsocrow.= '<td>
            <select name="usocTimesUnavailable_' . $counter . '" id="usocTimesUnavailable_' . $counter . '" class="cloned">';
                foreach ($UnavailabilityTimes as $k => $Unavailable) {
                    if ($k == $unavailableTimes) {
                        $lsocrow.= '<option value="' . $k . '" selected="selected">' . $Unavailable . '</option>';
                    } else {
                        $lsocrow.= '<option value="' . $k . '">' . $Unavailable . '</option>';
                    }
                }
                $lsocrow.= '</select></td>';
                $optionsOnOutage = explode(',', $optionsOnOutage);
                foreach ($OutageOptions as $option) {
                    if (in_array($option, $optionsOnOutage)) {
                        $lsocrow.= '<td style ="text-align:center;"><input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="' . $option . '" class="cloned" checked/></td>';
                    } else {
                        $lsocrow.= '<td style ="text-align:center;"><input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="' . $option . '" class="cloned"/></td>';
                    }
                }
                $lsocrow.= '<input type="hidden"  name="usoccommCode_' . $counter . '" id="usoccommCode_' . $counter . '" value="' . $value['commCode'] . '" /></tr>';
                $commodityUsageAndOutageSection[$value["commFor"]].= $lsocrow;
            }
            break;

            case 'offline':
            foreach ($data_found as $value) {
                $counter++;

                if ($value['commUnit'] != null) {
                    $unit = $value['commUnit'];
                } else {
                    $unit = '';
                }
                $commodityUsageAndOutageSection[$value["commFor"]].= '<tr>
            <td colspan="2" style="width:200px;">' . $value['commName'] . ' </td><td >' . $unit . ' </td>
            <td >
            <input name="usocUsage_' . $counter . '" type="text" size="5" class="cloned numbers"/>
            </td>
            <td colspan="2">
                a. 1 week<input type="checkbox">
                b. 2 weeks <input type="checkbox">
                c. 1 month<input type="checkbox">
                d. more than 1 month <input type="checkbox">
            </td>
            <td style ="text-align:center;">
            <input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="1" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="2" />
            </td>
            <td style ="text-align:center;">
            <input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="3" />
            </td>
            <td style ="text-align:center;">
            <input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="4" />
            </td>
            <td style ="text-align:center;">
            <input name="usocWhatHappened_' . $counter . '[]" type="checkbox" value="5" />
            </td>
            <input type="hidden"  name="usoccommCode_' . $counter . '" id="usoccommCode_' . $counter . '" value="' . $value['commCode'] . '" />
        </tr>';
            }
            break;
        }

        // echo $this->commodityUsageAndOutageSection['mnh'];die;
        return $commodityUsageAndOutageSection;
    }

    /**
             * [createEquipmentSection description]
             * @return [type] [description]
             */
    public function createEquipmentSection() {
        $data_found = $this->data_model->getEquipments();
        $retrieved = $this->data_model->retrieveData('available_equipments', 'eq_code');

        // echo"<pre>";print_r($retrieved);die;

        // var_dump($this->data_model_found);die;
        $unit = "";
        $counter = 0;
        $survey = $this->session->userdata('survey');

        switch ($survey) {
            case 'mnh':
            $locations = array('Delivery room', 'Pharmacy', 'Store', 'Other');
            break;

            case 'ch':
            $locations = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
            break;
        }
        $availabilities = array('Available', 'Never Available');
        $reasons = array('Select One', '1. Not Ordered', '2. Ordered but not yet Received', '3. Expired');
        switch ($this->survey_form) {
            case 'online':
            foreach ($data_found as $value) {

                $counter++;
                $section = $value['eqFor'];
                if ($section == 'mhw') {
                    $supplierOptions = $this->createSupplierOptions();
                    $equipment[$value['eqFor']].= '<tr>
            <td colspan="1">' . $value['eqName'] . ' ' . $unit . ' </td>
            <td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="hwAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="hwAvailability_' . $counter . '" type="radio" value="Never Available" />
            </td>
            <td>

            ' . $supplierOptions['mch'] . '
            </td>
            <td>
            ' . $supplierOptions['sou'] . '
            </td>

            <input type="hidden"  name="hweqCode_' . $counter . '" id="hweqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
        </tr>';
                } else {
                    $availabilityRow = $locationRow = $expiryRow = $quantityRow = $reasonUnavailableRow = '';
                    if (array_key_exists($value['eqCode'], $retrieved)) {
                        $availability = ($retrieved[$value['eqCode']]['ae_availability'] != 'N/A') ? $retrieved[$value['eqCode']]['ae_availability'] : '';
                        $location = ($retrieved[$value['eqCode']]['ae_location'] != 'N/A') ? explode(',', $retrieved[$value['eqCode']]['ae_location']) : '';
                        $fully_functioning = ($retrieved[$value['eqCode']]['ae_fully_functional'] != 'N/A') ? $retrieved[$value['eqCode']]['ae_fully_functional'] : '';
                        $non_functioning = ($retrieved[$value['eqCode']]['ae_non_functional'] != 'N/A') ? $retrieved[$value['eqCode']]['ae_non_functional'] : '';
                    }

                    foreach ($availabilities as $aval) {
                        if ($availability == $aval) {
                            $availabilityRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input checked="checked" name="eqAvailability_' . $counter . '" type="radio" value="' . $aval . '" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>';
                        } else {
                            $availabilityRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="eqAvailability_' . $counter . '" type="radio" value="' . $aval . '" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>';
                        }
                    }

                    //Loop through preset locations
                    foreach ($locations as $loc) {

                        //Check if value retrieved is NOT NULL
                        if ($location != '') {

                            //Check whether the values from the locations array exist in the location array
                            if (in_array($loc, $location)) {
                                $locationRowTemp[$loc] = '<td style ="text-align:center;">
                            <input checked="checked" name="eqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
                            </td>';
                            } else {
                                $locationRowTemp[$loc] = '<td style ="text-align:center;">
                            <input name="eqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
                            </td>';
                            }
                        } else {
                            $locationRowTemp[$loc] = '<td style ="text-align:center;">
                                        <input name="eqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
                                        </td>';
                        }
                    }
                    foreach ($locationRowTemp as $temp) {
                        $locationRow.= $temp;
                    }

                    if ($value['eqFor'] == 'hwr') {
                        if ($value['eqUnit'] != null) {
                            $unit = '(' . $value['eqUnit'] . ')';
                        } else {
                            $unit = '';
                        }

                        $equipment[$value['eqFor']].= '<tr>
            <td >' . $value['eqName'] . ' ' . $unit . ' </td>
            ' . $availabilityRow . '
            ' . $locationRow . '
            <input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
        </tr>';
                        $this->global_counter = $counter;
                    } else {
                        if ($fully_functioning != '') {
                            $fullyFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  value="' . $fully_functioning . '" size="8" class="numbers" />
                                            </td>';
                        } else {
                            $fullyFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
                                            </td>';
                        }
                        if ($non_functioning != '') {
                            $nonFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" value="' . $non_functioning . '" type="text"  size="8" class="numbers"/>
                                            </td>';
                        } else {
                            $nonFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
                                            </td>';
                        }

                        if ($value['eqUnit'] != null) {
                            $unit = '(' . $value['eqUnit'] . ')';
                        } else {
                            $unit = '';
                        }

                        $equipment[$value['eqFor']].= '<tr>
            <td >' . $value['eqName'] . ' ' . $unit . ' </td>
            ' . $availabilityRow . '
            ' . $locationRow . '
            ' . $fullyFunctioningRow . '
            ' . $nonFunctioningRow . '
            <input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
        </tr>';
                        $this->global_counter = $counter;
                    }
                }
            }
            break;

            case 'offline':
foreach ($data_found as $value) {

                $counter++;
                $section = $value['eqFor'];
                if ($section == 'mhw') {
                    $supplierOptions = $this->createSupplierOptions();
                    $equipment[$value['eqFor']].= '<tr>
            <td colspan="1">' . $value['eqName'] . ' ' . $unit . ' </td>
            <td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="hwAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="hwAvailability_' . $counter . '" type="radio" value="Never Available" />
            </td>
            <td>

            ' . $supplierOptions['mch'] . '
            </td>
            <td>
            ' . $supplierOptions['sou'] . '
            </td>

            <input type="hidden"  name="hweqCode_' . $counter . '" id="hweqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
        </tr>';
                } else {
                    $availabilityRow = $locationRow = $expiryRow = $quantityRow = $reasonUnavailableRow = '';
                    if (array_key_exists($value['eqCode'], $retrieved)) {
                        $availability = ($retrieved[$value['eqCode']]['ae_availability'] != 'N/A') ? $retrieved[$value['eqCode']]['ae_availability'] : '';
                        $location = ($retrieved[$value['eqCode']]['ae_location'] != 'N/A') ? explode(',', $retrieved[$value['eqCode']]['ae_location']) : '';
                        $fully_functioning = ($retrieved[$value['eqCode']]['ae_fully_functional'] != 'N/A') ? $retrieved[$value['eqCode']]['ae_fully_functional'] : '';
                        $non_functioning = ($retrieved[$value['eqCode']]['ae_non_functional'] != 'N/A') ? $retrieved[$value['eqCode']]['ae_non_functional'] : '';
                    }

                    foreach ($availabilities as $aval) {
                        if ($availability == $aval) {
                            $availabilityRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input checked="checked" name="eqAvailability_' . $counter . '" type="radio" value="' . $aval . '" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>';
                        } else {
                            $availabilityRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="eqAvailability_' . $counter . '" type="radio" value="' . $aval . '" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>';
                        }
                    }

                    //Loop through preset locations
                    foreach ($locations as $loc) {

                        //Check if value retrieved is NOT NULL
                        if ($location != '') {

                            //Check whether the values from the locations array exist in the location array
                            if (in_array($loc, $location)) {
                                $locationRowTemp[$loc] = '<td style ="text-align:center;">
                            <input checked="checked" name="eqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
                            </td>';
                            } else {
                                $locationRowTemp[$loc] = '<td style ="text-align:center;">
                            <input name="eqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
                            </td>';
                            }
                        } else {
                            $locationRowTemp[$loc] = '<td style ="text-align:center;">
                                        <input name="eqLocation_' . $counter . '[]" type="checkbox" value="' . $loc . '" class="cloned"/>
                                        </td>';
                        }
                    }
                    foreach ($locationRowTemp as $temp) {
                        $locationRow.= $temp;
                    }

                    if ($value['eqFor'] == 'hwr') {
                        if ($value['eqUnit'] != null) {
                            $unit = '(' . $value['eqUnit'] . ')';
                        } else {
                            $unit = '';
                        }

                        $equipment[$value['eqFor']].= '<tr>
            <td >' . $value['eqName'] . ' ' . $unit . ' </td>
            ' . $availabilityRow . '
            ' . $locationRow . '
            <input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
        </tr>';
                        $this->global_counter = $counter;
                    } else {
                        if ($fully_functioning != '') {
                            $fullyFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
                                            </td>';
                        } else {
                            $fullyFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyFullyFunctional_' . $counter . '" id="eqQtyFullyFunctional_' . $counter . '" type="text"  size="8" class="numbers" />
                                            </td>';
                        }
                        if ($non_functioning != '') {
                            $nonFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '"  type="text"  size="8" class="numbers"/>
                                            </td>';
                        } else {
                            $nonFunctioningRow = '<td style ="text-align:center;">
                                            <input name="eqQtyNonFunctional_' . $counter . '" id="eqQtyNonFunctional_' . $counter . '" type="text"  size="8" class="numbers"/>
                                            </td>';
                        }

                        if ($value['eqUnit'] != null) {
                            $unit = '(' . $value['eqUnit'] . ')';
                        } else {
                            $unit = '';
                        }

                        $equipment[$value['eqFor']].= '<tr>
            <td >' . $value['eqName'] . ' ' . $unit . ' </td>
            ' . $availabilityRow . '
            ' . $locationRow . '
            ' . $fullyFunctioningRow . '
            ' . $nonFunctioningRow . '
            <input type="hidden"  name="eqCode_' . $counter . '" id="eqCode_' . $counter . '" value="' . $value['eqCode'] . '" />
        </tr>';
                        $this->global_counter = $counter;
                    }
                }
            }
            break;
}
            return $equipment;
        }

        /**
                 * [createSuppliesSection description]
                 * @return [type] [description]
                 */
        public function createSuppliesSection() {
            $data_found = $this->data_model->getSupplies();
            $retrieved = $this->data_model->retrieveData('available_supplies', 'supply_code');
            $survey = $this->session->userdata('survey');

            // echo $survey;die;
            switch ($survey) {
                case 'ch':
                $locations = array('OPD', 'MCH', 'U5 Clinic', 'Ward', 'Other');
                break;

                case 'mnh':
                $locations = array('Delivery Room', 'Pharmacy', 'Store', 'Other');
                break;
            }

            //echo '<pre>';print_r($this->data_model_found);echo '</pre>';die;
            $counter = 0;
            $section = '';

            $base = 0;
            $current = "";
            foreach ($data_found as $value) {
                $counter++;
                $section = $value['supplyFor'];
                $current = ($base == 0) ? $section : $current;
                $base = ($current != $section) ? 0 : $base;
                $current = ($base == 0) ? $section : $current;
                $base++;
                $supplyLocation = '';
                $supplyAvailability = '';
                if (array_key_exists($value['supplyCode'], $retrieved)) {
                    $supplyLocation = $retrieved[$value['supplyCode']]['as_location'];
                    $supplyAvailability = $retrieved[$value['supplyCode']]['as_availability'];
                }
                if ($section != 'tst' && $section != 'ch' && $section != 'tes') {

                    $quantity = '<td style ="text-align:center;">
            <input name="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
            </td>';
                } else {
                    $quantity = '';
                }
                if ($section == 'mnh') {
                    $data[$section][] = '<tr>
            <td  style="width:200px;">' . $value['supplyName'] . '</td>
            <td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
            </td>
            <td>
             <input type="radio" name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" value="Not Ordered">1. Not Ordered
             <input type="radio" name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" value="Ordered but not yet Received">2. Ordered but not yet Received
             <input type="radio" name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" value="Expired">3. Expired
             <input type="radio" name="sqReason_' . $counter . '" id="sqReason_' . $counter . '" value="All Used">4. All Used
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Delivery room" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Store" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
            </td>
            ' . $quantity . '
            <input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
        </tr>';
                } else if ($section == 'tes') {
                    $data[$section][] = '<tr>
            <td  style="width:200px;">' . $value['supplyName'] . '</td>
            <td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="OPD" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="LAB" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Ward" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Store" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Pharmacy" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
            </td>
            ' . $quantity . '
            <input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
        </tr>';
                } else if ($section == 'mh') {
                    $supplierOptions = $this->createSupplierOptions();
                    $data[$section][] = '<tr>
            <td  style="width:200px;">' . $value['supplyName'] . ' ' . $unit . ' </td>
            <td style="vertical-align: middle; margin: 0px;text-align:center;">
            <input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="OPD" class="cloned"/>
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="MCH" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="U5 Clinic" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" type="checkbox" value="Maternity" />
            </td>
            <td style ="text-align:center;">
            <input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" />
            </td>
            <!--td style ="text-align:center;">
            <input name="sqNumberOfUnits_' . $counter . '" type="text" size="10" class="cloned numbers"/>
            </td-->
            <td width="50">
            ' . $supplierOptions['mh'] . '</td>
            <input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
        </tr>';
                } else {
                    $suppliesRow = '<tr><td  style="width:200px;">' . $value['supplyName'] . '</td>';
                    if ($supplyAvailability == 'Available') {
                        $suppliesRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;"><input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned" checked/></td>
                <td style ="text-align:center;"><input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" /></td>';
                    } else if ($supplyAvailability == 'Never Available') {
                        $suppliesRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;"><input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/></td>
                <td style ="text-align:center;"><input name="sqAvailability_' . $counter . '" type="radio" value="Never Available" checked/></td>';
                    } else {
                        $suppliesRow.= '<td style="vertical-align: middle; margin: 0px;text-align:center;"><input name="sqAvailability_' . $counter . '" id="sqAvailability_' . $counter . '" type="radio" value="Available" style="vertical-align: middle; margin: 0px;" class="cloned"/></td>
                <td style ="text-align:center;"><input name="sqAvailability_' . $counter . '" type="radio" value="Never Available"/></td>';
                    }
                    $supplyLocation = explode(',', $supplyLocation);

                    // echo "<pre>";print_r($supplyLocation);
                    foreach ($locations as $locs) {
                        if (in_array($locs, $supplyLocation)) {
                            if ($locs != 'Other') {
                                $suppliesRow.= '<td style ="text-align:center;"><input name="sqLocation_' . $counter . '[]" type="checkbox" value="' . $locs . '" class="cloned" checked/></td>';
                            } else {
                                $suppliesRow.= '<td style ="text-align:center;"><input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other" checked/></td>';
                            }
                        } else {
                            if ($locs != 'Other') {
                                $suppliesRow.= '<td style ="text-align:center;"><input name="sqLocation_' . $counter . '[]" type="checkbox" value="' . $locs . '" class="cloned"/></td>';
                            } else {
                                $suppliesRow.= '<td style ="text-align:center;"><input name="sqLocation_' . $counter . '[]" id="sqLocOther_' . $counter . '" type="checkbox" value="Other"/></td>';
                            }
                        }
                    }
                    $suppliesRow.= $quantity . '<input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" /></tr>';
                    $data[$section][] = $suppliesRow;

                    //     ' . $quantity . '
                    //     <input type="hidden"  name="sqsupplyCode_' . $counter . '" id="sqsupplyCode_' . $counter . '" value="' . $value['supplyCode'] . '" />
                    // </tr>';


                }
            }

            foreach ($data as $key => $value) {
                foreach ($value as $val) {
                    $supplies[$key].= $val;
                }
            }

            // var_dump($this->mchSupplies['mnh']);die;
            return $supplies;
        }

        /**
                 * [createSupplierOptions description]
                 * @return [type] [description]
                 */
        public function createSupplierOptions() {
            $suppliers = $this->data_model->getSuppliers();
            foreach ($suppliers as $supplier) {
                $supplierOptions[$supplier['supplierFor']].= '<input type="radio" name="supplierName" value="' . $supplier['supplierCode'] . '">' . $supplier['supplierName'];
            }
            return $supplierOptions;
        }

        /**
                 * [createMonthlyDeliveriesSection description]
                 * @return [type] [description]
                 */
        public function createMonthlyDeliveriesSection() {
            $retrieved = $this->data_model->retrieveData('log_diarrhoea', 'month');
            switch ($this->survey_form) {
                case 'online':
                $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                foreach ($months as $month) {
                    $monthldnumber = $retrieved[$month]['ld_number'];

                    if ($month != 'july' && $month != 'august' && $month != 'september' && $month != 'october' && $month != 'november' && $month != 'december') {
                        $upperrow.= '<td style ="text-align:center;">
            <input type="text" id="' . $month . '" name="dnmonth[' . $month . ']"  size="8" class="cloned numbers" value = "' . $monthldnumber . '"/>
            </td>';
                    } else {
                        $lowerrow.= '<td style ="text-align:center;">
            <input type="text" id="' . $month . '" name="dnmonth[' . $month . ']"  size="8" class="cloned numbers" value = "' . $monthldnumber . '"/>
            </td>';
                    }
                }

                $monthlydeliveries.= '<tr>
        <th> YEAR</th><th><div style="width: 50px"> JANUARY</div></th> <th>FEBRUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th>
        <tr>
            <td><input type="text" name="delivery_year"></td>' . $upperrow . '
            </tr><tr>
            <th> YEAR</th><th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
            <tr>
            <td><input type="text" name="delivery_year"></td>' . $lowerrow . '
            </tr>';
                break;

                case 'offline':
                $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                foreach ($months as $month) {

                    if ($month != 'july' && $month != 'august' && $month != 'september' && $month != 'october' && $month != 'november' && $month != 'december') {
                        $upperrow.= '<td style ="text-align:center;">
            <input type="text" id="' . $month . '" name="dnmonth[' . $month . ']"   class="cloned numbers"/>
            </td>';
                    } else {
                        $lowerrow.= '<td style ="text-align:center;">
            <input type="text" id="' . $month . '" name="dnmonth[' . $month . ']"   class="cloned numbers"/>
            </td>';
                    }
                }

                $monthlydeliveries.= '
<tr>
        <th>YEAR</th><td><input type="text" name="delivery_year"></td>
        </tr>

                <tr>
        <th><div style="width: 50px"> JANUARY</div></th> <th>FEBRUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th>
        <tr>
            ' . $upperrow . '
            </tr><tr>
            <th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
            <tr>
            </td>' . $lowerrow . '
            </tr>';
                break;
            }
            return $monthlydeliveries;
        }

        /**
                 * [createBemoncSection description]
                 * @return [type] [description]
                 */
        public function createBemoncSection() {
            $this->data_found = $this->data_model->getSignalFunctions();
            $retrieved = $this->data_model->retrieveData('bemonc_functions', 'sf_code');
            $challenges = array('Select One', 'Inadequate Drugs', 'Inadequate Skill', 'Inadequate Supplies', 'No Job aids', 'Inadequate equipment', 'Case never presented', 'No Challenge Experienced');

            // echo "<pre>";print_r($retrieved);die;

            // echo"<pre>";var_dump($this->data_found);die;
            $counter = 0;
            switch ($this->survey_form) {
                case 'online':
                foreach ($this->data_found as $value) {
                    $counter++;
                    $bemoncconducted = '';
                    $bemoncchallenge = '';
                    if (array_key_exists($value['sfacilityMFL'], $retrieved)) {
                        $bemoncconducted = $retrieved[$value['sfacilityMFL']]['bem_conducted'];
                        $bemoncchallenge = $retrieved[$value['sfacilityMFL']]['challenge_code'];
                    }
                    $signalFunctionsSection.= '<tr>
            <td colspan="7">' . $value['sfName'] . '</td><td colspan="4">
            <select name="bmsfSignalFunctionConducted_' . $counter . '" id="bmsfSignalFunctionConducted_' . $counter . '" class="cloned">';
                    if ($bemoncconducted == 'Yes') {
                        $signalFunctionsSection.= '<option value="">Select One</option>
                    <option value="Yes" selected="selected">Yes</option>
                    <option value="No">No</option>';
                    } else if ($bemoncconducted == 'No') {
                        $signalFunctionsSection.= '<option value="">Select One</option>
                    <option value="Yes">Yes</option>
                    <option value="No" selected="selected">No</option>';
                    } else {
                        $signalFunctionsSection.= '<option value="" selected="selected">Select One</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>';
                    }
                    $signalFunctionsSection.= '</select></td><td colspan="5">';
                    $signalFunctionsSection.= '<select name="bmsfChallenge_' . $counter . '" id="bmsfChallenge_' . $counter . '" class="cloned">';
                    $challenge_counter = 0;
                    foreach ($challenges as $challenge) {
                        $challenge_counter++;
                        if ($bemoncchallenge == '') {
                            $bemoncchallenge == "Select One";
                        }
                        if ($challenge == $bemoncchallenge) {
                            $signalFunctionsSection.= '<option value="' . $challenge . '" selected = "selected">' . $challenge_counter . '. ' . $challenge . '</option>';
                        } else {
                            $signalFunctionsSection.= '<option value="' . $challenge . '">' . $challenge_counter . '. ' . $challenge . '</option>';
                        }
                    }

                    $signalFunctionsSection.= '</select></td>
            <input type="hidden"  name="bmsfSignalCode_' . $counter . '" id="bmsfSignalCode_' . $counter . '" value="' . $value['sfacilityMFL'] . '" />
        </tr>';
                }
                case 'offline':
                foreach ($this->data_found as $value) {
                    $counter++;
                    $signalFunctionsSection.= '
        <tr>
            <td colspan="7">' . $value['sfName'] . '</td>
            <td colspan="2">
            Yes <input type="checkbox">
            No <input type="checkbox">

            </td>
            <td colspan="5">
            1.Inadequate Drugs<input type="checkbox">
            2.Inadequate Skill<input type="checkbox">
            3.Inadequate Supplies<input type="checkbox">
            4.No Job aids<input type="checkbox">
            5.Inadequate Equipment<input type="checkbox">
            6.Case never presented<input type="checkbox">
            7.No Challenge Experienced<input type="checkbox">
            </td>
            <input type="hidden"  name="bmsfSignalCode_' . $counter . '" id="bmsfSignalCode_' . $counter . '" value="' . $value['sfacilityMFL'] . '" />
        </tr>';
                }
                break;
            }

            // echo $this->signalFunctionsSection;die;
            return $signalFunctionsSection;
        }
    }
