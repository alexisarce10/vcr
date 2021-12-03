<?php

namespace App\Observers;

use App\Models\Unity;
use Illuminate\Support\Facades\Storage;

class UnityObserver
{
    public function deleting(Unity $section){
        foreach ($section->lessons as $lesson) {
            if ($lesson->resource) {
                Storage::delete($lesson->resource->url);
                $lesson->resource->delete();
            }
        }
    }
}
