<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function editForm()
    {
        $data = About::find(1);
        return view('frontend.about.edit', compact('data'));
    }

    public function edit(Request $request)
    {
        $file = $request->file('about_image');
        if ($file) {
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $saveUrl = 'upload/frontend/' . $filename;
            Image::make($file)->resize(523, 605)->save($saveUrl);
        }
        $data = About::find(1);
        if (!$data) {
            $data = new About();
        }

        if ($file) {
            $data->about_image = $saveUrl;
        }
        $data->title = $request->title;
        $data->short_title = $request->short_title;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->save();

        $notification = array(
            'message' => 'About Page Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
