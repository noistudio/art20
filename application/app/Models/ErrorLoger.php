<?php

namespace App\Models;

class ErrorLoger
{

    private $secretId=null;
    private $is_enable=null;
    private $url=null;
    private $exception=null;
    private $name_task;
    private $max_trace_count=5;
    private $fields;

     function __construct($max_trace_count=5){
        $this->secretId=config("api_error_sender.secretId");
        $this->is_enable=config('api_error_sender.is_enable');
        $this->url=config('api_error_sender.url');
        $this->name_task=config('api_error_sender.name_task');
        $this->max_trace_count=$max_trace_count;
        $this->fields=config('api_error_sender.fields');


    }
    public function send($e){
         if($this->is_enable==true){
             $this->exception=$e;
             $this->sendToSystem();
         }


    }

    private function getTrace(){

         $trace_array=array();
         $normal_trace=$this->exception->getTrace();

         if(count($normal_trace)>0){
             $i=0;
             foreach($normal_trace as $trace){

                 if(isset($trace['file']) and isset($trace['line']) and isset($trace['function'])){
                     $trace_array[]=array('file'=>$trace['file'],'line'=>$trace['line'],'function'=>$trace['function']);

                 }

                 $i++;
                 if($i==$this->max_trace_count){
                     break;
                 }
             }
         }
         return $trace_array;


    }
    private function getException(){
         $result=[
             "code"=>$this->exception->getCode(),
             'line'=>$this->exception->getLine(),
             'message'=>$this->exception->getMessage(),
             'file_name'=>pathinfo($this->exception->getFile(),PATHINFO_FILENAME),
             'file'=>$this->exception->getFile(),
             'trace'=> $this->getTrace(),];
         return $result;
    }

    public function getCustomFields(){

         $fields=$this->fields;
         if(isset($fields) and is_array($fields) and count($fields)>0){
             foreach($fields as $name=>$value){

                 $fields[$name]=$this->getNormalString($value);
             }
             return $fields;
         }

         return array();
    }
    private function getNameTask(){

         $name_task=$this->name_task;
         $name_task=$this->getNormalString($name_task);


         return $name_task;
    }
    private function getNormalString($string){
        $exception=$this->getException();
        foreach($exception as $key=>$val){
            if($key!="trace"){

                $string=str_replace("[".$key."]",$val,$string);
            }

        }
        return $string;
    }

    private function sendToSystem(){

         try{
             $json=[
                 'exception'=>$this->getException(),
                 'name_task'=>$this->getNameTask(),
                 'fields'=>$this->getCustomFields(),
             ];



             $url=$this->url."api/errorlog/".$this->secretId;
             $ch = curl_init( $url );
# Setup request to send json via POST.
             $payload = json_encode( $json );
             curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
             curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
             curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
             $result = curl_exec($ch);
             $array=json_decode($result,true);
             curl_close($ch);
         }catch(\Exception $e){

         }









    }


}
