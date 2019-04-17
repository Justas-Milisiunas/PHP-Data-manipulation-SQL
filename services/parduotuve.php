<?php


class parduotuve
{
    public function insertShop($shop)
    {

        $query = "INSERT INTO parduotuve(pavadinimas,adresas,telefonas,e_pastas,
                       dirba_nuo, pasto_kodas, darbuotoju_skaicius, fk_MIESTASid_MIESTAS) VALUES('{$shop['pavadinimas']}',
                            '{$shop['adresas']}', '{$shop['telefonas']}', '{$shop['e_pastas']})',
                            '{$shop['dirba_nuo']}', '{$shop['pasto_kodas']}', '{$shop['darbuotoju_skaicius']}', '{$shop['fk_MIESTASid_MIESTAS']}')";
        return mysql::query($query);
    }

    public function deleteShop($id)
    {
        $id == mysql::escape($id);
        $query = "DELETE FROM parduotuve WHERE nr = '{$id}'";

        return mysql::query($query);
    }

    public function getShopsCount()
    {
        $query = "SELECT COUNT(nr) FROM parduotuve";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(nr)'];
    }

    public function getShops($limit = NULL, $offset = NULL)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM parduotuve ORDER BY nr DESC {$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function updateShop($shop)
    {
        $query = "UPDATE parduotuve SET pavadinimas = '{$shop['pavadinimas']}', adresas = '{$shop['adresas']}',
                      telefonas = '{$shop['telefonas']}', e_pastas = '{$shop['e_pastas']}', dirba_nuo = '{$shop['dirba_nuo']}',
                      pasto_kodas = '{$shop['pasto_kodas']}', darbuotoju_skaicius = '{$shop['darbuotoju_skaicius']}',
                      fk_MIESTASid_MIESTAS = '{$shop['fk_MIESTASid_MIESTAS']}' WHERE nr = '{$shop['nr']}'";
        return mysql::query($query);
    }

    public function getShop($id)
    {
        $query = "SELECT * FROM parduotuve WHERE nr = '{$id}'";
        return mysql::select($query);
    }

    public function getAllShops()
    {
        $query = "SELECT nr, pavadinimas FROM parduotuve";
        return mysql::select($query);
    }
}