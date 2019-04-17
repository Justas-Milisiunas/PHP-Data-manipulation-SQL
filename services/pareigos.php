<?php


class pareigos
{
    public function getAllDuties()
    {
        $query = "SELECT * FROM darbuotojo_pareigos";
        return mysql::select($query);
    }

}