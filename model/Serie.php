<?php

require_once 'Model.php';
require_once 'require.php';

class Serie extends Model
{
    public function __construct()
    {
        parent::__construct('series');
    }
    
    public function get_all(){
        $sth = $this->db->prepare("SELECT  a.idserie, a.titre, s.idserie, s.titre AS serietitre, COUNT(*)"
               ." FROM series s, albums a"
               ." WHERE a.idserie = s.idserie"
               ." GROUP BY a.idserie"
               ." ORDER BY serietitre"
               );
       $sth->execute();
       $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
    
    public function get_serie($idserie) {
       $sth = $this->db->prepare("SELECT *"
               ." FROM series"
               ." WHERE idserie = :idserie "
               );
       $sth->bindParam("idserie", $idserie, PDO::PARAM_INT);

       $sth->execute();
       $result = $sth->fetch(PDO::FETCH_ASSOC);
       return $result;
    }
    
    public function get_albums_of_serie($idserie) {
        $sth = $this->db->prepare("SELECT *"
               ." FROM albums"
               ." WHERE idserie = :idserie ORDER BY num"
               );
       $sth->bindParam("idserie", $idserie, PDO::PARAM_INT);

       $sth->execute();
       $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }
}

?>