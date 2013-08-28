<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Property_Model extends CHH_Model {
    protected $_table = 'meta_property';

    protected $before_get = array('set_parent');

    function set_parent()
    {
        $this->db->where('parent_id', (int)$this->input->post('parent_id'));
    }
}
?>