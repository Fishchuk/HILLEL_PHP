<?php


namespace App\Services\Contract;


use Illuminate\Http\UploadedFile;

interface ImageServiceInterface
{
    /**
     * @param string $file
     */
    public function upload(UploadedFile $file);

    /**
     * @param string $file
     */
    public function remove(string $file);

}
