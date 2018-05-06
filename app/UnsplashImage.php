<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnsplashImage extends Model
{
    use SoftDeletes;

    const FAVOURITE = '1';
    const NOT_FAVOURITE = '0';

    protected $data = ['deleted_at'];
    protected $fillable = [
        'image_id',
        'width',
        'height',
        'color',
        'regularImageURL',
        'favouriteStatus',
        'description',
    ];
    protected $table = 'unsplash_images';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function setDescriptionAttribute($description)
    {
        $this->attributes['description'] = strtolower($description);
    }

    public function getDescriptionAttribute($description)
    {
        return ucwords($description);
    }

    public function isFavouriteStatus(){
        return $this->favouriteStatus == UnsplashImage::NOT_FAVOURITE;
    }
}
