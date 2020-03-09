<?php

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function empty_instatiated_collection_returns_no_items()
    {
        $collection = new \App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new \App\Support\Collection([
            'One', 'Two', 'Three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new \App\Support\Collection([
            'One', 'Two', 'Three', 'Four'
        ]);

        $this->assertCount(4, $collection->get());
        $this->assertEquals('One', $collection->get()[0]);
        $this->assertEquals('Two', $collection->get()[1]);
        $this->assertEquals('Three', $collection->get()[2]);
        $this->assertEquals('Four', $collection->get()[3]);
    }

    /** @test */
    public function collection_is_istance_of_iterator_aggregate()
    {
        $collection = new \App\Support\Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new \App\Support\Collection([
            'One', 'Two', 'Three'
        ]);
        $items = [];
        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new \App\Support\Collection([
            'One', 'Two'
        ]);
        $collection2 = new \App\Support\Collection([
            'Three', 'Four', 'Five'
        ]);
        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }

    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new \App\Support\Collection([
            'One', 'Two'
        ]);
        $collection->add(['Three', 'Four']);

        $this->assertCount(4, $collection->get());
        $this->assertEquals(4, $collection->count());
    }

    /** @test */
    public function return_json_encoded_items()
    {
        $collection = new \App\Support\Collection([
            ['username' => 'Ali'],
            ['username' => 'Kamal'],
        ]);

        $this->assertIsString('string', $collection->toJson());
        $this->assertEquals('[{"username":"Ali"},{"username":"Kamal"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new \App\Support\Collection([
            ['username' => 'Ali'],
            ['username' => 'Kamal'],
        ]);

        $this->assertEquals('[{"username":"Ali"},{"username":"Kamal"}]', json_encode($collection));
    }
}
