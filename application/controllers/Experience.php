<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Experience<br>
 * Controller du table Experience
 */
class Experience extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        $this->load->model('experience_model', 'exp');
        $this->load->model('experience_category_model', 'category');
        $this->load->model('car_model', 'car');
        $this->load->model('guide_model', 'guide');
    }
    public function index(){
        $data['page'] = $this->load->view('backoffice/crud_experience', [], true);
        $data['page_title'] = 'Expérience';
        $this->load->view('backoffice/template', $data );
    }
    private function getFormData() : array
    {
        return array(
            'name'=>$this->input->post('name'),
            'category_id'=>$this->input->post('category_id'),
            'car_id'=>$this->input->post('car_id'),
            'max_traveler'=>$this->input->post('max_traveler'),
            'first_guide'=>$this->input->post('first_guide'),
            'second_guide_id'=>$this->input->post('second_guide_id'),
            'description'=>$this->input->post('description')
        );
    }
    private function getFormErrorMsg() : array
    {
        return array(
            'name'=>form_error('name'),
            'category_id'=>form_error('category_id'),
            'car_id'=>form_error('car_id'),
            'max_traveler'=>form_error('max_traveler'),
            'first_guide'=>form_error('first_guide'),
            'second_guide_id'=>form_error('second_guide_id'),
            'description'=>form_error('description')
        );
    }
    private function getFormDataConfig() : array
    {
        return $config = array(
            array(
                'field' => 'name',
                'label' => 'Nom',
                'rules' => 'required'
             ),
            array(
                'field' => 'category_id',
                'label' => 'Catégories',
                'rules' => 'required'
            ),
            array(
                'field' => 'car_id',
                'label' => 'Chaufeur',
                'rules' => 'required'
            ),
            array(
                'field' => 'max_traveler',
                'label' => 'Voyageurs max',
                'rules' => 'required'
            ),
            array(
                'field' => 'first_guide',
                'label' => 'Premier guide',
                'rules' => 'required'
            ),
            array(
                'field' => 'second_guide_id',
                'label' => 'Second guide',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'picture',
                'label' => 'Image',
                'rules' => ''
            )
        ); 
    }
    private function getFormProductId() {
        return $this->input->post('experience_id');
    }
    function showAll(){
       $query=  $this->exp->showAll();
             if($query){
                $result['produits']  = $this->exp->showAll();
                    for($i=0; $i < count($result['produits']); $i++) {
                        $category = (array) $this->category->find($result['produits'][$i]->category_id);
                        $car = (array) $this->car->find($result['produits'][$i]->car_id);
                        $guide1 = (array) $this->guide->find($result['produits'][$i]->first_guide);
                        $guide2 = (array) $this->guide->find($result['produits'][$i]->second_guide_id);
                        $result['produits'][$i] = (object) array_merge( (array)$result['produits'][$i], array('category'=>$category['name']) );
                        $result['produits'][$i] = (object) array_merge( (array)$result['produits'][$i], array('driver'=>$car['driver']) );
                        $result['produits'][$i] = (object) array_merge( (array)$result['produits'][$i], array('guide1'=>$guide1['name']) );
                        $result['produits'][$i] = (object) array_merge( (array)$result['produits'][$i], array('guide2'=>$guide2['name']) );
                    }
             }
        echo json_encode($result);
    }
    function addProduct() {
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
		$config = $this->getFormDataConfig();
        $this->form_validation->set_rules($config);
        if($this->input->post('picture')) {
            if ($this->form_validation->run() == FALSE) {
                $result['error'] = true;
                $result['msg'] = $this->getFormErrorMsg();
                $result['msg']['picture'] = form_error('picture');
            }else{
                $data = $this->getFormData();
                if($this->exp->addProduct($data)){
                    $result['error'] = false;
                    $result['msg'] ='Expérience ajouté avec success';
                    $config_upload = array();
                    $config_upload['upload_path']   = 'assets/img/experience/';
                    $config_upload['allowed_types'] = 'jpg|png|jpeg';
                    $config_upload['max_size']      = 2048;
                    $config_upload['file_name']      = $this->exp->lastRowId().'.jpg';
                    $this->load->library('upload', $config_upload);
                    if( !$this->upload->do_upload('file') ) {
                        $result['error'] = true;
                        $result['msg']['picture'] = $this->upload->display_errors();
                    }
                }
            }
        } else {
            $result['error'] = true;
            $result['msg']['picture'] = "Veuillez inserer une image";
        }
        echo json_encode($result);
    }

     function updateProduct(){
		$config = $this->getFormDataConfig();
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = $this->getFormErrorMsg();
        }else{
            $id = $this->getFormProductId();
            $data = $this->getFormData();
            if($this->exp->updateProduct($id,$data) ){
                $result['error'] = false;
                $result['success'] = 'Expérience modifiée';
            }
            if($this->input->post('picture')) {
                $config_upload = array();
                $config_upload['upload_path']   = 'assets/img/experience/';
                $config_upload['allowed_types'] = 'jpg|png|jpeg';
                $config_upload['max_size']      = 2048;
                $config_upload['file_name']      = $id.'.jpg';
                $config_upload['overwrite']      = true;
                $this->load->library('upload', $config_upload);
                $this->upload->do_upload('file');
                $result['error'] = false;
                $result['success'] = 'Expérience modifiée';
            }
        }
        echo json_encode($result);
     }
    function deleteProduct(){
        $id = $this->getFormProductId();
        if($this->exp->deleteProduct($id)){
            $msg['error'] = false;
            $msg['success'] = 'Expérience effacé';
        }else{
             $msg['error'] = true;
        }
        echo json_encode($msg);
         
    }
    function searchProduct(){
        $value = $this->input->post('text');
        $query =  $this->exp->searchProduct($value);
        if($query){
            $result['produits']= $query;
        }
           
        echo json_encode($result); 
    }
}