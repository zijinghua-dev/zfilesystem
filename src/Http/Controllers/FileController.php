<?php

namespace Zijinghua\Zfilesystem\Http\Controllers;

use Zijinghua\Zfilesystem\Http\Requests\File\ShowRequest;
use Zijinghua\Zfilesystem\Http\Requests\File\UploadRequest;
use Zijinghua\Zfilesystem\Http\Resources\FileResource;
use Zijinghua\Zfilesystem\Http\Services\FileService;

class FileController
{
    /**
     * 获取图片
     * @param ShowRequest $request
     * @param FileService $fileService
     * @param null $uuid
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(ShowRequest $request, FileService $fileService)
    {
        $result = $fileService->fetch($request);
        return $result->response();
    }
    /**
     * 上传文件
     * @param UploadRequest $request
     * @param FileService $fileService
     * @return FileResource
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upload(UploadRequest $request, FileService $fileService)
    {
        $result = $fileService->upload($request);
        return $result->response();
    }

    /**
     * @param UploadRequest $request
     * @param FileService $fileService
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resource(UploadRequest $request, FileService $fileService)
    {
        $result = $fileService->upload($request);
        return $result->response();
    }
}
