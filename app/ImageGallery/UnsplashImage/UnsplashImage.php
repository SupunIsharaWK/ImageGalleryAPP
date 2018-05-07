<?php
/**
 * Created by PhpStorm.
 * User: Supun Ishara
 * Date: 5/7/2018
 * Time: 11:05 PM
 */

namespace App\ImageGallery\UnsplashImage;

use Illuminate\Database\Eloquent\Model;

class UnsplashImage extends Model
{
    protected $fillable = [
        'image_id',
        'width',
        'height',
        'color',
        'regularImageURL',
        'favouriteStatus',
        'description',
    ];
}