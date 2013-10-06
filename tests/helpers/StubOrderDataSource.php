<?php
class StubOrderDataSource extends OrderDataSource
{
    public function retrieve($id)
    {
        return array('id' => $id, 'total' => '47.99');
    }

    public function save($data)
    {
        if (!isset($data['id'])) {
            return true;
        } else {
            return $data['id'] % 2 !== 0;
        }
    }
}
