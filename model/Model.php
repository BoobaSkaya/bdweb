<?php

abstract class Model {
    private $table;
    protected $db;


    public
    function __construct($table) {
        $this->table = $table;
        try{ 
            $this->db = new PDO('mysql:dbname=ce.palays;host=0.0.0.0', 'boobaskaya', '');
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }


    public function selectAll() {
        $sth = $this->db->prepare("SELECT * FROM :table LIMIT 0,10");
        $sth->execute(array('table' => $this->table));
        /*while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
            //echo '<li>' . $row['nom'] . '  ' . $row['prenom'] . '</li>';
        }*/
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
} 
    
?>