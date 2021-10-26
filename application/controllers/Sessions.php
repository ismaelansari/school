<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sessions extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_view')) {
            access_denied();
        }
        $bank = $this->session_model->getBank();
        $data['bank'] = $bank;

        $this->session->set_userdata('top_menu', 'System Settings');
        $this->session->set_userdata('sub_menu', 'sessions/index');
        $data['title'] = 'Session List';
        $session_result = $this->session_model->getAllSession();
       
        $year_arr = [];
        foreach($session_result as $key=>$s){
            $session = explode("-", $s['session']);
            $start_year = $session[0]."-04-01";
            $end_year = ($session[0]+1)."-03-31";
            $session_result[$key]['income'] = $this->session_model->getIncome($start_year,$end_year);
            // /$session_result[$key]['fee']
            $session_fee = $this->session_model->getFee($start_year,$end_year);
            
            $session_result[$key]['expense'] = $this->session_model->getExpense($start_year,$end_year);
            $session_result[$key]['fee'] = 0;

            if(!empty($session_fee)){
                $total = 0;
                foreach ($session_fee as $key1 => $fee) {
                    foreach ($fee->fees as $fee_key => $fee_value) {
                        $fee_paid = 0;
                        $fee_discount = 0;
                        $fee_fine = 0;
                        
                        if (!empty($fee_value->amount_detail)) {
                            $fee_deposits = json_decode(($fee_value->amount_detail));

                            foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                $fee_paid = $fee_paid + $fee_deposits_value->amount;
                                $fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
                                $fee_fine = $fee_fine + $fee_deposits_value->amount_fine;
                            }
                        }
                        $feetype_balance = $fee_value->amount - ($fee_paid + $fee_discount);
                        if($feetype_balance == 0){
                            $total += $fee_value->amount;
                        }

                        if($feetype_balance != 0 && !empty(($fee_paid + $fee_discount))){
                            $total += $fee_value->amount;
                        }
                    }
                }
                $session_result[$key]['fee'] = $total;
                $session_result[$key]['total'] = $total+$session_result[$key]['income']-$session_result[$key]['expense'];
               /* foreach($session_fee as $fee){
                    echo "<pre>";print_r($fee);
                    $fee_paid = 0;
                    $fee_discount = 0;
                    $fee_fine = 0;
                    #echo "<pre>";print_r($fee);die;
                    $fee_deposits = json_decode($fee['amount_detail']);
                    foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                        $fee_paid[] = $fee_paid + $fee_deposits_value->amount;
                        $fee_discount[] = $fee_discount + $fee_deposits_value->amount_discount;
                        $fee_fine[] = $fee_fine + $fee_deposits_value->amount_fine;
                    }

                    $feetype_balance = $fee_deposits->amount - ($fee_paid + $fee_discount);
                    echo "<pre>"; print_r($feetype_balance);die;
                    $session_result[$key]['fee'] = $amount_detail;
                }*/
            }
           # echo $start_year." ".$end_year;die;
        }
        #echo "<pre>";print_r($session_result);die;
        $data['sessionlist'] = $session_result;
        $this->load->view('layout/header', $data);
        $this->load->view('session/sessionList', $data);
        $this->load->view('layout/footer', $data);
    }

    function view($id) {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Session List';
        $session = $this->session_model->get($id);
        $data['session'] = $session;
        $this->load->view('layout/header', $data);
        $this->load->view('session/sessionShow', $data);
        $this->load->view('layout/footer', $data);
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_delete')) {
            access_denied();
        }
        $this->session->set_flashdata('list_msg', '<div class="alert alert-success text-left">'.$this->lang->line('delete_message').'</div>');
        $this->session_model->remove($id);
        redirect('sessions/index');
    }

    function create() {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_add')) {
            access_denied();
        }
        $session_result = $this->session_model->getAllSession();

        $data['sessionlist'] = $session_result;
        $data['title'] = 'Add Session';
        $bank = $this->session_model->getBank();
        $data['bank'] = $bank;

        $this->form_validation->set_rules('session', $this->lang->line('session'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('session/sessionList', $data);
            $this->load->view('layout/footer', $data);
        } else {
            
            $data = array(
                'session' => $this->input->post('session'),
                //'opening_amount' => $this->input->post('opening_amount'),
            );

            $inserted_id = $this->session_model->add($data);

            $opening_bl = [];
            if(!empty($_POST['amount'])){
                foreach ($_POST['amount'] as $key => $amount) {
                    $opening_bl = array(
                        'amount' => $amount,
                        'payment_by' => $_POST['bank'][$key]??0,
                        'session_id'=>$inserted_id
                    );
                    $this->session_model->addOpeningBalance($opening_bl);
                }  
            }
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('success_message').'</div>');
            redirect('sessions/index');
        }
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_edit')) {
            access_denied();
        }
        $session_result = $this->session_model->getAllSession();
        $data['sessionlist'] = $session_result;
        $data['title'] = 'Edit Session';
        $data['id'] = $id;
        $session = $this->session_model->get($id);
        $data['session'] = $session;
        $this->form_validation->set_rules('session', $this->lang->line('session'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('session/sessionEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'session' => $this->input->post('session'),
                'opening_amount' => $this->input->post('opening_amount'),
            );
            $this->session_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('update_message').'</div>');
            redirect('sessions/index');
        }
    }

    public function banksettings(){
        if (!$this->rbac->hasPrivilege('session_setting', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'System Settings');
        $this->session->set_userdata('sub_menu', 'sessions/index');
        $data['title'] = 'Session List';
        $bank_result = $this->session_model->getBank();
        $data['sessionlist'] = $bank_result;
        $this->load->view('layout/header', $data);
        $this->load->view('bank/sessionList', $data);
        $this->load->view('layout/footer', $data);
    }

    function bankcreate() {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_add')) {
            access_denied();
        }
        $session_result = $this->session_model->getBank();
        $data['sessionlist'] = $session_result;
        $data['title'] = 'Add Bank';
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('bank/sessionList', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );

            $this->session_model->addBanK($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('success_message').'</div>');
            redirect('banksettings');
        }
    }

    function deletebank($id){
        if (!$this->rbac->hasPrivilege('session_setting', 'can_delete')) {
            access_denied();
        }
        $this->session->set_flashdata('list_msg', '<div class="alert alert-success text-left">'.$this->lang->line('delete_message').'</div>');
        $this->session_model->removebank($id);
        redirect('banksettings');
    }

    function editbank($id) {
        if (!$this->rbac->hasPrivilege('session_setting', 'can_edit')) {
            access_denied();
        }
        $session_result = $this->session_model->getBank();
        $data['sessionlist'] = $session_result;
        $data['title'] = 'Edit Session';
        $data['id'] = $id;
        $session = $this->session_model->getBank($id);
        $data['session'] = $session;
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('bank/sessionEdit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'is_active' => $this->input->post('is_active')
            );
            $this->session_model->addBanK($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('update_message').'</div>');
            redirect('banksettings');
        }
    }

}

?>