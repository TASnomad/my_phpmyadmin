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
               $str .= $this->getFieldAndLabel($field);
           }
           $str .= "    </div>\n
                        <div class='col s1'></div>\n
                      </form>\n";
        }
        else
            $str = "Error while doing toString";
        return $str;
    }

    public function getFieldAndLabel($field){
      $res = "";
      $name = "";
      $type = "";
      if (isset($field['name'])){
        $name = $field['name'];
      }
      else
        $res = $this->getErrorInput();
      if (isset($field['type'])){
        $type = $field['type'];
      }
      else
        $res = $this->getErrorInput();
      if (isset($field['type'])){
          $type = $field['type'];
      }
      else
        $res = $this->getErrorInput();
      if ($res == ""){
        $res = "<div class='row'> \n
                  <div class='col s3'></div>\n
                  <div class='input-field col s6'> \n";
        $res .= "   <input name='$name' id='$name' type = '$type'" . $this->getExtras() . " class='validate'>\n";
        $res .= "   <label for='$name'>$name :</label>\n";
        $res .= " <div class='col s3'></div>\n
                  </div>\n
                  </div>\n";
      }
      return $res;
    }

    public function getErrorInput()
    {
      return "<p class='red darken-3'>Erreur dans la création du formulaire !!</p>";
    }

    public function getExtras(){
      return "";
    }
}
