<?php
namespace models;

class SearchModel {
    private $conexao;

    public function __construct() {
        // Sempre que instanciar um objeto dessa classe, a conexão com o banco de dados será feita
        $host = "localhost";
        $port = "5432";
        $dbname = "db_farmacia"; // nome do banco de dados
        $user = "postgres";     // nome do usuário do banco de dados
        $password = "postgres";  // senha do usuário do banco de dados

        $this->conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        if (!$this->conexao) {
            die("Não foi possível conectar o banco, segue o erro: " . pg_last_error()); // encerra a execução do script php e mostra o erro
        }
    }

    public function search($drug) {
        $drug = strtolower($drug); // converte a string para minúsculo
        $query = "SELECT * FROM name WHERE name LIKE $1"; // $1 é um placeholder para o parâmetro da função pg_query_params pois, por questões de segurança, não é recomendado concatenar diretamente na string da query
        $resultado = pg_query_params($this->conexao, $query, ["$drug%"]); // aqui há a conexao do bd 

        if (!$resultado) {
            die("Deu erro na consulta: " . pg_last_error($this->conexao));
        }

        if(pg_num_rows($resultado) == 0) {
            echo "<h4> Nenhum resultado encontrado. <h4>";
        } else{
            while ($linha = pg_fetch_assoc($resultado)) {
                echo "<h4>Nome: " . $linha['name'] . "<br><h4>";
            }
        }
        pg_close($this->conexao);
    }
}
?>
