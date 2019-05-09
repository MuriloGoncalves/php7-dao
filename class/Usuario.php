<?php

class Usuario{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
    
    // Get e set idusuario
    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($value){
        
        $this->idusuario = $value;
    }
    
    // Get e set Deslogin
    public function getDeslogin(){
        return $this->deslogin;
    }
    
    public function setDeslogin($value){
        $this->deslogin = $value;
    }
    
    // Get e set dessenha
    public function getDessenha(){
        return $this->dessenha;
    }
    public function setDessenha($value){
        $this->dessenha = $value;
    }
    
    // Get e set dtcadastro
    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }
    
    public function loadById($id){
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
            
        ));
        
        if(count($results) > 0){
           
            $row = $results[0];
            
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new Datetime($row['dtcadastro']));
      
        }
        
    }
    
    public static function getList(){
        
        $sql = new Sql();
        
       return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
        
    }
    
    public static function search($login){
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
        
            ":SEARCH"=>"%".$login."%"
        ));
    }
    
    public function login($login, $senha ){
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(
            ":LOGIN"=>$login,
            ":SENHA"=>$senha
            
        ));
        
        if(count($results) > 0){
           
            $row = $results[0];
            
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new Datetime($row['dtcadastro']));
      
        }else{
            throw new Exception("Login e/ou senha Invalidos");
            
        }
    }
    
    public function __toString(){
        
        return json_encode(array(
        
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
            
        ));
    }
    
}

?>