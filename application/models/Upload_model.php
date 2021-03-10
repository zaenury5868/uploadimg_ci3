<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

	public function upload($data)
	{
		$this->db->insert('upload_image', $data);
		return $this->db->affected_rows();
	}

	public function getDataImage()
	{
		return $this->db->get('upload_image')->result_array();
	}
}