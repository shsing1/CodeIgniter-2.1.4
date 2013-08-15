<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Entity_model extends MY_Model {
    protected $_table = 'meta_entity';
    protected $soft_delete = TRUE;
}
?>