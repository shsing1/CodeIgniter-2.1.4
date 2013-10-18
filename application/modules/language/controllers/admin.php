<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->model($this->router->fetch_module() . '_model', 'post');
        $colModel = $this->post->get_col_model();
        // $this->fb->info($colModel );
        // $colModel = '['.
        //         '{"name" : "id", "index" : "id", "width" : 55, "editable" : false, "sorttype" : "int"},'.
        //         '{"name" : "name", "index" : "name", "width" : 90, "editable" : true, "editrules" : {"required" : true}},'.
        //         // '{"name" : "class_name", "index" : "class_name", "width" : 90, "editable" : true, "editrules" : {"required" : true}},'.
        //         '{"name" : "table_name", "index" : "table_name", "width" : 90, "editable" : true, "editrules" : {"required" : true}}'.
        //     ']';

        // $options->colModel = json_decode($colModel);

        // $this->_jqgrid_options->colModel = json_decode($colModel);
        $this->_jqgrid_options->colModel = $colModel;

        $rs = new stdClass;
        $rs->fun = 'jqrid';
        $rs->options = $this->_jqgrid_options;
        $data['json_data'] = $rs;
        $this->load->view('template/json', $data);
    }

    public function list_data()
    {

        $this->load->model($this->router->fetch_module() . '_model', 'post');

        $info = $this->post->get_page_info();

        $rs = new stdClass;
        $data['json_data'] = $info;
        $this->load->view('template/json', $data);

    }

    /**
     * [add description]
     */
    public function edit_data()
    {

        $this->load->model($this->router->fetch_module() . '_model', 'post');

        $data = $this->input->post();

        $id = $data['id'];
        if ($data['oper'] === 'add') {
            $rs = $this->post->insert($data);
        } else if ($data['oper'] === 'edit') {
            $rs = $this->post->update($id, $data);
        } else if ($data['oper'] === 'del') {
            $rs = $this->post->delete($id);
        }

        $data['json_data'] = $rs;
        $this->load->view('template/json', $data);
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */