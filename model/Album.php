<?php

require_once 'Model.php';
require_once 'require.php';

class Album extends Model
{
    private $page_size = 30;
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
    
    public function get_albums($fromDate, $toDate, $page){
        $sth = $this->db->prepare("SELECT distinct a.idserie, s.titre AS serietitre, a.dateachat, a.idalbum, a.couverture, a.num, a.titre"
               ." FROM albums a, series s"
               ." WHERE a.dateachat BETWEEN :from_date AND :to_date AND a.idserie = s.idserie"
               ." ORDER BY a.dateachat, a.idserie, a.num"
               ." LIMIT :page_start,:page_end"
               );
       $page_start = $this->page_size*intval($page);
       $page_end   = $this->page_size*(intval($page)+1);
       $sth->bindParam("from_date", $fromDate);
       $sth->bindParam("to_date", $toDate);
       $sth->bindParam("page_start", $page_start, PDO::PARAM_INT);
       $sth->bindParam("page_end"  , $page_end  , PDO::PARAM_INT);
       $sth->execute();
       return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function get_pages_nb($fromDate, $toDate){
        $sth = $this->db->prepare("SELECT count(*)"
               ." FROM albums a, series s"
               ." WHERE a.dateachat BETWEEN :from_date AND :to_date AND a.idserie = s.idserie"
               ." ORDER BY a.dateachat"
               );
               
       $sth->bindParam("from_date", $fromDate);
       $sth->bindParam("to_date", $toDate);
       $sth->execute();
       return intval(intval($sth->fetch(PDO::FETCH_ASSOC)['count(*)'])/$this->page_size)+1;
    }
}

?>