<?php


class darbuotojas
{
    public function getEmployeesCount()
    {
        $query = "SELECT COUNT(asmens_kodas) FROM darbuotojas";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(asmens_kodas)'];
    }

    public function getEmployees($limit = NULL, $offset = NULL)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "  SELECT *
					FROM darbuotojas{$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function insertEmployee($employee)
    {
        $employee['asmens_kodas'] = mysql::escape($employee['asmens_kodas']);
        $employee['vardas'] = mysql::escape($employee['vardas']);
        $employee['pavarde'] = mysql::escape($employee['pavarde']);
        $employee['dirba_nuo'] = mysql::escape($employee['dirba_nuo']);
        $employee['atlyginimas'] = mysql::escape($employee['atlyginimas']);
        $employee['adresas'] = mysql::escape($employee['adresas']);
        $employee['telefonas'] = mysql::escape($employee['telefonas']);
        $employee['elektroninis_pastas'] = mysql::escape($employee['elektroninis_pastas']);
        $employee['pareigos'] = mysql::escape($employee['pareigos']);
        $employee['fk_PARDUOTUVEnr'] = mysql::escape($employee['fk_PARDUOTUVEnr']);

        $query = "INSERT INTO darbuotojas VALUES('{$employee['asmens_kodas']}', '{$employee['vardas']}', '{$employee['pavarde']}',
                               '{$employee['dirba_nuo']}', '{$employee['atlyginimas']}', '{$employee['adresas']}', '{$employee['telefonas']}',
                               '{$employee['elektroninis_pastas']}', '{$employee['pareigos']}', '{$employee['fk_PARDUOTUVEnr']}')";
        return mysql::query($query);
    }

    public function deleteEmployee($id)
    {
        $query = "DELETE FROM darbuotojas WHERE asmens_kodas = '{$id}'";
        return mysql::query($query);
    }

    public function getEmployee($id)
    {
        $id = mysql::escape($id);
        $query = "SELECT * FROM darbuotojas WHERE asmens_kodas = '{$id}'";
        return mysql::select($query);
    }

    public function updateEmployee($employee)
    {
        $employee['asmens_kodas'] = mysql::escape($employee['asmens_kodas'][0]);
        $employee['vardas'] = mysql::escape($employee['vardas'][0]);
        $employee['pavarde'] = mysql::escape($employee['pavarde'][0]);
        $employee['dirba_nuo'] = mysql::escape($employee['dirba_nuo'][0]);
        $employee['atlyginimas'] = mysql::escape($employee['atlyginimas'][0]);
        $employee['adresas'] = mysql::escape($employee['adresas'][0]);
        $employee['telefonas'] = mysql::escape($employee['telefonas'][0]);
        $employee['elektroninis_pastas'] = mysql::escape($employee['elektroninis_pastas'][0]);
        $employee['pareigos'] = mysql::escape($employee['pareigos'][0]);
        $employee['fk_PARDUOTUVEnr'] = mysql::escape($employee['fk_PARDUOTUVEnr']);

//        var_dump($employee['fk_PARDUOTUVEnr']);
//        die();

        $query = "UPDATE darbuotojas SET vardas = '{$employee['vardas']}',
                       pavarde = '{$employee['pavarde']}', dirba_nuo = '{$employee['dirba_nuo']}', atlyginimas = '{$employee['atlyginimas']}',
                       adresas = '{$employee['adresas']}', telefonas = '{$employee['telefonas']}', elektroninis_pastas = '{$employee['elektroninis_pastas']}',
                       pareigos = '{$employee['pareigos']}', fk_PARDUOTUVEnr = '{$employee['fk_PARDUOTUVEnr']}' WHERE asmens_kodas = '{$employee['asmens_kodas']}'";
        return mysql::query($query);
    }
}