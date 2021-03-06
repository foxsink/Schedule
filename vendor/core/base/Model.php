<?php


namespace vendor\core\base;


use vendor\core\DB;

class Model
{
    protected $pdo;
    protected $table;
    protected $pk = 'page_id';

    public function __construct()
    {
        $this->pdo = DB::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }
    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }
    public function findBySQL($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }
    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM {$table} WHERE {$field} LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }
    public function insertInto($arrKeys, $arrValues, $table = '')
    {
        $table = $table ?: $this->table;
        $arrKeys = implode(", ", $arrKeys);
        $prepare = '';
        for ($i = 0; $i < count($arrValues); $i++)
        {
            if($i === 0)
                $prepare .= "?";
            else
                $prepare .= ", ?";
        }
        $arrValues = array_values($arrValues);
        $this->pdo->execute("INSERT INTO {$table} ({$arrKeys}) VALUES ({$prepare})", $arrValues);
    }
}