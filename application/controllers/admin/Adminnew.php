<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Adminnew extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("classteacher_model");
        $this->load->model("Staff_model");
        $this->load->library('Enc_lib');
        $this->sch_setting_detail = $this->setting_model->getSetting();

    }

    public function unauthorized()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('unauthorized', $data);
        $this->load->view('layout/footer', $data);
    }
    // DAILY WORK
    public function front_office()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/front_office_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
        public function communicate()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/communicate_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
        public function download_center()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/download_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }


    // Important Links
        public function student_informations()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/student_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
    public function human_resources()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/human_resource_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
    // ACADEMICS
        public function examations()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/exmation_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
    public function online_examations()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/online_exmation_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
        public function academics()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/academic_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
            public function certificates()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/certificate_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
    // Other Services
        public function transport()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/transport_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }

            public function hostel()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/hostel_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }

                public function library()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/library_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
                public function inventory()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/inventory_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
    public function report()
    {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('admin/custom_dashboard/report_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }



}
