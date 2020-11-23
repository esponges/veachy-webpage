<?php

namespace Tests\Feature;

use App\IgData;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function checkIfIndexGets()
    {
        $this->withExceptionHandling();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('index');

        $igData = IgData::get();
        $productTypes = Product::all();

        $response->assertViewHasAll([
            'igData' => $igData,
            'productTypes' => $productTypes
        ]);
    }

    /** @test */
    public function checkIfDestroys()
    {
        $this->withExceptionHandling();
        $this->withoutMiddleware();

        factory(Product::class, 1)->make();

        $item = Product::all();

        $response = $this->delete('/delete/' . $item->id);

        $this->assertCount(0, Product::all());

    }

    /** @test */
    public function checkIfShows()
    {
        $this->withExceptionHandling();

        factory(Product::class, 1)->make();

        $item = Product::all();

        $response = $this->get('/inventory/' . $item->id);

        $response->assertOk();
    }
}
