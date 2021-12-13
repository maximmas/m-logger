<?php

namespace ML;


class Logger {

	private $label;
	private $dataType;
	private $data;

	public function __construct( $data = 'no data', string $label = 'no label' ) {
		$this->label    = $label;
		$this->data     = $data;
		$this->dataType = gettype( $data );
	}

	public function run(): void {

		switch ( $this->dataType ) {
			case 'boolean' :
				$this->data = ( $this->data ) ? 'true' : 'false';
				break;
			case 'NULL' :
				$this->data = '-';
		}
		$this->writeFile();
	}

	private function writeFile(): void {
		$file = M_LOGGER_PATH . 'logs/log.txt';
		$open = fopen( $file, "a" );
		if ( $open ) {
			$content = $this->label . " : " . date( "Y-m-d H:i:s" ) . PHP_EOL;
			$content .= "Data type: " . $this->dataType . PHP_EOL;
			$content .= "Data value: " . print_r( $this->data, true ) . PHP_EOL;
			$content .= "=======================================" . PHP_EOL;
			fwrite( $open, $content );
			fclose( $open );
		}

	}


}