<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Entity_Model extends CHH_Model {
    protected $_table = 'meta_entity';

    protected $list_count_childrens = true;
    protected $after_create = array('create_table');

    function count_childrens()
    {
        $this->load->model('property_model');

        $this->select("*, (select count(*) FROM `".$this->db->dbprefix($this->property_model->table())."` WHERE `parent_id` = `".$this->db->dbprefix($this->_table)."`.`id`) AS `childrens`");
    }

    /**
     * 自動新增資料表
     * @param  int $id entity新增的id
     * @return [type]     [description]
     */
    function create_table($id = null)
    {
        $info = $this->get($id);
        $this->load->dbforge();

        $fields = array(
                        'id' => array(
                            'type' => 'INT',
                            'constraint' => 10,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ),
                        'deleted' => array(
                                'type' => 'tinyint',
                                'constraint' => 1,
                                'default' => 0
                          )
                );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table($info->table_name, TRUE);
    }
}
?>