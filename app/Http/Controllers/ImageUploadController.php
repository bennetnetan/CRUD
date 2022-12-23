<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\DB;

class ImageUploadController extends Controller
{
    // Add image
    public function addImage(){
        !$urll = url()->full();
        $url_components = parse_url($urll);
        parse_str($url_components['query'], $params);
        $arr['id'] = $params['id'];
        return view('images.add_image')->with($arr);
        // dd($arr);
    }
    // Store Image
    public function storeImage(Request $request){
        $data = new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
            // ID
            $empId = $request->id;
            $data['empId'] = $empId;
        }
        // dd($data);
        $data->save();
        return redirect()->route('home');
    }
    // View Image
    public function viewImage(){
        $imageData= Postimage::all();
        return view('images.view_image', compact('imageData'));
    }
}
