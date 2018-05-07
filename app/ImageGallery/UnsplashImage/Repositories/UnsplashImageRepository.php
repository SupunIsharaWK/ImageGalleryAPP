<?php
/**
 * Created by PhpStorm.
 * User: Supun Ishara
 * Date: 5/7/2018
 * Time: 10:47 PM
 */

namespace app\imageGallery\UnsplashImage\Repositories;

use App\ImageGallery\UnsplashImage\Exceptions\CreateUnsplashImageErrorException;
use app\imageGallery\UnsplashImage\Exceptions\UnsplashImageNotFoundException;
use app\imageGallery\UnsplashImage\Exceptions\UpdateUnsplashImageErrorException;
use App\ImageGallery\UnsplashImage\UnsplashImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

/**
 * @property UnsplashImage model
 */
class UnsplashImageRepository
{
    protected $model;

    /**
     * UnsplashImageRepository constructor.
     * @param UnsplashImage $unsplashImage
     */
    public function __construct(UnsplashImage $unsplashImage)
    {
        $this->model = $unsplashImage;
    }

    /**
     * @param array $data
     * @return UnsplashImage
     */
    public function createUnsplashImage(array $data): UnsplashImage
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            throw new CreateUnsplashImageErrorException($e);
        }
    }

    /**
     * @param int $id
     * @return UnsplashImage
     * @throws UnsplashImageNotFoundException
     */
    public function findUnsplashImage(int $id) : UnsplashImage
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new UnsplashImageNotFoundException($e);
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws UpdateUnsplashImageErrorException
     */
    public function updateUnsplashImage(array $data) : bool
    {
        try {
            return $this->model->update($data);
        } catch (QueryException $e) {
            throw new UpdateUnsplashImageErrorException($e);
        }
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function deleteUnsplashImage() : bool
    {
        return $this->model->delete();
    }

}