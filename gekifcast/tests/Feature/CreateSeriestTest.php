<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSeriestTest extends TestCase
{
    use RefreshDatabase;


    public function test_a_user_can_create_a_series()
    {
        $this->withoutExceptionHandling();

        Storage::fake(config('filesystems.default'));

        $this->post('/admin/series', [
            'title' => 'vue js for the best',
            'description' => 'the best vue casts ever',
            'image' => UploadedFile::fake()->image('image-series.png'),
        ])->assertRedirect()
            ->assertSessionHas('success', 'Series Created Successfully');

        Storage::disk(config('filesystems.default'))
            ->assertExists('series/' . str_slug('vue js for the best') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => str_slug('vue js for the best'),
        ]);
    }


    public function test_a_series_must_be_created_with_a_title()
    {
        $this->post('/admin/series', [
            'description' => 'the best vue casts ever',
            'image' => UploadedFile::fake()->image('image-series.png'),
        ])->assertSessionHasErrors('title');
    }


    public function test_a_series_must_be_created_with_a_description()
    {
        $this->post('/admin/series', [
            'title' => 'vue js for the best',
            'image' => UploadedFile::fake()->image('image-series.png'),
        ])->assertSessionHasErrors('description');
    }


    public function test_a_series_must_be_created_with_an_image()
    {
        $this->post('/admin/series', [
            'title' => 'vue js for the best',
            'description' => 'the best vue casts ever',
        ])->assertSessionHasErrors('image');
    }


    public function test_a_series_must_be_created_with_an_image_which_image()
    {
        $this->post('/admin/series', [
            'title' => 'vue js for the best',
            'description' => 'the best vue casts ever',
            'image' => 'STRING_INVALID',
        ])->assertSessionHasErrors('image');
    }

}
