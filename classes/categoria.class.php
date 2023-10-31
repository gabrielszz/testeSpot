<?php

// Classe base com propriedades e métodos de membros
class Categoria {

    var $id;
    var $descricao;
    var $status;

    function Categoria($id = null, $descricao = null, $status = null)
    {
        $this->id = $id;
        $this->descricao = $descricao;
    }




    
    function getStatus()
    {
        return $this->status;
    }

    function getDescricao()
    {
        return $this->descricao;
    }

} 