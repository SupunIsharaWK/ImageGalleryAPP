<?php
/**
 * Created by PhpStorm.
 * User: Supun Ishara
 * Date: 5/7/2018
 * Time: 11:25 PM
 */

namespace app\imageGallery\UnsplashImage\Exceptions;


use Illuminate\Database\QueryException;

class UpdateUnsplashImageErrorException extends QueryException
{

    /**
     * UpdateUnsplashImageErrorException constructor.
     * @param \Exception|QueryException $e
     */
    public function __construct($e)
    {
    }
}