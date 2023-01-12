<?php
class Lessen extends Controller
{

  private $lesModel;

  public function __construct()
  {
    $this->lesModel = $this->model('LesModel');
  }

  public function index()
  {


    $result = $this->lesModel->getLessen();
    $rows = "";

    foreach ($result as $lesinfo) {
      $datetimeObj = new DateTimeImmutable(
        $lesinfo->DatumTijd,
        new DateTimeZone('Europe/Amsterdam')
      );
      $rows .= "<tr>
                 <td> {$datetimeObj->format('D-M-Y')}</td>
                 <td> {$datetimeObj->format('H:i')}</td>
                 <td>{$lesinfo->LENA}</td>
                 <td>{$lesinfo->INNA}</td>
                 <td>
                  <a href=' " . URLROOT . "/lessen/topiclesson/{$lesinfo->LEID}'>
                 <img src='" . URLROOT . "/img/bd_sbrowse.png' alt='table picture'>
                 </a>
                 </td>

                </tr>";
    }
    $data = [
      'title' => "Overzicht lessen",
      'rows' => $rows,
      'instructorName' => $result[0]->INNA
    ];
    $this->view('Lessen/index', $data);
  }

  public function topicLesson($id = NUll)
  {
    $result = $this->lesModel->getTopics($id);


    if ($result) {
      $dt = new DateTimeImmutable($result[0]->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
      $date = $dt->format('d-m-Y');
      $time = $dt->format('H:i');
      $Id = $result[0]->Id;
    } else {

      $date = "";
      $time = "";
    }

    $rows = "";

    foreach ($result as $topic) {
      $rows .= "<tr>
                 <td>$topic->Onderwerp</td>
                </tr>";
    }
    $data = [
      'title' => 'Onderwerp Les',
      'rows' => $rows,
      'Date' => $date,
      'Time' => $time,
      'lessonId' => $id
    ];

    $this->view('lessen/topiclesson', $data);
  }

  public function addTopic($id = NULL)
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $result = $this->lesModel->addTopic($_POST);

      if ($result) {
        echo "<h3>de data is opgeslagen</h3>";
        header('Refresh:3; url=' . URLROOT . '/lessen/index');
      } else {
        echo "<h3>de data is niet opgeslagen</h3>";
        header('Refresh:3; url=' . URLROOT . '/lessen/index');
      }
    } else {

      $data = [
        'title' => 'Onderwerp Toevoegen',
        'id' => $id
      ];

      $this->view('lessen/addTopic', $data);
    }
  }
}
