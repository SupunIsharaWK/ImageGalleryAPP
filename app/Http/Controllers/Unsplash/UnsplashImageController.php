<?php

namespace App\Http\Controllers\Unsplash;

use App\Http\Controllers\ApiController;
use App\UnsplashImage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use function json_decode;


class UnsplashImageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageList = UnsplashImage::all();
        return $this->showAll($imageList);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function saveImages()
    {
        $imageData = $this->getRandomImagesSet();
        $arrayIndeCount = count($imageData);
        $count = 0;
        $result = [];
        $responseResult = [];
        while ($count < $arrayIndeCount) {
            $result[] = [
                'image_id' => $imageData[$count]->id,
                'width' => $imageData[$count]->width,
                'height' => $imageData[$count]->height,
                'color' => $imageData[$count]->color,
                'description' => $imageData[$count]->description,
                'favouriteStatus' => UnsplashImage::NOT_FAVOURITE,
                'regularImageURL' => $imageData[$count]->urls->regular,
            ];
            $image = UnsplashImage::create($result[$count]);
            $count = $count + 1;
            $responseResult[$count] = $image;
        }
        return response()->json($responseResult, 201);
    }

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getRandomImagesSet()
    {
        //$url = 'https://api.unsplash.com/photos/?client_id=0adca50653c5a1e1a1529cc947d0430f4856e79b698d97fd57bc7d13744658cd';
        $url2 = 'https://api.unsplash.com/photos/random?client_id=0adca50653c5a1e1a1529cc947d0430f4856e79b698d97fd57bc7d13744658cd&count=20';
        $client = new Client();
        $decode_json = $client->get($url2)->getBody();
        $image = json_decode($decode_json);
        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param UnsplashImage $image
     * @return void
     */
    public function show(UnsplashImage $image)
    {
        return $this->showOne($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param UnsplashImage $image
     * @return void
     */
    public function update(Request $request, UnsplashImage $image)
    {
        if ($request->has('favouriteStatus')) {
            $image->favouriteStatus = $request->favouriteStatus;
        }
        if ($request->has('description')) {
            $image->description = $request->description;
        }
        $image->save();
        return $this->showOne($image);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UnsplashImage $image
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(UnsplashImage $image)
    {
        $image->delete();
        return $this->showOne($image);
    }

    public function getRandomImages()
    {
        $url = 'https://api.unsplash.com/photos/random';
        $client = new Client();
        $response = $client->request('GET', $url, ['headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 751401b8b7713cbdc4c0e3ec062350e4a2eb9cd33a2efdbfec42ec5cebbabc3d',
            'Accept-Version' => 'v1',
            'count' => '30']]);
        return $response;
    }

    public function getFavouritImages()
    {
        $favImages = UnsplashImage::all()->where('favouriteStatus', 1);
        return $this->showAll($favImages);
    }
}
