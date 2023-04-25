<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
		
		parent::__construct();	
		$this->load->helper('url');
		$this->load->model('gpx_track/model_gpx_track');
		$this->load->library('upload');
		

	}

	public function index()
	{
		// $this->load->view('welcome_message');
		redirect('ledger-list');
	}

	public function ledgerListForAdmin(){
		$this->load->view('task');

	}



	public function getLedgerList_datatable(){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
  
		$empty_result = array(
			"draw" => $draw,
			"recordsTotal" =>0,
			"recordsFiltered" =>0,
			"data" =>  array()
		 );

		  
				
			$json = file_get_contents(JSON_URL);
			if($json){
			$json = json_decode($json);
			if($json){
					$count = 0;
					$i=0;
					$data = [];
					$amount_sum =0;
					foreach($json as $row){
						$count=$count+1;
						$sign=($row->is_credit?:'-');
						$amount= ($row->amount>0?$sign.$row->amount:0);
						$amount_sum=$amount_sum+$amount;
						$amount=$row->currency.' '.$amount;
						$utcDateTime = new DateTime($row->created_at, new DateTimeZone('UTC'));
						$date=  $utcDateTime->format('Y-m-d H:i:s');
						if(isset($row->description) && !empty($row->description)){
							$description=$row->description;
						}else{
							$description='-';
						}
						$i=$i+1;
						$data[]= array(
							strval($i),
							$description,
							$date,
							strval($amount),
							'<button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" onclick="" title="Delete">'.
							'<i class="fa fa-edit"></i></button>'
						);
						// echo 'type'.gettype($description).'<br>';
					}
				
			
				$result = array(
							"draw" => strval($draw),
							"recordsTotal" => strval($count),
							"recordsFiltered" => strval($count),
							"data" => $data,
							"total" => strval($amount_sum)
						);
				}else{
					$result = $empty_result;
	 
				}
			}else{
				$result = $empty_result;
	 
			}
		   echo json_encode($result);
		   exit();
		
	 
	}

	
}
