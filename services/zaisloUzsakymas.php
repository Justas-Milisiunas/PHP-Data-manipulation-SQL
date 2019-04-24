<?php


class zaisloUzsakymas
{
    public function insertOrder($order)
    {
        var_dump($order);
        $query = "INSERT INTO zaislo_uzsakymas(Kiekis, fk_UZSAKYMASnr, fk_ZAISLASid) VALUES('{$order['Kiekis']}',
                                            '{$order['fk_UZSAKYMASnr']}', '{$order['fk_ZAISLASid']}')";
        return mysql::query($query);
    }

    public function deleteOrdersWhereID($id)
    {
        $query = "DELETE FROM zaislo_uzsakymas WHERE fk_UZSAKYMASnr = '{$id}'";
        return mysql::query($query);
    }

    public function getOrdersWhereID($id)
    {
        $query = "SELECT * FROM zaislo_uzsakymas WHERE fk_UZSAKYMASnr = '{$id}'";
        return mysql::select($query);
    }
}