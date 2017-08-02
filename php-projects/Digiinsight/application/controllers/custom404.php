<?php
class custom404 extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function index()
    {
       $data['content'] = 'custom404_view';  // View name
       $data['heading'] = 'custom404_viewheading';  
       $data['message'] = 'custom404_viewmessage';  
       $this->load->view('templates/header');
       $this->load->view('errors/html/error_404', $data);   // load viwe
       $this->load->view('templates/homefooter');
    }
}
?>