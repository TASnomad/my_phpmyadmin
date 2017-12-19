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
           $str .= "<div class='row'>\n
                      <div class='col s1'></div>\n
                      <div class='col s10'>\n
                        <h4 class='center'> Formulaire : $this->name </h4>\n";
           $str .= "    <form action='$this->co_link' method='$this->method>\n";
           foreach ($this->field as $field){
               var_dump($field);
           }
           $str .= "    </div>\n
                        <div class='col s1'></div>\n
                      </form>\n";
        }
        else
            $str = "Error while doing toString";
        return $str;
    }
}
