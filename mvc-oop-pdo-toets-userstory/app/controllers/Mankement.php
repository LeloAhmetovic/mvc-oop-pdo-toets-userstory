<?php
class Mankement extends Controller
{

  private $mankementModel;

  public function __construct()
  {
    $this->mankementModel = $this->model('MankementModel');
  }

  public function index()
  {


    $result = $this->mankementModel->getMankements();
    $rows = "";

    foreach ($result as $mankementinfo) {


      $rows .= "<tr>

                 <td>{$mankementinfo->Datum}</td>
                 <td>{$mankementinfo->Mankement}</td>


                </tr>";
    }
    $data = [
      'title' => "Overzicht Mankement",
      'rows' => $rows,
      'instructorName' => $result[0]->Naam,
      'Email' => $result[0]->Email,
      'Kenteken' => $result[0]->Kenteken



    ];
    $this->view('mankement/index', $data);
  }



  public function addMankement($id = NULL)
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $result = $this->mankementModel->addMankement($_POST);

      if ($result) {
        echo "<h3>de data is opgeslagen</h3>";
        header('Refresh:3; url=' . URLROOT . '/mankement/index');
      } else {
        echo "<h3>de data is niet opgeslagen</h3>";
        header('Refresh:3; url=' . URLROOT . '/mankement/index');
      }
    } else {

      $data = [
        'title' => 'Onderwerp Toevoegen',
        'id' => $id
      ];

      $this->view('mankement/addMankement', $data);
    }
  }
}
