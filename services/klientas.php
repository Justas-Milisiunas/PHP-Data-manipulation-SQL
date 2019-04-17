<?php


class klientas
{
    public function getClient($id)
    {
        $query = "SELECT * FROM klientas WHERE asmens_kodas = '{$id}'";
        return mysql::select($query)[0];
    }

    public function getAllClients()
    {
        $query = "SELECT * FROM klientas";
        return mysql::select($query);
    }
}