<?php

if( file_exists( APPPATH . "third_party/phpqrcode/phpqrcode.php" ) )
{
	require( APPPATH . "third_party/phpqrcode/phpqrcode.php" );
}

class Qr_code_gen
{
	public function make( $string )
	{
		if ( class_exists("QRcode") )
		{
			header("Content-type: image/png");
			QRcode::png( $string, null, QR_ECLEVEL_L, 10, 5);
		}
		else
		{
			$url = urlencode( $string );
			header("Location: https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$url&choe=UTF-8");
		}
	}
}