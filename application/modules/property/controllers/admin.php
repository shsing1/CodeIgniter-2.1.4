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
        $this->load->model('type_model', 'post_type');

        $type_list = $this->post_type->get_all();
        $type_value = new stdClass;
        foreach($type_list as $v)
        {
            $type_value->{$v->id} = $v->name;
        }

        // // $parent_id = $this->input->post('id');
        // // $this->fb->info($this->input->post());
        // $colModel = '['.
        //         '{"name" : "id", "index" : "id", "width" : 55, "editable" : false, "sorttype" : "int"},'.
        //         '{"name" : "name", "index" : "name", "width" : 90, "editable" : true, "editrules" : {"required" : true}},'.
        //         '{"name" : "column_name", "index" : "column_name", "width" : 90, "editable" : true, "editrules" : {"required" : true}},'.
        //         '{"name" : "type_id", "index" : "type_id", "width" : 50, "editable" : true, "editrules" : {"required" : true}, "edittype" : "select", "editoptions" : {"value" : '.json_encode($type_value).'}},'.
        //         '{"name" : "length", "index" : "length", "width" : 50, "editable" : true, "editrules" : {"required" : false}},'.
        //         '{"name" : "nullable", "index" : "nullable", "width" : 100, "editable" : true, "edittype" : "checkbox", "editoptions" : {"value" : "1:0"}},'.
        //         '{"name" : "updatable", "index" : "updatable", "width" : 100, "editable" : true, "edittype" : "checkbox", "editoptions" : {"value" : "1:0", "defaultValue" : "1"}},'.
        //         '{"name" : "multilingual", "index" : "multilingual", "width" : 100, "editable" : true, "edittype" : "checkbox", "editoptions" : {"value" : "1:0"}}'.
        //     ']';

        // $this->_jqgrid_options->colModel = json_decode($colModel);

        $this->load->model($this->router->fetch_module() . '_model', 'post');
        $colModel = $this->post->get_col_model();
        foreach($colModel as $v){
            if ($v->index === 'type_id') {
                $v->edittype = 'select';
                $v->editoptions = json_decode('{"value" : '.json_encode($type_value).'}');
            }
        }
        $this->_jqgrid_options->colModel = $colModel;

        $this->_jqgrid_options->postData = $this->input->post();

        $rs = new stdClass;
        $rs->fun = 'jqrid';
        $rs->options = $this->_jqgrid_options;
        $data['json_data'] = $rs;
        $this->load->view('template/json', $data);
    }

    public function list_data()
    {

        $info = $this->get_page_info();
        // $this->fb->info($info);

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
        // $this->fb->info($data);

        if ($data['id'] === '_empty') {
            unset($data['id'], $data['oper']);
            $rs = $this->post->insert($data, true);
        } else {
            $id = $data['id'];
            unset($data['id'], $data['oper']);
            $rs = $this->post->update($id, $data, true);
        }

        $data['json_data'] = $rs;
        $this->load->view('template/json', $data);
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */