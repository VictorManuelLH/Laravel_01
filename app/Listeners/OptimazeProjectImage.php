<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimazeProjectImage
{
    /**
     * Create the event listener.
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectSaved $event){
        $img = Image::make(Storage::get( $event -> project -> image ))
            -> widen(600)
            -> limitColors(255)
            -> encode();
        Storage::put( $event -> project -> image, (String) $img );
    }
}
