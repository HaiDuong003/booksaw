<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Book extends Model
{
    use HasFactory;

    public function getTitle()
    {
        return $this->title = Str::limit($this->title, 20);
    }

    public function getDesc()
    {
        return $this->description = Str::limit($this->description, 80);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
