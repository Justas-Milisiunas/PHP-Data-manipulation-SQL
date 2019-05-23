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

    public function getStatusName($id)
    {
        $query = "SELECT uzsakymo_busenos.name FROM uzsakymo_busenos WHERE uzsakymo_busenos.id_uzsakymo_busenos = '{$id}'";
        return mysql::select($query)[0];
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

    public function getOrderToys($orderId)
    {
        $query = "
        SELECT 
            zaislas.pavadinimas as name,
            SUM(zaislo_uzsakymas.Kiekis) as kiekis,
            zaislas.verte as verte
        FROM
            zaislas
        INNER JOIN zaislo_uzsakymas ON zaislo_uzsakymas.fk_ZAISLASid = zaislas.id
        WHERE
            zaislo_uzsakymas.fk_UZSAKYMASnr = '{$orderId}'
        GROUP BY 
            name
        ORDER BY 
            kiekis
        ";

        return mysql::select($query);
    }

    public function getForReport($dateFrom, $dateUntil, $minToysCount, $maxToysCount, $status)
    {
        $query = "
        SELECT
            uzsakymas.nr as id,
            uzsakymas.uzsakymo_data as data,
            uzsakymo_busenos.name as busena,
            SUM(zaislo_uzsakymas.Kiekis) AS kiekis,
            fabrikas.pavadinimas as fabrikas
        FROM
            uzsakymas
        LEFT JOIN uzsakymo_busenos ON uzsakymas.busena = uzsakymo_busenos.id_uzsakymo_busenos
        LEFT JOIN fabrikas ON uzsakymas.fk_FABRIKASid_FABRIKAS = fabrikas.id_FABRIKAS
        LEFT JOIN zaislo_uzsakymas ON zaislo_uzsakymas.fk_UZSAKYMASnr = uzsakymas.nr
        WHERE
            uzsakymas.uzsakymo_data >= '{$dateFrom}' AND uzsakymas.uzsakymo_data <= '{$dateUntil}' AND uzsakymas.busena = '{$status}'
        GROUP BY
            uzsakymas.uzsakymo_data
        HAVING
            kiekis > '{$minToysCount}' AND kiekis < '{$maxToysCount}'
        ORDER BY
            uzsakymas.uzsakymo_data ASC
        ";

        return mysql::select($query);
    }

}