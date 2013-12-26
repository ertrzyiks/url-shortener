<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redirect extends CI_Controller {
	public function index( $code )
	{
		$this->load->model( 'Link', '', TRUE );
		$result = $this->Link->findByCode( $code );
		
		if($result === null)
		{
			$this->load->helper('url');
			$this->load->view('notfound', compact('code'));
		}
		else
		{
			$this->load->view('redirect', $result);
		}
	}
	
	public function qrcode( $code )
	{
		$this->load->library("qr_code_gen", null, "QrCode");
		
		$this->QrCode->make( $code );
	}
}
