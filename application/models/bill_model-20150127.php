<?php
class Bill_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function getData($AccountNo = FALSE)
	{
		if($id === FALSE)
		{
			$query = $this->db->get('klu_bill_new');
			return $query->result_array();
		}

		$query = $this->db->get_where('klu_bill_new', array('AccountNo' => $AccountNo));
		return $query->result_array();
	}

	public function setData()
	{
		$data = array(
			'AccountNo' => $this->input->post('AccountNo'),
			'ServiceDistrict' => $this->input->post('ServiceDistrict'),
			'LastMeterReading' => $this->input->post('LastMeterReading'),
			'CurrentMeterReading' => $this->input->post('CurrentMeterReading'),
			'UnitsConsumed' => $this->input->post('UnitsConsumed'),
			'LastPayDate' => $this->input->post('LastPayDate'),
			'LastPayAmt' => $this->input->post('LastPayAmt'),
			'PriorBalance' => $this->input->post('PriorBalance'),
			'OutstandingBalance' => $this->input->post('OutstandingBalance'),
			'AmountDue' => $this->input->post('AmountDue'),
			'MeterMaintenanceCharge' => $this->input->post('MeterMaintenanceCharge'),
			'Discounts' => $this->input->post('Discounts'),
			'OtherCharges' => $this->input->post('OtherCharges'),
			'PenaltyCharges' => $this->input->post('PenaltyCharges'),
			'StampDutyCharges' => $this->input->post('StampDutyCharges'),
			'ServiceCharges' => $this->input->post('ServiceCharges'),
			'RoutineCharges' => $this->input->post('RoutineCharges'),
			'BillServiceRate' => $this->input->post('BillServiceRate'),
			'ServiceTypeDesc' => $this->input->post('ServiceTypeDesc'),
			'BillPeriod' => $this->input->post('BillPeriod'),
			'UsageType' => $this->input->post('UsageType'),
			'MeterNumber' => $this->input->post('MeterNumber'),
			'MeterType' => $this->input->post('MeterType'),
			'MeterCondition' => $this->input->post('MeterCondition'),
			'LeakageStatus' => $this->input->post('LeakageStatus'),
			'PropertyType' => $this->input->post('PropertyType'),
			'MeterReadDevice' => $this->input->post('MeterReadDevice'),
			'Billmethod' => $this->input->post('Billmethod'),
			'DateCreated' => $this->input->post('DateCreated')
		);
	
		$insertid =  $this->db->insert('klu_bill_new', $data);
	
	
		$result = "Data Inserted Successfully";
		return $result;
	
	}
	
	public function setData2()
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