<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

	public function upload($data, $type)
	{
		if($type == 'add'){
			$this->db->insert('upload_image', $data);
		}else {
			$this->db->update('upload_image', $data, ['id' => $data['id']]);
			
		}
		return $this->db->affected_rows();
	}

	public function getDataImage()
	{
		return $this->db->get('upload_image')->result_array();
	}
	public function getDataById($id)
	{
		return $this->db->get_where('upload_image', ['id'=>$id])->row_array();
	}
	public function delete($id)
	{
		$this->db->delete('upload_image', ['id' => $id]);
		return $this->db->affected_rows();
		
	}
}