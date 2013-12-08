<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$code = "";
		$url = "";
		if(isset($_POST['url']) && !empty($_POST['url']))
		{
			$url = $_POST['url'];
			
			$this->load->model('Link', '', TRUE);
			
			$id = $this->Link->insert( $url );
			$code = $this->Link->getCodeById( $id );
			
		}
		$this->load->helper('url');
		$this->load->view('home', compact('code', 'url'));
	}
}