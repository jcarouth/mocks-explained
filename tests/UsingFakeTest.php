<?php
class UsingFakeTest extends \PHPUnit_Framework_TestCase
{
    public function testUsingAFakeDataSourceStillBehavesLikeARealOne()
    {
        $consumer = new ComplicatedDataStoreConsumer(
            new FakeComplicatedDataStore()
        );

        $record = array('name' => 'testuser');

        $id = $consumer->createRecord($record);

        $this->assertTrue($consumer->changeRecord($id, 'name', 'tester'));
    }
}
