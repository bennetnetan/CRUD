<?php

namespace App\Models;

use App\Http\Controllers\ImageUploadController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->belongsTo(ImageUploadController::class);
    }
}
