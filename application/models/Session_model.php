<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $this->db->select()->from('sessions');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getAllSession() {
        $sql = "SELECT sessions.*,(SELECT sum(amount) from session_opening_balance WHERE sessions.id = session_opening_balance.session_id) as amount, IFNULL(sch_settings.session_id, 0) as `active` FROM `sessions` 
        LEFT JOIN sch_settings ON sessions.id=sch_settings.session_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getPreSession($session_id) {
        $sql = "select * from sessions where id in (select max(id) from sessions where id < $session_id)";

        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getStudentAcademicSession($student_id = null) {
        $this->db->select('sessions.*')->from('sessions');
        $this->db->join('student_session', 'sessions.id = student_session.session_id');
        $this->db->where('student_session.student_id', $student_id);
        $this->db->group_by('student_session.session_id'); 
        $this->db->order_by('sessions.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function remove($id) {
		$this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('sessions');
		$message      = DELETE_RECORD_CONSTANT." On sessions id ".$id;
        $action       = "Delete";
        $record_id    = $id;
        $this->log($message, $record_id, $action);
		//======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /*Optional*/
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
        //return $return_value;
        }
    }

    public function add($data) {
		$this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('sessions', $data);
			$message      = UPDATE_RECORD_CONSTANT." On sessions id ".$data['id'];
			$action       = "Update";
			$record_id    = $data['id'];
            
			$this->log($message, $record_id, $action);
			//======================Code End==============================

			$this->db->trans_complete(); # Completing transaction
			/*Optional*/

			if ($this->db->trans_status() === false) {
				# Something went wrong.
				$this->db->trans_rollback();
				return false;

			} else {
				//return $return_value;
			}
        } else {
            $this->db->insert('sessions', $data);
			$insert_id = $this->db->insert_id();
			$message      = INSERT_RECORD_CONSTANT." On sessions id ".$insert_id;
			$action       = "Insert";
			$record_id    = $insert_id;
			$this->log($message, $record_id, $action);
			#echo $this->db->last_query();die;
			//======================Code End==============================

			$this->db->trans_complete(); # Completing transaction
			/*Optional*/

			if ($this->db->trans_status() === false) {
				# Something went wrong.
				$this->db->trans_rollback();
				return false;

			} else {
				return $record_id;
			}
        }
    }

// bank management
    public function getBank($id = null) {
        $this->db->select()->from('bank');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function addBanK($data){
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('bank', $data);
            $message      = UPDATE_RECORD_CONSTANT." On bank id ".$data['id'];
            $action       = "Update";
            $record_id    = $data['id'];
            #echo $this->db->last_query();die;
            $this->log($message, $record_id, $action);
            #echo $this->db->last_query();die;
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /*Optional*/

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;

            } else {
                //return $return_value;
            }
        } else {
            $this->db->insert('bank', $data);
            #echo $this->db->last_query();die;
            $insert_id = $this->db->insert_id();

            $message      = INSERT_RECORD_CONSTANT." On bank id ".$insert_id;
            $action       = "Insert";
            $record_id    = $insert_id;

            $this->log($message, $record_id, $action);
            #echo $this->db->last_query();die;
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /*Optional*/

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;

            } else {
                //return $return_value;
            }
        }
    }

    public function removebank($id) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('bank');
        #echo $this->db->last_query();die;
        $message      = DELETE_RECORD_CONSTANT." On bank id ".$id;
        $action       = "Delete";
        $record_id    = $id;
        $this->log($message, $record_id, $action);
        //======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /*Optional*/
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
        //return $return_value;
        }
    }

    public function addOpeningBalance($data){
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('session_opening_balance', $data);
            $message      = UPDATE_RECORD_CONSTANT." On session_opening_balance id ".$data['id'];
            $action       = "Update";
            $record_id    = $data['id'];
            #echo $this->db->last_query();die;
            $this->log($message, $record_id, $action);
            #echo $this->db->last_query();die;
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /*Optional*/

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;

            } else {
                //return $return_value;
            }
        } else {
            $this->db->insert('session_opening_balance', $data);
            #echo $this->db->last_query();die;
            $insert_id = $this->db->insert_id();

            $message      = INSERT_RECORD_CONSTANT." On session_opening_balance id ".$insert_id;
            $action       = "Insert";
            $record_id    = $insert_id;

            $this->log($message, $record_id, $action);
            #echo $this->db->last_query();die;
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /*Optional*/

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;

            } else {
                //return $return_value;
            }
        }
    }

    public function getIncome($start,$endyear){
        $sql = "SELECT sum(amount) as incomes FROM `income` WHERE date BETWEEN '$start' and '$endyear'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['incomes']??0;
    }

    public function getFee($start,$endyear){
        $sql= "SELECT `student_fees_master`.*,fee_groups.name,`student_fees_deposite`.payment_mode,`student_fees_deposite`.`check_number`,`student_fees_deposite`.`payment_app_name`,`student_fees_deposite`.`bank_name` FROM `student_fees_master` INNER JOIN fee_session_groups on student_fees_master.fee_session_group_id=fee_session_groups.id INNER JOIN fee_groups on fee_groups.id=fee_session_groups.fee_groups_id LEFT JOIN student_fees_deposite  on student_fees_master.id = student_fees_deposite.student_fees_master_id WHERE DATE(`student_fees_deposite`.`created_at`) BETWEEN '$start' and '$endyear' ORDER BY `student_fees_master`.`id`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        if (!empty($result)) {
            foreach ($result as $result_key => $result_value) {
               
                $fee_session_group_id   = $result_value->fee_session_group_id;
                $student_fees_master_id = $result_value->id;
                $result_value->fees     = $this->getDueFeeByFeeSessionGroup($fee_session_group_id, $student_fees_master_id);

                if ($result_value->is_system != 0) {
                    $result_value->fees[0]->amount = $result_value->amount;
                }
            }
        }

        return $result;
    }

    public function getExpense($start,$endyear){
        $sql = "SELECT sum(amount) as amounts FROM `expenses` WHERE date BETWEEN '$start' and '$endyear'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['amounts']??0;
    }

    public function getDueFeeByFeeSessionGroup($fee_session_groups_id, $student_fees_master_id)
    {
        $sql = "SELECT student_fees_master.*,fee_groups_feetype.id as `fee_groups_feetype_id`,fee_groups_feetype.amount,fee_groups_feetype.due_date,fee_groups_feetype.fee_groups_id,fee_groups.name,fee_groups_feetype.feetype_id,feetype.code,feetype.type, IFNULL(student_fees_deposite.id,0) as `student_fees_deposite_id`, IFNULL(student_fees_deposite.amount_detail,0) as `amount_detail`,student_fees_deposite.payment_mode,student_fees_deposite.bank_name,student_fees_deposite.check_number,student_fees_deposite.payment_app_name,bank.name as bank_name_str FROM `student_fees_master` INNER JOIN fee_session_groups on fee_session_groups.id = student_fees_master.fee_session_group_id INNER JOIN fee_groups_feetype on  fee_groups_feetype.fee_session_group_id = fee_session_groups.id  INNER JOIN fee_groups on fee_groups.id=fee_groups_feetype.fee_groups_id INNER JOIN feetype on feetype.id=fee_groups_feetype.feetype_id LEFT JOIN student_fees_deposite on student_fees_deposite.student_fees_master_id=student_fees_master.id LEFT JOIN bank on student_fees_deposite.bank_name=bank.id and student_fees_deposite.fee_groups_feetype_id=fee_groups_feetype.id  WHERE student_fees_master.fee_session_group_id =" . $fee_session_groups_id . " and student_fees_master.id=" . $student_fees_master_id . " order by fee_groups_feetype.due_date ASC";
        #echo $sql;die;
        $query = $this->db->query($sql);
        return $query->result();
    }

}
