<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'calls';

    const CALL_FALSE = 1;
    const CALL_TRUE = 2;

    static function getProgress(){
        return [
            self::CALL_FALSE => 'Не выполнен',
            self::CALL_TRUE => 'Выполнен'
        ];
    }

    public function getProgressCallTitleAttribute(){
        return self::getProgress()[$this->progress];
    }
}
