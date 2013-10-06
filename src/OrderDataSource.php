<?php
class OrderDataSource
{
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function retrieve($id)
    {
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($order)
    {
        if (isset($order['id'])) {
            //update
        } else {
            //insert
        }
    }
}
