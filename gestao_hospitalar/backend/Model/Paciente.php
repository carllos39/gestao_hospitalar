<?php
class Paciente{
    private ?int $id_paciente;
    private string $nome;
    private string $sobreNome;
    private string $dataDeNascimento;
    private int $genero;
    private DateTime $dataDeCadastro;

    public function __construct(?int $id_paciente,$nome,$sobreNome,$dataDeNascimento,$genero,$dataDeCadastro){

     $this->id_paciente =  $id_paciente;
     $this->nome =  $nome;
     $this->sobreNome = $sobreNome;
     $this->dataDeNascimento = $dataDeNascimento;
     $this->genero = $genero;
     $this->dataDeCadastro =$dataDeCadastro;
    }
     public function getId_paciente(){
        return $this->id_paciente;
     }
     public function setId_paciente(int $id_paciente){
     $this->id_paciente = $id_paciente;
     }

        public function getNome(){
        return $this->nome;
     }
     public function setNome(string $nome){
     $this->nome = $nome;
     }

        public function getSobreNome(){
        return $this->sobreNome;
     }
     public function setSobreNome(string $sobreNome){
     $this->sobreNome = $sobreNome;
     }

    public function getDataDeNascimento(){
        return $this->dataDeNascimento;
     }
     public function setDataDeNascimento(string $dataDeNascimento){
     $this->dataDeNascimento = $dataDeNascimento;
     }

        public function getGenero(){
        return $this->genero;
     }
     public function setGenero(string $genero){
     $this->genero = $genero;
     }

    public function getDataDeCadastro(){
        return $this->dataDeCadastro;
     }
     public function setDataDeCadastro(DateTime $dataDeCadastro){
     $this->dataDeCadastro = $dataDeCadastro;
     }
    }



?>