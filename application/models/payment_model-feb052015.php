<?php
class Payment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function getData($id = FALSE)
	{
         if($id === FALSE)
		{
	    $query = $this->db->get('payment');
		return $query->result_array();
		}

		$query = $this->db->get_where('payment', array('id' => $id));
		return $query->row_array();
	}

	public function getDataByUploadStatus($status = 0)
	{
		$sql = "SELECT * FROM payment WHERE uploadstatus = $status LIMIT 0,100";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getDataByDate($sdate,$edate)
	{
		$sql = "SELECT * FROM payment WHERE created_date BETWEEN '$sdate' AND '$edate' ";
		$query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	
	public function getDataByDate2($sdate)
	{
            $sql = "SELECT * FROM payment WHERE created_date > '$edate' ";
            $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	
	public function setData()
	{
		$data = array(
			'TransactionID' => $this->input->post('transaction_id'),
			'TransactionDate' => $this->input->post('transactiondate'),
			'account_no' => $this->input->post('account_no'),
			'amount_paid' => $this->input->post('amount_paid'),
			'SourceBank' => $this->input->post('source_bank'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email')
		);
	
		$insertid =  $this->db->insert('payment', $data);
	
	
		$result = "Data Inserted Successfully";
		return $result;
	
	}


	public function updateStatus()
	{
	
	
		$data = array(
			'uploadstatus' => $this->input->post('status')
		);
	
		$insertid =  $this->db->update('payment', $data);
	
	
		$result = "Data Updated Successfully";
		return $result;
	
	}


}