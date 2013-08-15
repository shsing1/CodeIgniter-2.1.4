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

        // $this->fb->info($this->router->fetch_module());
        // $options = new stdClass;
        // $options->url = $this->router->fetch_module() . '/list_data';
        // $options->editurl = $this->router->fetch_module() . '/edit_data';
        // $options->datatype = "json";
        // $options->mtype = 'POST';
        // // $options->colNames = array('Inv No','Date', 'Client', 'Amount','Tax','Total','Notes');

        // $colModel = array();
        // $col = new stdClass;
        // $col->name = 'id';
        // $col->index = 'id';
        // $col->width = 55;
        // $colModel[] = $col;
        // $col = new stdClass;
        // $col->name = 'invdate';
        // $col->index = 'invdate';
        // $col->width = 90;
        // $colModel[] = $col;
        // $col = new stdClass;
        // $col->name = 'name';
        // $col->index = 'name asc, invdate';
        // $col->width = 100;
        // $colModel[] = $col;
        // $col = new stdClass;
        // $col->name = 'amount';
        // $col->index = 'amount';
        // $col->width = 80;
        // $col->align = 'right';
        // $colModel[] = $col;
        // $col = new stdClass;
        // $col->name = 'tax';
        // $col->index = 'tax';
        // $col->width = 80;
        // $col->align = 'right';
        // $colModel[] = $col;
        // $col = new stdClass;
        // $col->name = 'total';
        // $col->index = 'total';
        // $col->width = 80;
        // $col->align = 'right';
        // $colModel[] = $col;
        // $col = new stdClass;
        // $col->name = 'note';
        // $col->index = 'note';
        // $col->width = 150;
        // $col->sortable = false;
        // $colModel[] = $col;

        $colModel = '['.
                '{"name" : "id", "index" : "id", "width" : 55, "editable" : false, "sorttype" : "int"},'.
                '{"name" : "name", "index" : "name", "width" : 90, "editable" : true, "editrules" : {"required" : true}},'.
                '{"name" : "class_name", "index" : "class_name", "width" : 90, "editable" : true, "editrules" : {"required" : true}},'.
                '{"name" : "table_name", "index" : "table_name", "width" : 90, "editable" : true, "editrules" : {"required" : true}, "formatter" : "showlink", "formatoptions" : {"baseLinkUrl" : "property"}}'.
            ']';

        // $options->colModel = json_decode($colModel);

        $this->_jqgrid_options->colModel = json_decode($colModel);

        // $options->rowNum = 10;
        // $options->rowList = array(10, 20, 30);
        // $options->pager = '#jqGrid-pager';
        // $options->sortname = 'id';
        // $options->viewrecords = true;
        // $options->sortorder = 'desc';
        // $options->caption = 'Entity';

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

        // echo '{"page":"1","total":2,"records":"13","rows":[{"id":"13","cell":["13","2007-10-06","Client 3","1000.00","0.00","1000.00",null]},{"id":"12","cell":["12","2007-10-06","Client 2","700.00","140.00","840.00",null]},{"id":"11","cell":["11","2007-10-06","Client 1","600.00","120.00","720.00",null]},{"id":"10","cell":["10","2007-10-06","Client 2","100.00","20.00","120.00",null]},{"id":"9","cell":["9","2007-10-06","Client 1","200.00","40.00","240.00",null]},{"id":"8","cell":["8","2007-10-06","Client 3","200.00","0.00","200.00",null]},{"id":"7","cell":["7","2007-10-05","Client 2","120.00","12.00","134.00",null]},{"id":"6","cell":["6","2007-10-05","Client 1","50.00","10.00","60.00",""]},{"id":"5","cell":["5","2007-10-05","Client 3","100.00","0.00","100.00","no tax at all"]},{"id":"4","cell":["4","2007-10-04","Client 3","150.00","0.00","150.00","no tax"]}],"userdata":{"amount":3220,"tax":342,"total":3564,"name":"Totals:"}}';
        // echo '{"page" : 1, "total" : 1, "records" : 0, "rows" : []}';
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
        // echo 'add';
        // $rs = new stdClass;
        // $rs->act = 'add';
        $data['json_data'] = $rs;
        $this->load->view('template/json', $data);
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */