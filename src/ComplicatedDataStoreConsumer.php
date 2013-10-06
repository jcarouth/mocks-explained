<?php
class ComplicatedDataStoreConsumer
{
    public function __construct(ComplicatedDataStore $source)
    {
        $this->source = $source;
    }

    public function createRecord($data)
    {
        //do some validation
        return $this->source->save($data);
    }

    public function retrieveRecord($id)
    {
        return $this->source->fetch($id);
    }

    public function changeRecord($id, $param, $newValue)
    {
        $record = $this->source->fetch($id);
        if (null === $record) {
            return false;
        }

        if (!array_key_exists($param, $record)) {
            return false;
        }

        return $this->source->save($record) !== false;
    }
}
