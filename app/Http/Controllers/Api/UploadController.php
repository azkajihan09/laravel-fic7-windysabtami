<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->image;
            $nameFile = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/images');
            $image->move($path, $nameFile);

            return response()->json([
                'image_path' => '/uploads/images/' . $nameFile,
                'base_url' => url('/'),
            ]);
        }
    }

    public function uploadMultipleImage(Request $request)
    {
        if ($request->has('image')) {
            $images = $request->image;
            foreach ($images as $key => $image) {
                $nameFile = time() . $key . '.' . $image->getClientOriginalExtension();
                $path = public_path('upload/images');
                $image->move($path, $nameFile);
            }
            return response()->json([
                'status' => 'upload sukses',    
            ]);
        }
    }
}
