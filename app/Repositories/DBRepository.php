<?php
namespace App\Repositories;
use DB;
class DBRepository {
    public function __construct(private string $tableName)
    {}
    public function table()
    {
        return DB::table($this->tableName);
    }
    public function find($id)
    {
        return $this->table()->find($id);
    }
    
}