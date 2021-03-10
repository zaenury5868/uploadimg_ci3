<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function index()
	{
		$data['title'] = 'single upload';
		$this->load->view('singleupload/index', $data);
	}

	public function file()
	{
		$upload = $_FILES['image']['name']; //nama gambar
		//jika ada data upload file gambar
		if($upload){
			//upload gambar
			
		} else {
			//status tidak ada upload
			$this->session->set_flashdata('status', 'tidak ada gambar yang di upload');
			redirect('upload');
		}
	}
}