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
		$sql = "SELECT * FROM payment WHERE uploadstatus = $status ORDER BY created_date DESC LIMIT 0,1000";
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
	
	public function setData($id,$date,$acct,$amt,$sbank, $dbank)
	{	
		
		
		$data = array(
			'TransactionID' => $id,
			'TransactionDate' => $date,
			'account_no' => $acct,
			'amount_paid' => $amt,
			'SourceBank' => $sbank,
                        'DestinationBank' => $dbank
		);
		
	
		$this->db->insert('payment', $data);
		
		$id = $this->db->insert_id();
		
		if($id > 0)
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
	
		return $result;
	}
	
	public function updateStatus()
	{

	   $id = (int) $this->input->post('ID');

		$data = array(
			'uploadstatus' => 1
		);

	    $this->db->where('id',$id);
		$insertid =  $this->db->update('payment', $data);

		return $insertid;

	}
	
	/*
	public function updateStatus()
	{
		$data = array(
			'uploadstatus' => $this->input->post('status')
		);
	
		$insertid =  $this->db->update('payment', $data);
	
		$result = "Data Updated Successfully";
		return $result;
	}
	*/


   public function setTestData()
	{	
		
           $postdata = serialize($_POST);		

		$data = array(
			'col1' => $postdata
		);
		
	
		$insertid = $this->db->insert('test_table_nibss', $data);
		
		
	
		return $insertid ;
	}

}