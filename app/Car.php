<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Color;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_marka','car_model','phone','color','ordered','comment'
    ];

    public function getColor()
    {
      if ($color = Color::find($this->color)) {
        return $color->title;
      } else {
        return false;
      }
    }

    public function getOrdered()
    {
      if ($this->ordered==1) {
        return "Да";
      } else {
        return "Нет";
      }
    }
}
