<?php

namespace App\Http\Controllers\Api\v1\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Image\ImageUploadRequest;
use App\Services\User\Avatar\UserDeleteAvatarServices;
use App\Services\User\Avatar\UserUploadAvatarServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    public function news(ImageUploadRequest $request)
    {
        return response()->json([
            'file' => $this->uploadImage($request->file('file'), 'news')
        ]);
    }

    public function avatar(ImageUploadRequest $request, UserUploadAvatarServices $services)
    {
        return $services->uploadAvatar($this->uploadImage($request->file('file'), 'avatars'));
    }

    public function deleteAvatar(UserDeleteAvatarServices $services)
    {
        return $services->deleteAvatar();
    }

    protected function uploadImage($file, $url)
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalName();

        $file->move(public_path($url), $fileName);
        return $url.'/'.$fileName;
    }
}
