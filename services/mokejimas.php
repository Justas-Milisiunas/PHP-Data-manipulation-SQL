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

    public function deleteWhereAccountIs($id)
    {
        $query = "DELETE FROM mokejimas WHERE fk_SASKAITAnr = '{$id}'";
        return mysql::query($query);
    }

    public function getPaymentsWhereAccountIs($id)
    {
        $query = "SELECT * FROM mokejimas WHERE fk_SASKAITAnr = '{$id}'";
        $result = mysql::select($query);

        return $result;
    }
}