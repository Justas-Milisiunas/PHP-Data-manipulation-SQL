<?php


class mokejimas
{
    public function insertPayment($mokejimas)
    {
        $query = "INSERT INTO mokejimas(data, suma, fk_SASKAITAnr, fk_KLIENTASasmens_kodas) 
                    VALUES('{$mokejimas['data']}', '{$mokejimas['suma']}', '{$mokejimas['fk_SASKAITAnr']}',
                           '{$mokejimas['fk_KLIENTASasmens_kodas']}')";

        return mysql::query($query);
    }

}