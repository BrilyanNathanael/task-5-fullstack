<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_insert_category()
    {
        $response = $this->call('POST', '/category', [
            'name' => 'Category1',
            'user_id' => 2
        ]);
        dd($response);
        // $this->assertTrue(true);
    }
}
