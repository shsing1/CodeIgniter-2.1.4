<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Entity_Model extends CHH_Model {
    protected $_table = 'meta_entity';
    protected $soft_delete = TRUE;

    protected $before_get = array('count_childrens');

    function count_childrens()
    {
        $this->load->model('property_model');

        $this->select("*, (select count(*) FROM `".$this->db->dbprefix($this->property_model->table())."` WHERE `parent_id` = `".$this->db->dbprefix($this->_table)."`.`id`) AS `childrens`");
    }
}
?>