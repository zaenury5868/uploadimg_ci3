<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Upload_model');
		
	}
	
	public function index()
	{
		$data['title'] = 'single upload';
		$data['images'] = $this->Upload_model->getDataImage(); //ambil data dari model
		$this->load->view('singleupload/index', $data);
	}

	public function file()
	{
		$upload = $_FILES['image']['name']; //nama gambar
		//jika ada data upload file gambar
		if($upload){
			//upload gambar
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			$config['upload_path'] = './assets/image/';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){
				//file berhasil diupload
				$imageName = $this->upload->data('file_name');
				//resize gambar
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/image/'.$imageName;
				$config['create_thumb'] = false;
				$config['quality'] = '100%';
				$config['width'] = '600';
				$config['height'] = '350';
				$config['new_image'] = './assets/image/'. $imageName;
				
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				
				$data = [
					'image' => $imageName,
					'title' => $imageName,
					'date_created' => time()
				];
				if($this->Upload_model->upload($data) > 0){ // jika upload gambar lebih dari 0
					$this->session->set_flashdata('status', 'data berhasil disimpan');
					redirect('upload');
				}else{
					//jika tidak masuk ke database
					$this->session->set_flashdata('status', 'server gangguan!, silahkan ulangi kembali');
					redirect('upload');
				}
			} else {
				//gagal upload
				$this->session->set_flashdata('status', $this->upload->display_errors());
				redirect('upload');
			}
		} else {
			//status tidak ada upload
			$this->session->set_flashdata('status', 'tidak ada gambar yang di upload');
			redirect('upload');
		}
	}
}