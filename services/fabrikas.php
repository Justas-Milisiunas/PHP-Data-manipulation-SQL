<?php


class fabrikas
{
    public function getAllFactories()
    {
        $query = "SELECT * FROM fabrikas";
        return mysql::select($query);
    }
}