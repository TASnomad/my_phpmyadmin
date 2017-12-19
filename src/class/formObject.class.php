<?php

class formObject
{
    //titre du formulaire 
    private $name;
    
    //champs
    private $field = [];
    
    //lien du controller =
    private $co_link;
    
    //methode (POST par ex)
    private $method;
    
    public function __construct($name = "unknown", $field = NULL, $co_link = NULL, $method = "POST"){
        $this->name = $name;
        $this->field = $field;
        $this->co_link = $co_link;
        $this->method = $method;
    }
    
    public function toString(){
        $str = "";
        if(isset($this))
        {
           $str .= "<h4> Formulaire : $this->name </h4>\n";
           $str .= "    <form action='$this->co_link' method='$this->POST>\n";
           foreach ($this->field as $field){
               var_dump($field);
           }
           $str .= "    </form>\n";
        }
        else
            $str = "Error while doing toString";
        return $str;
    }
}

