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

    public function all()
    {
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

}