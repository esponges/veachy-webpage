<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class crudTest extends TestCase
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
    public function productCanBeCreated()
    {
        // $this->withoutExceptionHandling();
        // $this->withoutMiddleware();

        // $prod = Product::find(1);
        $user = User::first();

        $product = new Product;
        $product->name = 'test';
        $product->description = 'description';
        $product->price = '10';
        $product->disponibilidad = '1';
        $product->type = '1';
        $product->total_fotos = '2';
        $product->parent_id = null;
        $product->size = 1;
        $product->color = 'rojito';

        // $response = $this
        //     ->actingAs($user)
        //     ->withSession(['foo' => 'bar'])
        //     ->post(route('product.store'));
        // $response->assertStatus(200);

        /** uploading one file only */
        $file = UploadedFile::fake()->image('ava.jpg');
        dd($file);
        if (!is_array($file)) {
            $file->move(public_path() . '\img', $product->name . '.jpg');
        }

        /* uploading several files */
        $files = [
            UploadedFile::fake()->image('avatar.jpg'),
            UploadedFile::fake()->image('avatar2.jpg'),
            UploadedFile::fake()->image('avatar3.jpg'),
        ];
        if (is_array($files)) {
            $i = 1;
            foreach ($files as $file) {
                $file->move(public_path() . '\img', $product->name . $i . '.jpg');
                $i++;
            }
        }

        // dd (Storage::disk(public_path()));

        // Storage::disk('public')->assertExists('public');
        // Storage::putFileAs('img', $file, $product->name . '.jpg');
        // Storage::move('img', public_path() . '\img');
        // Storage::move($product->name . '.jpg', 'public/im' . $product->name . '.jpg');
        // $product->save();

        // $response->assertRedirect('/inventory');
    }

    /** @test */
    public function assertUploadImage()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->json('POST', '/avatar', [
            'avatar' => $file,
        ]);

        // Assert the file was stored...
        Storage::disk('avatars')->assertExists(public_path() . '\img');

        // Assert a file does not exist...
        Storage::disk('avatars')->assertMissing('missing.jpg');
    }
}
