<?php


class saskaita
{
    public function getAccountsCount()
    {
        $query = "SELECT COUNT(nr) FROM saskaita";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(nr)'];
    }

    public function getAccount($id)
    {
        $query = "SELECT * FROM saskaita WHERE nr = '{$id}'";
        return mysql::select($query);
    }

    public function getAccounts($limit = NULL, $offset = NULL)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "SELECT * FROM saskaita ORDER BY nr DESC{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function insertAccount($saskaita)
    {
        $saskaita['suma'] = mysql::escape($saskaita['suma']);
        $saskaita['fk_DARBUOTOJASasmens_kodas'] = mysql::escape($saskaita['fk_DARBUOTOJASasmens_kodas']);
        $saskaita['fk_KLIENTASasmens_kodas'] = mysql::escape($saskaita['fk_KLIENTASasmens_kodas']);

        $query = "INSERT INTO saskaita(data, suma, fk_DARBUOTOJASasmens_kodas, fk_KLIENTASasmens_kodas)
                    VALUES('{$saskaita['data']}', '{$saskaita['suma']}', '{$saskaita['fk_DARBUOTOJASasmens_kodas']}',
                           '{$saskaita['fk_KLIENTASasmens_kodas']}')";
        return mysql::query($query);
    }

    public function updateAccount($account)
    {
        $query = "UPDATE saskaita SET suma = '{$account['suma']}', fk_DARBUOTOJASasmens_kodas = '{$account['fk_DARBUOTOJASasmens_kodas']}',
                                    fk_KLIENTASasmens_kodas = '{$account['fk_KLIENTASasmens_kodas']}' WHERE nr = '{$account['nr']}'";
        return mysql::query($query);
    }

    public function getNextID()
    {

        $query = "SELECT AUTO_INCREMENT
                    FROM  INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = 'zaislai'
                    AND   TABLE_NAME   = 'saskaita'";
        return mysql::select($query)[0]['AUTO_INCREMENT'];
    }

    public function deleteAccount($id)
    {
        $query = "DELETE FROM saskaita WHERE nr = '{$id}'";
        return mysql::query($query);
    }

}