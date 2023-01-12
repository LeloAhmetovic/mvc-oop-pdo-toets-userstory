<?php
class MankementModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getMankements()
  {
    $this->db->query("SELECT Mankement.Datum
                            ,Mankement.Id as MAID
                            ,Mankement.Mankement
                            ,Instructeur.Naam
                            ,Instructeur.Id as INID
                            ,Instructeur.Email
                            ,Auto.Kenteken
                            ,Auto.Id as AUID
                             FROM Instructeur
                             INNER JOIN Auto
                             ON auto.InstructeurId = Instructeur.Id
                             INNER JOIN Mankement
                             ON Mankement.AutoId = auto.Id
                             WHERE Instructeur.Id = :Id");
    $this->db->bind(':Id', 2, PDO::PARAM_INT);

    $result = $this->db->resultSet();

    return $result;
  }

  public function addMankement($post)
  {
    $sql = "INSERT INTO Mankement (AutoId
                                  ,Mankement)
            VALUES                (:AutoId,
                                   :Mankement);";

    $this->db->query($sql);

    $this->db->bind(':AutoId', $post['id'], PDO::PARAM_INT);
    $this->db->bind(':Mankement', $post['Mankement'], PDO::PARAM_STR);

    return $this->db->execute();
  }
}
