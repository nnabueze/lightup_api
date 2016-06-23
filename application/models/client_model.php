<?php
class Client_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


public function getData($id = FALSE)
{
         if($id === FALSE)
		{
	    $query = $this->db->get('klu_user');
		return $query->result_array();
		}
		
		$query = $this->db->get_where('klu_user', array('account_no' => $id));
	return $query->row_array();
}

public function getData2($acctno)
{
          /*                          
     $sql = "SELECT a.account_no, a.customer_name, a.customer_address, a.district, 
              b.RoutineCharges AS currentCharge, b.total_due  as  OutstandingBalance
             FROM klu_user a, klu_bill b
              where a.id = b.customer_id 
              and b.id = (select max(id) from klu_bill where customer_id = (select id from klu_user where account_no = '$acctno'))";
            $query = $this->db->query($sql);
	    return $query->result_array();
		*/
		
		$this->db->select('*');
		$this->db->from('klu_user');
		$this->db->join('klu_user', 'klu_bill.customer_id = klu_user.id');
		$this->db->where("klu_user.acccount_no", $acctno);
		$this->db->order_by('klu_bill.bill_date','desc');
		
		if(isset($limit))
		{
			$this->db->limit(1);
		}
		
		$query = $this->db->get();
		return $query->result_array();
}


public function setData()
{
    
	
	$data = array(
	    'account_no' => $this->input->post('account_no'),
		'customer_name' => $this->input->post('name'),
		'customer_address' => $this->input->post('address'),
		'email' => $this->input->post('email'),
		'phone' => $this->input->post('phone'),
		'district' => $this->input->post('district')
	);
	
	$insertid =  $this->db->insert('klu_user_ol', $data);
	
	
	$result = "Data Inserted Successfully";
	return $result;

}


}