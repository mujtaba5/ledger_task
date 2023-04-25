<?php if ( ! defined('BASEPATH')) exit ('No direct script  allow'); 

class Model_Gpx_track extends CI_Model {

	public function __construct() {

	}

	function getGpxTrackList() {
				
		$this->db->select('*');
								  
		$this->db->from(MAP_GPX_TRACK.' as gpx_track');
		
		$this->db->where('gpx_track.is_deleted',HARD_CODE_ID_NO);
		$this->db->where('gpx_track.is_active',HARD_CODE_ID_YES);
		$result = $this->db->get();

		if ($result->num_rows() >0) {
			return $result;

			// return $result->result();

		}else{
			return false;
		}

	}

	function get_gpx_detail($id){
		$this->db->select('*');
								  
		$this->db->from(MAP_GPX_TRACK.' as gpx_track');
		
		$this->db->where('gpx_track.id',$id);
		$this->db->where('gpx_track.is_deleted',HARD_CODE_ID_NO);
		$this->db->where('gpx_track.is_active',HARD_CODE_ID_YES);
		$result = $this->db->get();

		if ($result->num_rows() >0) {
			return $result->row();
		}else{
			return false;
		}
	}

	function delete_gpx_track($id){
								  
		
		$this->db->where('id',$id);
		$this->db->where('is_deleted',HARD_CODE_ID_NO);
		$this->db->where('is_active',HARD_CODE_ID_YES);
		$this->db->delete(MAP_GPX_TRACK);

		if ($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
	}

	function insert_gpx_track($data){
   		 $this->db->insert(MAP_GPX_TRACK,$data);
		 return true;
	}

	function insert_user_email_subscription($data){
		
		$this->db->select('*');					  
		$this->db->from(USER_EMAIL_SUBSCRIPTION.' as user_email');
		
		$this->db->where('user_email.email',$data['email']);
		$this->db->where('user_email.is_deleted',HARD_CODE_ID_NO);
		$this->db->where('user_email.is_active',HARD_CODE_ID_YES);
		$result = $this->db->get();

		if ($result->num_rows() >0) {
			$this->db->where('email',$data['email']);
			$this->db->update(USER_EMAIL_SUBSCRIPTION, $data);
			return true;
		}else{
			$this->db->insert(USER_EMAIL_SUBSCRIPTION,$data);
			return true;
		}

	}

}

?>