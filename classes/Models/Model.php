<?php
/**
 * Created by PhpStorm.
 * User: Lala
 * Date: 2018. 03. 09.
 * Time: 10:09
 */

namespace Models;

use MysqliDb;

class Model
{
    /**
     * @var MysqliDb
     */
    protected $db = null;
    protected $table;

    public function __construct()
    {
        $this->setConnection();
    }

    private function setConnection()
    {
        if ($this->db) return $this->db;

        $this->db = new MysqliDb ([
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db'=> 'slim',
            'port' => 3306,
            'prefix' => '',
            'charset' => 'utf8'
        ]);

        return $this->db;
    }

    public function all($limit = null,$offset = null)
    {
        if ($limit !== null and $offset !== null) {
            return $this->db->get($this->table,[$offset,$limit]);
        }

        return $this->db->get($this->table);
    }

    public function first()
    {
        return $this->db->getOne($this->table);
    }

    public function where($column,$value,$rel = "=")
    {
        $this->db->where($column,$value,$rel);

        return $this;
    }

    public function join($table, $on, $type)
    {
        $this->db->join($table,$on,$type);
        return $this;
    }

    public function orderBy($column,$dir = 'asc')
    {
        $this->db->orderBy($column,$dir);
        return $this;
    }

    public function groupBy($column)
    {
        $this->db->groupBy($column);
        return $this;
    }

    public function query($sql,array $params)
    {
        return $this->db->rawQuery($sql, $params);
    }

    public function queryOne($sql,array $params)
    {
        return $this->db->rawQueryOne($sql, $params);
    }

}