<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Motel<br>
 * Controller du table Motel
 */
class Motel extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('motel_model', 'motel');
    }

    /**
 * Controller du table Motel
 * fonction index qui affiche la liste de tous les motels
 */
    function index() {
        $this->load->model('Motel_model');
        $motel= $this->Motel_model->all();
        if($motel != false)
            $data['motels']= $motel;

        $data['page'] = $this->load->view('backoffice/List',$data, true);
        $data['page_title'] = 'Hôtels';
        $this->load->view('backoffice/template', $data);

    }

/**
* Controller du table Motel
* fonction de creation de motel , ny view an'ity fonction ity dia i @Motel_view
*/
    function create() {
            $this->load->model('Motel_model');
            $this->form_validation->set_rules('name','Nom','required');
            $this->form_validation->set_rules('phone','Téléphone','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('bank_account','Compte bancaire','required');
            $this->form_validation->set_rules('password','Mot de passe','required');
            $this->form_validation->set_rules('location','Location','required');

            if ($this->form_validation->run() == false) :
                $data['page'] = $this->load->view('backoffice/Motel_view', [], true);
                $data['page_title'] = 'Inserer un hôtel';
                $this->load->view('backoffice/template', $data);
            else:
                $formArray = array();
                $formArray['name'] = $this->input->post('name');
                $formArray['phone'] = $this->input->post('phone');
                $formArray['email'] = $this->input->post('email');
                $formArray['bank_account'] = $this->input->post('bank_account');
                $formArray['password'] = $this->input->post('password');
                $formArray['location'] = $this->input->post('location');
                $this->Motel_model->create($formArray);
                $this->session->set_flashdata('success','record added successfully!');
                redirect(site_url('motel')); // tafiditra ao @list motel rehetra
            endif;

    }


/**
* Controller du table Motel
* fonction pour supprimer un motel
*/
    Public function delete($motelId)
    {
        $this->load->model('Motel_model');
        $motel = $this->Motel_model->getMotel($motelId);
        //raha tsisy motel selectionner ho supprimer-na dia mamerina error
        if (empty($motel)) :
            redirect(base_url().'index.php/Motel/index'); // tafiditra ao @list motel rehetra miaraka @motel vaovao avy modify-na
        endif;
        //mamerina succes ra navita suppression ana motel
        $this->Motel_model->deleteMotel($motelId);
        redirect(base_url().'index.php/Motel/index');

    }

}
?>
