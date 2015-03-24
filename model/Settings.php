<?php

require_once 'Model.php';
require_once 'require.php';

class Settings extends Model
{
    public function __construct()
    {
        parent::__construct('settings');
    }
    
    public function get_adulte_new_nb() {
       return intval($this->get_new_nb('adulte'));
    }
    
    public function get_ado_new_nb() {
       return intval($this->get_new_nb('ado'));
    }
    
    public function get_new_nb($type) {
        $result =  $this->get_settings($type.'_new_nb');
        return $result;
    }
    
    public function get_settings($property_name){
        $sth = $this->db->prepare("SELECT value"
               ." FROM settings "
               ." WHERE name = :property_name "
               );
        $sth->bindParam("property_name", $property_name);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC)['value'];
    }
}

?>