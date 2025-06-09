<?php
require_once '../backend/Conexao.php';
require_once '../backend/Model/Paciente.php';

class PacienteDAO
{
    private $bd;

    public function __construct()
    {

        $this->bd = Conexao::getInstance();
    }
    public function getAll()
    {

        $sql = "SELECT * FROM pacientes";
        $pacientes = [];
        $stmt = $this->bd->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pacientes[] = new Paciente(
                $row['id_paciente'],
                $row['nome'],
                $row['sobreNome'],
                $row['dataDeNascimento'],
                $row['id_genero'],
                $row['dataDeCadstro']
            );
        }
        return $pacientes;
    }
    public function getById($id): ?Paciente
    {

        $sql = "SELECT * FROM pacientes WHERE id=:id";
        $stmt = $this->bd->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? new Paciente(
            $row['id_paciente'],
            $row['nome'],
            $row['sobreNome'],
            $row['dataDeNascimento'],
            $row['id_genero'],
            $row['dataDeCadstro']
        ) : null;
    }
    public function create(Paciente $pacientes)
    {
        $sql = "INSERT INTO pacientes(nome,sobreNome,dataDeNascimento,id_genero,dataDeCadatro)
            VALUES(:nome,:sobreNome,:dataDeNascimento,:id_genero,:dataDeCadatro)";
        $stmt = $this->bd->prepare($sql);
        $stmt->execute([
            ':nome' => $pacientes->getNome(),
            ':sobreNome' => $pacientes->getSobreNome(),
            ':dataDeNascimento' => $pacientes->getDataDeNascimento(),
            ':id_genero' => $pacientes->getGenero(),
            ':dataDeCadastro' => $pacientes->getDataDeCadastro()
        ]);
    }
    public function update(Paciente $pacientes)
    {
        $sql = "UPDATE pacientes SET nome=:NOME,sobreNome= :sobreNome,dataDeNascimento=:dataDeNascimento,id_genero=:id_genero,dataDeCadatro=:dataDeCadastro WHERE id=:id_paciente";

        $stmt = $this->bd->prepare($sql);
        $stmt->execute([
             ':id' => $pacientes->getId_paciente(),
            ':nome' => $pacientes->getNome(),
            ':sobreNome' => $pacientes->getSobreNome(),
            ':dataDeNascimento' => $pacientes->getDataDeNascimento(),
            ':id_genero' => $pacientes->getGenero(),
            ':dataDeCadastro' => $pacientes->getDataDeCadastro()
        ]);
    }
        public function excluir($id)
    {
        $sql = "DELETE FROM pacientes WHERE id=:id_paciente";

        $stmt = $this->bd->prepare($sql);
        $stmt->execute([   ':id' => $id]);
    }
}
