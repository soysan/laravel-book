<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class testFileUpload extends TestCase
{
    /**
     * file upload
     *
     * @return void
     */
    public function testFileUpload()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->json('POST', '/avatars', ['avatar' => $file]);

        // Storage::disk('avatars')->assertExists($file->hashName());

        Storage::disk('avatars')->assertMissing('missing.jpg');
    }
}
