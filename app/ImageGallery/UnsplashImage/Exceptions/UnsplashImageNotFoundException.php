<?php
/**
 * Created by PhpStorm.
 * User: Supun Ishara
 * Date: 5/7/2018
 * Time: 11:23 PM
 */

namespace app\imageGallery\UnsplashImage\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class UnsplashImageNotFoundException extends ModelNotFoundException
{

    /**
     * UnsplashImageNotFoundException constructor.
     * @param ModelNotFoundException|\Exception $e
     */
    public function __construct($e)
    {
    }
}