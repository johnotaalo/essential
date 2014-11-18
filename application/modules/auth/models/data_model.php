<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//for the query builder
use Doctrine\ORM\Query\ResultSetMappingBuilder;
class Data_Model extends MY_Model
{
    
    /*user variables*/
    var $dataSet, $final_data_set, $query, $rsm, $districtName, $countyFacilities;
    
    /*constructor*/
    function __construct() {
        parent::__construct();
        
        //var initialization
        $this->dataSet = $this->query = null;
    }
    
    public function authorize() {
        /**
         * POST Data
         * @var array
         */
        $data = $this->input->post();
        
        /**
         * DQL
         * @var Doctrine Entity
         */
        $query = $this->em->createQuery('SELECT u, cl, ut FROM models\Entities\Users u JOIN u.cl cl JOIN u.ut ut WHERE u.userName = :username AND u.userPassword = :password');
        $query->setParameter('username', $data['username']);
        $query->setParameter('password', $data['password']);
        
        /**
         * User Data
         * @var array
         */
        $user = $query->getArrayResult();
        $this->session->set_userdata($user);
        
        if ($user) {
            $result = array('message' => 'User Found', 'class' => 'success');
        } else {
            $result = array('message' => 'User Not Found!', 'class' => 'error');
        }
        echo json_encode($result);
    }
}
