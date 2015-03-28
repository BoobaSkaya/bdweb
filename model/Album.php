<?php

require_once 'Model.php';
require_once 'require.php';

class Album extends Model
{
    public function __construct()
    {
        parent::__construct('albums');
    }
    
    public function get_last_albums($nb, $type) {
        $sth = $this->db->prepare("SELECT distinct a.idserie, s.titre, a.dateachat, a.idalbum, a.couverture, a.num, a.titre"
               ." FROM albums a, series s "
               ." WHERE a.idserie = s.idserie AND a.perso1 = :type "
               ." ORDER BY a.dateachat desc, s.titre, a.num"
               . " LIMIT 0, :nb");
       $sth->bindParam("nb", $nb, PDO::PARAM_INT);
       $sth->bindParam("type", $type);
       $sth->execute();
       return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_next_albums() {
        $sth = $this->db->prepare("SELECT distinct a.idserie, s.titre, a.dateachat, a.idalbum, a.couverture, a.num, a.titre"
               ." FROM albums a, series s "
               ." WHERE a.idserie = s.idserie AND YEAR(a.dateachat) > YEAR(NOW()) "
               ." ORDER BY a.dateachat desc, s.titre, a.num"
               );
       $sth->execute();
       return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>