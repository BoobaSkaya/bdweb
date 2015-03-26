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
       return intval($this->get_settings('adulte_new_nb'));
    }
    
    public function set_adulte_new_nb($value) {
       return $this->set_settings('adulte_new_nb', $value);
    }
    
    public function get_ado_new_nb() {
       return intval($this->get_settings('ado_new_nb'));
    }

    public function set_ado_new_nb($value) {
       return $this->set_settings('ado_new_nb', $value);
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
    
    public function set_settings($property_name, $property_value){
        $sth = $this->db->prepare("UPDATE settings"
               ." SET value = :property_value "
               ." WHERE name = :property_name"
               );
        $sth->bindParam("property_name", $property_name);
        $sth->bindParam("property_value", $property_value);
        $res = $sth->execute();
        //return 1 in case of success
        return $res;
    }
    
    
}

?>