<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InventoryManagementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function imageManagement()
    {
        $this->withoutExceptionHandling();

        $user = User::first();

        // dd (glob(public_path('img/bikini') . '/*'));

        $bikinis = glob(public_path('img/bikini') . '/*');
        $cover_ups = glob(public_path('img/cover_up') . '/*');
        $entero = glob(public_path('img/entero') . '/*');
        $product = glob(public_path('img/product') . '/*');

        $allPhotos = array_merge_recursive($bikinis, $cover_ups, $entero, $product);

        foreach ($allPhotos as $photo) {
            echo basename($photo) . '  ';
        }
        // dd ($allPhotos);


        $response = $this->actingAs($user)
            ->get(route('product.gallery'));
        $response->assertStatus(200);
        $response->assertViewIs('inventory.gallery');

    }
}
