<?php


class employees
{
    /**
     * Returns employee by given id
     * @param $id employee id
     * @return bool result
     */
    public function getEmployee($id)
    {
        $query = `SELECT * FROM darbuotojas WHERE asmens_kodas = {$id}`;
        return mysql::select($query);
    }

    /**
     * Retuns all employees
     * @return bool result
     */
    public function getEmployees()
    {
        $query = "SELECT * FROM darbuotojas";
        return mysql::select($query);
    }

}