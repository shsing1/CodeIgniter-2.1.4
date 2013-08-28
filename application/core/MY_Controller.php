<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->db->query("SET NAMES utf8");

        $this->load->library("template");
        if(preg_match('/application\/json/i', $_SERVER['HTTP_ACCEPT'])){
            $this->output->set_content_type('application/json');
        }
    }
}
class Admin_Controller extends MY_Controller {

    protected $_jqgrid_options;

    function __construct()
    {
        parent::__construct();
        $this->template->add_js('/assets/js/jquery.address-1.6.min.js', TRUE);
        $this->template->add_js('/assets/js/i18n/grid.locale-en.js', TRUE);
        $this->template->add_js('/assets/js/jquery.jqGrid.min.js', TRUE);
        $this->template->add_js('/assets/js/init.js', TRUE);

        $this->template->add_css('/assets/css/ui.jqgrid.css');
        $this->template->add_css('/assets/css/admin.css');

        $this->set_jqgrid_options();
    }

    /**
     * 取得頁碼資訊
     * @param  array $list 全部資料數
     * @return object
     */
    function get_page_info() {

        $this->load->model($this->router->fetch_module() . '_model', 'post');

        $page = (int)$this->input->post('page');
        $limit = (int)$this->input->post('rows');

        $this->db->select('count(id) AS records');
        $rows = $this->post->get_all();
        $records = 0;
        foreach($rows as $row){
            $records = $row->records;
        }
        if ( $records > 0 ) {
            $total_pages = ceil($records / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $start = $limit * $page - $limit;
        if ($start < 0) {
            $start = 0;
        }
        if ($this->post->get_list_count_childrens()) {
            $this->post->count_childrens();
        }
        $this->post->limit($limit, $start);
        $rows = $this->post->get_all();

        $info = new stdClass;

        $info->page = $page;
        $info->total = $total_pages;
        $info->records = $records;
        $info->rows = $rows;

        return $info;
    }

    function set_jqgrid_options() {

        $options = new stdClass;
        $options->url = $this->router->fetch_module() . '/list_data';
        $options->editurl = $this->router->fetch_module() . '/edit_data';
        $options->datatype = "json";
        $options->mtype = 'POST';
        $options->colModel = new stdClass;
        $options->rowNum = 10;
        $options->rowList = array(10, 20, 30);
        $options->pager = '#jqGrid-pager';
        $options->sortname = 'id';
        $options->viewrecords = true;
        $options->sortorder = 'desc';
        $options->caption = ucfirst($this->router->fetch_module());
        // $options->postData = [];

        $this->_jqgrid_options = $options;
    }
}
class Public_Controller extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }
}