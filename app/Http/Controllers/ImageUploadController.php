<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    // Add image
    public function addImage(){
        return view('images.add_image');
        // dd("Hello");
    }
    // Store Image
    public function storeImage(Request $request){
        $data = new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
    }
    // View Image
    public function viewImage(){
        $imageData= Postimage::all();
        return view('images.view_image', compact('imageData'));
    }
}
