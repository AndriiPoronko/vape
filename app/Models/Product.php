<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    const AVIALAVLE_TRUE = 1;
    const AVIALABLE_FALSE = 0;

    static function getAvialable(){
        return [
            self::AVIALAVLE_TRUE => 'В наличии',
            self::AVIALABLE_FALSE => 'Отсутствует'
        ];
    }

    public function getAvialableTitleAttribute(){
        return self::getAvialable()[$this->is_avialable];
    }


    protected $table = 'products';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function colors(){
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }
}
