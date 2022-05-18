<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Offer<br>
 * Controller du table Offer
 */
class Offer extends CI_Controller
{
    /*public function offer_list()
    {
      $this->load->model('offer_model');
      $this->load->model('motel_model');
      $data = $this->offer_model->offer_list();
      $motel = array();
      for ($i=1; $i < sizeof($data); $i++)
      {
        $motel[$i] = $this->motel_model->getMotelById($i);
        $room_ca;
      }
      var_dump($motel);

    //  echo $data[2]['motel_id'];
      //test
      //$motel = $this->motel_model->getMotelById(1);
      echo "<br />Nom motel : ";
      echo $motel[0]['name'];
      //Affiche les noms des motels

    }*/
    function __construct()
    {
      parent::__construct();
      $this->load->model('offer_model', 'offer');
      $this->load->model('motel_model','motel');
    }
    public function test()
    {
      $this->load->view('vue_offre');
    }
    public function confirm_reservation($offre_id)
    {
      echo $offre_id;
    }
    /**
     * Fonction mitondra an'ny amin'ny liste an'ny offres disponibles miaraka amin'ny info motel sy room
     */
    public function available_offer_list()
    {
      $data['offer'] = $this->offer->available_offer_list();
      for ($i=0; $i < sizeof($data['offer']); $i++)
      {
        //alaina ny motel sy room_category isakin'ny offre
          $data['motel'][$i] = $this->offer->get_offer_s_motel($data['offer'][$i]['offer_id']);
          $data['room_category'][$i] = $this->offer->get_offer_s_room_category($data['offer'][$i]['offer_id']);
      }
      //redirection
      //+
      //Passage des données de $data vers la page available offer list
      //exemple $data['motel'] deviens $motel dans la vue available_offer_list
        $this->load->view('available_offer_list',$data);
    }

    /**
     * Fonction de redirection vers la page de recherche multi critères des offres
     */
    public function search_offer_page()
    {
      $this->load->model('motel_model');
      $this->load->model('room_category_model');
      $data = array();
      //atao anaty $data['motel'] ny motel rehetra
        $data['motel'] = $this->motel_model->get_Motels();
      //atao anay $data['room_category'] ny room_category rehetra
        $data['room_category'] = $this->room_category_model->get_Room_Categories();
        $this->load->view('search_offer_page',$data);
    }
    public function get_offer_details($id)
    {
      $data['offer'] = $this->offer->get_Offer_By_Id($id);
      $data['motel'] = $this->offer->get_offer_s_motel($id);
      $this->load->view('Offre_details_confirmation',$data);
    }
    /**
     * Fonction apres validation du formulaire de recherche multi critères
     */
    public function search_offer()
    {
      $this->load->model('motel_model');
      //Load an'ny offer_model
      $data = array();
      $data['offer'] = array();
      $data['offer_without_place'] = array();
      $data['motel'] = array();
      $data['room_category'] = array();
      $get = array('place', 'adulte', 'enfant', 'bebe', 'cuisine');
      for ($i=0; $i < sizeof($get); $i++)
      {
        if(!isset($_GET[$get[$i]]) OR $_GET[$get[$i]] == "")
        {
          $_GET[$get[$i]] = "none";
        }
      }
        $place = $_GET['place'];
        $adult = $_GET['adulte'];
        $enfant = $_GET['enfant'];
        $bebe = $_GET['bebe'];
        $cuisine = $_GET['cuisine'];

        //Atao none ny valeur an'ny variable raha tsy numerique ilay type an'ny variables azo avy amin'ny get
        if(!is_numeric($adult) OR $adult<=0)
        {
          $adult = "none";
        }
        if(!is_numeric($enfant) OR $enfant <=0)
        {
          $enfant = "none";
        }
        if(!is_numeric($bebe) OR $bebe <=0)
        {
          $bebe = "none";
        }
        if($cuisine != "on")
        {
          $cuisine = "none";
        }
        if($cuisine == "on")
        {
          $cuisine = 1;
        }
        /*
          Raha tsy none ny valeur an'ny variables dia mamorona requete de type string
        */
        if($adult != "none")
        {
          $request['adult'] = 'max_adult >= '.$adult.'';
        }
        if($enfant != "none")
        {
          $request['enfant'] = 'max_child >= '.$enfant.'';
        }
        if($bebe != "none")
        {
          $request['bebe'] = 'max_baby >= '.$bebe.'';
        }
        if($cuisine != "none")
        {
          $request['cuisine'] = 'have_kitchen = '.$cuisine.'';
        }

        /**
          *@param args tableau misy ny requetes rehetra en string
        */
        $args = array();

        if(isset($request['adult']))
        array_push($args, $request['adult']);

        if(isset($request['enfant']))
        array_push($args, $request['enfant']);

        if(isset($request['bebe']))
        array_push($args, $request['bebe']);

        if(isset($request['cuisine']))
        array_push($args, $request['cuisine']);

        $data['offer_without_place']=$this->offer->get_Offers_By_Args($args);

      $location = $this->motel_model->get_Locations_availables();
      $boolean_place = 'false';

      if($place != "none")
      {
        $placeToLower = mb_strtolower($place);
        for ($i=0; $i <sizeof($location) ; $i++)
        {
          $locationToLower = mb_strtolower($location[$i]);
          if(strpos($locationToLower,$placeToLower)>=0 && is_numeric(strpos($locationToLower,$placeToLower)))
          {
            //var_dump(strpos($locationToLower,$placeToLower));
            $place = $location[$i];
            $boolean_place = 'true';
            break;
          }
        }
      }
    //  echo $place;
    //  echo $boolean_place;
      if($place=="none")
      {
        $data['offer'] = $data['offer_without_place'];
        for ($i=0; $i < sizeof($data['offer']); $i++)
        {
          $data['motel'][$i] = $this->offer->get_offer_s_motel($data['offer'][$i]['offer_id']);
          $data['room_category'][$i] = $this->offer->get_offer_s_room_category($data['offer'][$i]['offer_id']);
        }
      }
      else if($boolean_place == 'true' && $place != "none")
      {
        $data['offer'] = $this->offer->get_offers_by_place($data['offer_without_place'],$place);
        for ($i=0; $i < sizeof($data['offer']); $i++)
        {
          $data['motel'][$i] = $this->offer->get_offer_s_motel($data['offer'][$i]['offer_id']);
          $data['room_category'][$i] = $this->offer->get_offer_s_room_category($data['offer'][$i]['offer_id']);
        }
      }
      else if($boolean_place == 'false' && $place != "none")
      {
        $data['offer'] = null;
      }
      /*$word = "ambOrovy";
      $word = mb_strtolower($word);
      $locationLower = mb_strtolower($location[0]);
      echo $location[0];
      echo "<br>";
      var_dump(strpos($locationLower,$word));*/
   $this->load->view('Offre_Hotel',$data);
    }
  public function login()
  {
    $this->load->view('TestLogin.php');
  }
  public function indexUpdate()
  {
    $this->load->model('offer_model');
    $data["room"]=$this->offer_model->selectCategorie();
    $data["id"]=$this->offer_model->postUpdate();
    $this->load->view('TestUpdate.php',$data);
  }
  public function index()
  {
    $this->load->model('offer_model');
    $data["ind"]='TestFront.php';
    $data["log"]=$this->offer_model->getMotel();
    $data["room"]=$this->offer_model->selectCategorie();
    $data["valiny"]=$this->offer_model->toDoLogin();
    if($data["valiny"]==1)
    {
      $this->load->view('TestTemplate.php',$data);
    }
    else{
      $this->load->view('TestErreur.php',$data);
    }

  }
  public function addOffreControllers()
  {
    $this->load->model('offer_model');
    $dataAdd=array();
    $dataAdd["add"]=$this->offer_model->addOffre();
    $this->load->view('TestSelect.php',$dataAdd);
  }
  public function modif()
  {
    $this->load->model('offer_model');
    $dataMo=array();
    $dataMo["mod"]=$this->offer_model->UpdateOffre();

    $data["offer_id"]=$this->offer_model->getOffreDelete();
    $this->load->view('TestListe.php',$data);
  }
  public function retour()
  {
    $this->load->model('offer_model');
    $data["ind"]='TestFront.php';
    $data["log"]=$this->offer_model->getMotel();
    $data["room"]=$this->offer_model->selectCategorie();
    $this->load->view('TestTemplate.php',$data);
  }
  public function delete()
  {
    $this->load->model('offer_model');
    $dataDe=array();
    $dataDe["del"]=$this->offer_model->DeleteOffre();

    $data["offer_id"]=$this->offer_model->getOffreDelete();
    $this->load->view('TestListe.php',$data);
  }
  public function getMotelControllers()
  {
    $this->load->model('offer_model');
    $data=array();
    $data["motel_id"]=$this->offer_model->getOffre();
    $this->load->view('TestListe.php',$data);
  }
  public function getOffreControllers()
  {
    $this->load->model('offer_model');
    $data=array();
    $data["offer_id"]=$this->offer_model->getOffre();
    $this->load->view('TestListe.php',$data);

  }
  public function getReservationEffControllers()
  {
    $this->load->model('offer_model');
    $dataRes=array();
    $dataRes["listeRes"]=$this->offer_model->getReservationEff();
    $this->load->view('ListeReservation.php',$dataRes);
  }

  public function list_targetted(){
    $id = $this->input->get('id');
    $result = array();
    $result['offres'] = $this->offer->list_targetted_motel($id);
    $result['suggestions'] = $this->motel->get_Motel_Suggested();
    $this->load->view('offer_targetted',$result);
  }
}
?>
