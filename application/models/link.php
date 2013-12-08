<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Model {
  
	public $url   = '';
    public $created = '';
	
	private $chars = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
	);
	
	private $charsSize;
	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		
		$this->charsSize = count($this->chars);
	}
	
	function insert( $url )
	{
		$this->url   = $url;
		$this->created    = date("Y-m-d H:i:s");

		$this->db->insert('links', $this);
		return $this->db->insert_id();
	}
	
	function find( $id )
	{
		$this->db->select('url');
		$this->db->where('id', $id);
		$q = $this->db->get('links');
		return array_shift($q->result_array());
	}
	
	function findByCode( $code )
	{
		return $this->find( $this->getIdByCode($code) );
	}
	
	/**
	 * 
	 */
	function getCodeById( $id )
	{
		$code = '';
		while( $id > 0 )
		{
			$code .= $this->chars[ $id % $this->charsSize ];
			$id = floor($id / $this->charsSize);
		}
		
		return $code;
	}
	
	/**
	 *
	 */
	function getIdByCode( $code )
	{
		$length = strlen($code);
		$id = 0;
		$base = 1;
		for( $i = 0 ; $i < $length; $i++ )
		{
			$c = $code[$i];
			$pos = array_search($c, $this->chars);
			
			if($pos === false)
			{
				return 0;
			}
			
			$id += $base * $pos;
			$base *= $this->charsSize;
		}
		
		return $id;
	}
}