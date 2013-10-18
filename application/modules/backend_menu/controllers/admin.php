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
        $colModel[] = json_decode('{"name" : "childrens", "index" : "childrens", "width" : 50, "editable" : false, "formatter" : "showlink", "formatoptions" : {"baseLinkUrl" : "backend_menu", "idName" : "parent_id"}}');
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

        // $this->fb->info($this->input->post());
        if ($this->input->post()) {
            $this->_jqgrid_options->postData = $this->input->post();
        }

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

        // 預設parent_id = 1
        $parent_id = (int)$this->input->post('parent_id');
        $level = 1;
        if ($parent_id !== 0) {
            // 取得父節點的info
            $parent_info = $this->post->get($parent_id);
            if ($parent_info) {
                $level = $parent_info->level + 1;
            }
            // $this->fb->info($parent_info);
            // $this->fb->info($parent_id);
        }




        $data = $this->input->post();
        $data['level'] = $level;

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