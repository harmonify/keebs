<?php

namespace Tests\Feature;

use App\Utilities\ResourceUtilities;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ResourceUtilitiesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Storage::fake('test');
    }

    public function test_store_file()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $res = ResourceUtilities::storeImage($file, "avatars", "test");

        Storage::disk('test')->assertExists($res);
    }

    public function test_update_file()
    {
        $old = UploadedFile::fake()->image('avatar.jpg');
        $file = UploadedFile::fake()->image('avatar2.jpg');

        $old_res = ResourceUtilities::storeImage($old, "avatars", "test");
        $res = ResourceUtilities::updateImage($old_res, $file, "avatars", "test");

        Storage::disk('test')->assertMissing($old_res);

        Storage::disk('test')->assertExists($res);
    }

    public function test_delete_file()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $res = ResourceUtilities::storeImage($file, "avatars", "test");

        $this->assertTrue(ResourceUtilities::deleteImage($res, "test"));
    }
}
