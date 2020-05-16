<?php

namespace ML;

class Logger {

    private $data;
    private $label;
    private $type;
    private $indent;

    public function __construct() {
        $this->indent = "  ";
    }

    public function get_log( $data = 'no data', $label = 'no label' ) {
        
        $datatype   = gettype( $data );

        $this->data = $data;
        $this->label = $label;
        $this->type = $datatype;
       
        if ( 'object' == $datatype  || 'array' == $datatype  ){
            $this->obj_handler();
        } else {
            $this->string_handler();
        };
    }

    private function obj_handler(){
        $file   = M_LOGGER_PATH . 'log.txt'; 
        $open   = fopen( $file, "a" ); 
        $data   = "---------"  . PHP_EOL;
        $data   .= "time: " . wp_date( 'j-M-Y H:i:s' ) . PHP_EOL;
        $data   .= "label: " . $this->label . PHP_EOL;
        $data   .= "type: " . $this->type . PHP_EOL;
        $data   .= "value: " . PHP_EOL;

        if ( is_array( $this->data ) ) $data .= $this->get_array( $this->data );

        $write   = fwrite( $open, $data );  
        fclose( $open );
    }

    private function string_handler(){
        $file   = M_LOGGER_PATH . 'log.txt'; 
        $open   = fopen( $file, "a" ); 
        $data   = "---------"  . PHP_EOL;
        $data   .= "time: " . wp_date( 'j-M-Y H:i:s' ) . PHP_EOL;
        $data   .= "label: " . $this->label . PHP_EOL;
        $data   .= "type: " . $this->type . PHP_EOL;
        $data   .= "value: " . $this->data . PHP_EOL;
        $write   = fwrite( $open, $data );  
        fclose( $open );
    }

    private function get_array($array){
        $data = "";
        // $this->indent .= "  ";
        foreach( $array as $key => $val ){
            $type = gettype($val);
            if (is_array($val)) {
                $this->indent .= "";
                $val = PHP_EOL . $this->get_array( $val );
            };
            $data .= $this->indent . $key . ' -> (' . $type . ') ' . $val . PHP_EOL;
        };
        return $data;
    }

}