<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function profile_img_path()
    {
        if($this->image)
        {
            return asset('storage/img/'.$this->image);
        }

        return null;
    }

}
