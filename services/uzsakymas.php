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

        $query = "SELECT * FROM uzsakymas{$limitOffsetString}";
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

}