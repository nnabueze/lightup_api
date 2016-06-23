<?php
class Bill_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


public function getData($id = FALSE)
{
         if($id === FALSE)
		{
	    $query = $this->db->get('klu_bill_ol');
		return $query->result_array();
		}
		
		$query = $this->db->get_where('klu_bill_ol', array('id' => $id));
	return $query->row_array();
}



public function setData()
{
    
	
	$data = array(
	    'customer_id' => $this->input->post('account_no'),
		'ref_no' => $this->input->post('refno'),
		'billing_from' => $this->input->post('bfrom'),
		'billing_to' => $this->input->post('bto'),
		'bill_date' => $this->input->post('bdate'),
		'MeterMaintenanceCharge' => $this->input->post('mmc'),
		'Discounts' => $this->input->post('discount'),
		'OtherCharges' => $this->input->post('othercharge'),
		'RoutineCharges' => $this->input->post('routinecharge'),
		'service_charge' => $this->input->post('servicecharge'),
		'LastMeterReading' => $this->input->post('lastmeterreading'),
		'CurrentMeterReading' => $this->input->post('currentmeterreading'),
		'DaysUsage' => $this->input->post('daysusage'),
		'DateOfCurrentReading' => $this->input->post('datecurrentreading'),
		'DateOfLastReading' => $this->input->post('datelastreading')
	);
	
	$insertid =  $this->db->insert('klu_bill_ol', $data);
	
	
	$result = "Data Inserted Successfully";
	return $result;

}


}