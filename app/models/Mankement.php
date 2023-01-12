<?php

/**
 * Dit is de model voor de controller Countries
 */

class Mankement
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMankementen()
    {
        $this->db->query('SELECT * FROM Mankement');
        return $this->db->resultSet();
    }

    public function getMankement($id)
    {
        $this->db->query("SELECT * FROM Mankement WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateMankement($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE Mankement
                          SET Name = :Name,
                              CapitalCity = :CapitalCity,
                              Continent = :Continent,
                              Population = :Population
                          WHERE Id = :Id");

        $this->db->bind(':Name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':CapitalCity', $data['capitalCity'], PDO::PARAM_STR);
        $this->db->bind(':Continent', $data['continent'], PDO::PARAM_STR);
        $this->db->bind(':Population', $data['population'], PDO::PARAM_INT);
        $this->db->bind(':Id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deleteMankement($id)
    {
        $this->db->query("DELETE FROM Mankement WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createMankement($post)
    {
        $this->db->query("INSERT INTO Mankement (Id, 
                                               Name, 
                                               CapitalCity, 
                                               Continent, 
                                               Population)
                          VALUES              (:Id,
                                               :Name,
                                               :CapitalCity,
                                               :Continent,
                                               :Population)");
        $this->db->bind(':Id', NULL, PDO::PARAM_NULL);
        $this->db->bind(':Name', $post['name'], PDO::PARAM_STR);
        $this->db->bind(':CapitalCity', $post['capitalCity'], PDO::PARAM_STR);
        $this->db->bind(':Continent', $post['continent'], PDO::PARAM_STR);
        $this->db->bind(':Population', $post['population'], PDO::PARAM_INT);
        return $this->db->execute();
    }
}
