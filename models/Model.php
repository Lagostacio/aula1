<?php

class Model {
    
    // Não é a forma mais indicada de armazenar usuário e senha
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'sistematwig';
    private $port = '3306';
    private  $user = 'root';
    private $password = null;
    protected $table;
    protected $conex;
    
    public function __construct(){
        // Descobre o nome da tabela
        $tbl = strtolower(get_class($this));
        $tbl .= 's';
        $this->table = $tbl;
        
        //conecta no banco
        $this->conex = new PDO("{$this->driver}:host={$this->host};port={$this->port};
        dbname={$this->dbname}",$this->user,$this->password);
    }
    public function getAll($where = false, $where_glue = 'AND'){

        if($where){
            $where_sql = $this->where_fields($where, $where_glue);

            $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE {$where_sql}");
            //var_dump($sql);var_dump($where);die;
            $sql->execute($where);

        }else{

            $sql = $this->conex->query("SELECT * FROM {$this->table}");
            
        } 
        return $sql->fetchall(PDO::FETCH_ASSOC);
    }
    public function getById($id){
        
        $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);

    }
     public function create($data)
    {
        //Inicia a construção do SQL
        $sql = "INSERT INTO {$this->table}";

        $sql_fields = $this->sql_fields($data);
        
        //Monta a consulta
        $sql .= " SET {$sql_fields}";

        //Preapra a conexão com o banco
        $insert = $this->conex->prepare($sql);

        // //Fazer os binds nos valores
        // foreach ($data as $field => $value) {
        //     $insert->bindValue(":{$field}", $value);
        // }

        //Roda a consulta
        $insert->execute($data);

        return $insert->errorInfo();
        die;

    }

    public function update($data, $id){
        
        // Remove íncide 'id' do $data
        unset($data['id']);

        $sql = "UPDATE {$this->table}";
        $sql.= ' SET ' . $this->sql_fields($data);
        $sql.= ' WHERE id = :id';
        
        $data['id'] = $id;

        $upd = $this->conex->prepare($sql);
        $upd->execute($data);

        //$error = $upd->errorInfo();
        // var_dump($error);die;
    }

    private function map_fields($data){
        //Prepara os campos e placeholders
        foreach (array_keys($data) as $field) {
            $sql_fields[] = "{$field} = :{$field}";
        }
        return $sql_fields;

    }

    private function sql_fields($data){

        $sql_fields = $this->map_fields($data);

        return implode(', ', $sql_fields);

    }

    private function where_fields($data,$glue = 'AND'){
        $glue = $glue == 'OR' ? ' OR ' : ' AND ';
        $fields = $this->map_fields($data);
        return implode($glue, $fields);
    }

}
