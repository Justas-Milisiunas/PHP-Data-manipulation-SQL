<?php


class miestas
{
//    public function getCities()
//    {
//        return mysql::select("SELECT * FROM 'miestas'");
//    }

    public function insertCity($city)
    {
        $query = "INSERT INTO miestas (pavadinimas) VALUES ('{$city['pavadinimas']}')";
//        var_dump($query);
        return mysql::query($query);
    }

    public function getShopCountOfCity($id)
    {
        $query = "SELECT COUNT(nr) FROM parduotuve WHERE fk_MIESTASid_MIESTAS = '{$id}'";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(nr)'];
    }

    public function deleteCity($id)
    {
        $query = "DELETE FROM miestas WHERE id_MIESTAS = '{$id}'";
        return mysql::query($query);
    }

    public function getCity($id)
    {
        $query = "SELECT * FROM miestas WHERE id_MIESTAS = '{$id}'";
        return mysql::select($query);
    }

    public function updateCity($city)
    {
        $query = "UPDATE miestas SET pavadinimas = '{$city['pavadinimas']}' WHERE id_MIESTAS = '{$city['id_MIESTAS']}'";
        return mysql::query($query);
    }

    public function getCitiesCount()
    {
        $query = "SELECT COUNT(id_MIESTAS) FROM miestas";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(id_MIESTAS)'];
    }

    public function getCities($limit = NULL, $offset = NULL)
    {
        $limitOffsetString = "";
        if(isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if(isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM miestas{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }
}