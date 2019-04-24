<?php

class zaislas
{

    public function getToy($id)
    {
        $id = mysql::escape($id);
        $query = "SELECT * FROM zaislas WHERE id = '{$id}'";
        return mysql::select($query);
    }

    public function getAllToys()
    {
        $query = "SELECT * FROM zaislas";
        return mysql::select($query);
    }

    public function getToys($limit = NULL, $offset = NULL)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM zaislas ORDER BY id DESC {$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function getToysCount()
    {
        $query = "SELECT COUNT(id) FROM zaislas";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(id)'];
    }

    public function delete($id)
    {
        $query = "DELETE FROM zaislas WHERE id = '{$id}'";
        return mysql::query($query);
    }

    public function insertToy($toy)
    {
        $toy['pavadinimas'] = mysql::escape($toy['pavadinimas']);
        $toy['svoris'] = mysql::escape($toy['svoris']);
        $toy['verte'] = mysql::escape($toy['verte']);

        $query = "INSERT INTO zaislas(pavadinimas,svoris,verte) VALUES ('{$toy['pavadinimas']}',
                                                      '{$toy['svoris']}', '{$toy['verte']}')";
        return mysql::query($query);
    }

    public function updateToy($toy)
    {
        $toy['pavadinimas'] = mysql::escape($toy['pavadinimas']);
        $toy['svoris'] = mysql::escape($toy['svoris']);
        $toy['verte'] = mysql::escape($toy['verte']);
        $query = "UPDATE zaislas SET pavadinimas = '{$toy['pavadinimas']}', svoris = '{$toy['svoris']}',
                                                        verte = '{$toy['verte']}' WHERE id = '{$toy['id']}'";
        return mysql::query($query);
    }

}