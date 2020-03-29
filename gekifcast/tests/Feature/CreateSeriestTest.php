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
        ])->assertRedirect();

        Storage::disk(config('filesystems.default'))
            ->assertExists('series/' . str_slug('vue js for the best') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => str_slug('vue js for the best'),
        ]);
    }

}
