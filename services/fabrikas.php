<?php


class fabrikas
{
    public function getAllFactories()
    {
        $query = "SELECT * FROM fabrikas";
        return mysql::select($query);
    }

    public function getFactory($id)
    {
        $query = "SELECT * FROM fabrikas WHERE id_FABRIKAS = '{$id}'";
        return mysql::select($query);
    }
}