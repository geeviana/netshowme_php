<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Netshowme extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('vw_netshowme');
	}

	public function saveContato(){

		$data = $_POST;
		$data['arquivo'] =  $_FILES['arq']['name'];
		$uploaddir = 'upload/';
		$uploadfile = $uploaddir . basename($_FILES['arq']['name']);
		move_uploaded_file($_FILES['arq']['tmp_name'], $uploadfile);
		$this->load->model("Netshowme_model");
		$this->Netshowme_model->setsContato($data);
		$myfile = fopen("email_config.txt", "r") or die("Unable to open file!");
		$email_send =  fread($myfile,filesize("email_config.txt"));
		fclose($myfile);

		$to      = $email_send;
		$subject = 'the subject';
		$message = 'hello';
		$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);




			


	}
}
