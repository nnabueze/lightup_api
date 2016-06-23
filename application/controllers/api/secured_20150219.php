<?php defined('BASEPATH') OR exit('No direct script access allowed');


// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Secured extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
		$this->load->model('bill_model');
		$this->load->model('payment_model');
		$this->load->model('client_model');
        
        
    }
    
    function bill_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $bill = $this->bill_model->getData( $this->get('id') );
		//$bill = null;
    	
        if($bill)
        {
            $this->response($bill, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No bill found!'), 404);
        }
    }
    
    function bill_post()
    {
       
	   $message = $this->bill_model->setData();

        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
        
    function bills_get()
    {
        $bills = $this->bill_model->getData();
                
        if($bills)
        {
            $this->response($bills, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No bills found!'), 404);
        }
    }
	
	
	function client_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $client = $this->client_model->getData2( $this->get('id') );
    	
        if($client)
        {
            $this->response($client, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No client found!'), 404);
        }
    }
    
    function client_post()
    {
       
	   $message = $this->client_model->setData();

        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
        
    function clients_get()
    {
        $clients = $this->client_model->getData();
                
        if($clients)
        {
            $this->response($clients, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No clients found!'), 404);
        }
    }
	
	function payment_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $payment = $this->payment_model->getData( $this->get('id') );
    	
        if($payment)
        {
            $this->response($payment, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No payment found!'), 404);
        }
    }
    
    function payment_post()
    {
       
	   $id = $this->post('Transaction_id');
	   $date = $this->post('Transactiondate');
	   $acct = $this->post('Account_no');
	   $amt = $this->post('Amount_paid');
	   $bank = $this->post('Source_bank');
	   
	   $message = $this->payment_model->setData($id,$date,$acct,$amt,$bank);
    
	if($message === false)
	  {
        $this->response(NULL, 400); // 400 being the HTTP response code
	 }
	else {
		    $this->response($message, 200); // 200 being the HTTP response code
	     }
    }

   function payments_put()
    {
       
	   $message = $this->payment_model->updateStatus();

        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
        
    function payments_get()
    {
        
       //$sdate =  $this->get('sdate');
       //$edate =  $this->get('edate');


        $status =  $this->get('status');

        $payments = $this->payment_model->getDataByUploadStatus($status);
                
        if($payments)
        {
            $this->response($payments, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No payments found!'), 404);
        }
    }




	
}