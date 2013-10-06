<?php
class FakeComplicatedDataStore extends ComplicatedDataStore
{
    protected $rows;

    public function __construct()
    {
        $this->rows = array();
    }

    public function fetch($id)
    {
        $id--; //decrement to map to array index
        if (isset($this->rows[$id])) {
            return $this->rows[$id];
        }

        return null;
    }

    public function save($row)
    {
        if (!isset($row['id']) || $row['id'] == null) {
            $row['id'] = count($this->rows) + 1;
        }

        $this->rows[$row['id'] - 1] = $row;
        return $row['id'];
    }
}
