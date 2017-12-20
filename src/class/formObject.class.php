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
           $str  .= "    <div class='row'> \n
                            <div class='col s4'></div>\n
                                <button class='col s4 btn waves-effect waves-light cyan darken-1' type='submit' name='action'>Submit\n
                                    <i class='material-icons right'>send</i>\n
                                </button>\n
                            <div class='col s4'></div>\n
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
                  <div class='col s4'></div>\n
                  <div class='input-field col s4'> \n";
        if (preg_match("/^password$|^text$|^email$/", $field['type'])){
            $res .= "   <input name='$name' id='$name' type = '$type'" . $this->getExtras() . " class='validate'>\n";
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
                  <div class='col s4'></div>\n
                  </div>\n";
      }
      return $res;
    }

    public function getErrorInput()
    {
      return "<div class='card-panel><span class='red-text text-darken-3'>Erreur dans la création du formulaire !!</span></div>";
    }

    public function getExtras(){
      return "";
    }
}
