<?php

namespace App\Listeners\Product;

use App\Events\Product\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class SetupProductImages implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event): void
    {
        
        $baseProductImages = 'products';

        $storage = Storage::disk(env('STORAGE_DISK'));
        if (!$storage->exists($baseProductImages)) {
            $storage->makeDirectory($baseProductImages);
        }

        $productImagesDirname = "/product_{$event->product->id}";

        $images = $event->product->images->get();

        $path = "{$baseProductImages}{$productImagesDirname}";

        if (!$storage->exists($path)){
            $storage->makeDirectory($path);
        }

        $images->each(function($image) use($storage, $path) {
            if ($storage->exists($image->path)){
                $storage->move($image->path, "{$path}/{$image->path}");
                $image->update(['path' => "{$path}/{$image->path}"]);
            }
        });
        
    }
}
