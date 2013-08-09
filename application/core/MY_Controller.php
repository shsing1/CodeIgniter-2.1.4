<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library("template");
        if(preg_match('/application\/json/i', $_SERVER['HTTP_ACCEPT'])){
            $this->output
            ->set_content_type('application/json');
        }
    }
}
class Admin_Controller extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->template->add_js('/assets/js/jquery.address-1.6.min.js', TRUE);
        $this->template->add_js('/assets/js/jquery.jqGrid.min.js', TRUE);
        $this->template->add_js('/assets/js/init.js', TRUE);

        $this->template->add_css('/assets/css/ui.jqgrid.css');
        $this->template->add_css('/assets/css/admin.css');
    }
}
class Public_Controller extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }
}