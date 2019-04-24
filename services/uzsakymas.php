<?php


class uzsakymas
{
    public function getOrdersCount()
    {
        $query = "SELECT COUNT(nr) FROM uzsakymas";
        $result = mysql::query($query);
        $data = mysqli_fetch_assoc($result);

        return $data['COUNT(nr)'];
    }

    public function getOrders($limit = NULL, $offset = NULL)
    {
        $limitOffsetString = "";
        if (isset($limit)) {
            $limitOffsetString .= " LIMIT {$limit}";

            if (isset($offset)) {
                $limitOffsetString .= " OFFSET {$offset}";
            }
        }

        $query = "SELECT * FROM uzsakymas ORDER BY uzsakymo_data DESC {$limitOffsetString}";
        $data = mysql::select($query);

        return $data;
    }

    public function deleteOrder($id)
    {
        $query = "DELETE FROM uzsakymas WHERE nr = '{$id}'";
        return mysql::query($query);
    }

    public function getAllStatuses()
    {
        $query = "SELECT * FROM uzsakymo_busenos";
        return mysql::select($query);
    }

    public function getNextID()
    {
        $query = "SELECT AUTO_INCREMENT
                    FROM  INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = 'zaislai'
                    AND   TABLE_NAME   = 'uzsakymas'";
        return mysql::select($query)[0]['AUTO_INCREMENT'];
    }

    public function insertOrder($order)
    {
        $query = "INSERT INTO uzsakymas(uzsakymo_data, busena, fk_FABRIKASid_FABRIKAS, fk_PARDUOTUVEnr)
                    VALUES('{$order['uzsakymo_data']}', '{$order['busena']}', '{$order['fk_FABRIKASid_FABRIKAS']}',
                           '{$order['fk_PARDUOTUVEnr']}')";

        return mysql::query($query);
    }

    public function getOrder($id)
    {
        $query = "SELECT * FROM uzsakymas WHERE nr = '{$id}'";
        return mysql::select($query);
    }

    public function updateOrder($order)
    {
        $query = "UPDATE uzsakymas SET busena = '{$order['busena']}', fk_FABRIKASid_FABRIKAS = '{$order['fk_FABRIKASid_FABRIKAS']}',
                                        fk_PARDUOTUVEnr = '{$order['fk_PARDUOTUVEnr']}' WHERE nr = '{$order['nr']}'";
        return mysql::query($query);
    }

}