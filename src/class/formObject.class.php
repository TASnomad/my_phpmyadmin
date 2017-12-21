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
           $str .= "    <form action='$this->co_link' method='$this->method'>\n";
           foreach ($this->field as $field){
               $str .= $this->getFieldAndLabel($field);
           }
           $str  .= "    <div class='row'> \n
                            <div class='col m4 s2'></div>\n
                                <button class='col m4 s8 btn waves-effect waves-light cyan darken-1' type='submit' name='action'>Submit\n
                                    <i class='material-icons right'>send</i>\n
                                </button>\n
                            <div class='col m4 s2'></div>\n
                        </div>\n";
           $str .= "    </form>\n
                        </div>\n
                        <div class='col s1'></div>\n
                      </div>";
        }
        else
            $str = "Error while doing toString";
        return $str;
    }

    public function getFieldAndLabel($field){
      $res = "";
      $name = "";
      $type = "";
      $err = "";
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
      if (isset($field['error']) && $field['error'] != ""){
        $err = $this->getErrorField($field['error']);
      }
      if ($res == ""){
        $res = $err;
        $res .= "<div class='row'> \n
                  <div class='col m4 s1'></div>\n
                  <div class='input-field col m4 s10'> \n";
        if (preg_match("/^password$|^text$|^email$/", $field['type'])){
            $res .= "   <input name='$name' id='$name' type = '$type'" . $this->getExtras() . " class='validate'></input>\n";
        }
        else if(preg_match("/^textarea/", $field['type'])){
            if (isset($field['placeholder']))
                $plh = $field['placeholder'];
            else
                $plh = "";
            $res .=  "<textarea name='$name' class='materialize-textarea' placeholder='$plh'></textarea>";
        }
        $res .= "   <label for='$name'>$name :</label>\n";
        $res .= " </div>\n
                  <div class='col m4 s1'></div>\n
                  </div>\n";
      }
      return $res;
    }

    public function getErrorInput()
    {
      return "<div class='row'><div class='col m4 s1'></div>\n<div class='card-panel col m4 s10 red darken-3'><span class='grey-text text-lighten-5'>Erreur dans la création du formulaire !!</span></div>\n<div class='col m4 s1'></div>\n</div>\n";
    }

    public function getErrorField($txt){
      return "<div class='row'>\n<div class='col m4 s1'></div>\n<div class='card-panel col m4 s10 red darken-3'><span class='grey-text text-lighten-5'>$txt</span></div>\n<div class='col m4 s1'></div>\n</div>\n";
    }

    public function getExtras(){
      return "";
    }
}
