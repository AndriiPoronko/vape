<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'orders';

    const PROGRESS_FALSE = 1;
    const PROGRESS_TRUE = 2;

    static function getProgress(){
        return [
            self::PROGRESS_FALSE => 'Не выполнен',
            self::PROGRESS_TRUE => 'Выполнен'
        ];
    }

    public function getProgressTitleAttribute(){
        return self::getProgress()[$this->progress];
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('quantity');
    }
}
