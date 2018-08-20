<?php

class M_Logger {

    private $data;
    private $label;

    public function __construct( $data = 'no data', $label = 'no label' ) {
        
        $this->data = $data;
        $this->label = $label;
        
        $datatype   = gettype( $this->data );

        if ( 'object' == $datatype  || 'array' == $datatype  ){
            $this->m_logger_obj_handler();
        } else {
            $this->m_logger_string_handler();
        };
    }

    private function m_logger_obj_handler(){
        $file   = M_LOGGER_PATH . 'log.txt'; 
        $open   = fopen( $file, "a" ); 
        $write = fwrite( $open, $this->label . ': ' . PHP_EOL );     
        foreach( $this->data as $key => $val ){
            $write = fwrite( $open, $key . ' -> ' . $val . PHP_EOL );     
        };
        fclose( $open );
    }

    private function m_logger_string_handler(){
        $file   = M_LOGGER_PATH . 'log.txt'; 
        $open   = fopen( $file, "a" ); 
        $write  = fwrite( $open, $this->label . ': ' . $this->data . PHP_EOL );  
        fclose( $open );
    }

}