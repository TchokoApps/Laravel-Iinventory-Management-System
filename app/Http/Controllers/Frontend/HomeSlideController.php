<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeSlideController extends Controller
{
    public function editForm()
    {
        $homeSlide = HomeSlide::find(1);
        return view('frontend.home_slide.edit', compact('homeSlide'));
    }

    public function edit(Request $request)
    {
        $file = $request->file('home_slide');
        if ($file) {
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $data['home_slide'] = $filename;
            $saveUrl = 'upload/frontend/' . $filename;
            Image::make($file)->resize(636, 852)->save($saveUrl);
        }
        $homeSlide = HomeSlide::find(1);
        if (!$homeSlide) {
            $homeSlide = new HomeSlide();
        }

        $homeSlide->title = $request->title;
        $homeSlide->short_title = $request->short_title;
        if ($file) {
            $homeSlide->home_slide = $saveUrl;
        }
        $homeSlide->video_url = $request->video_url;
        $homeSlide->save();

        $notification = array(
            'message' => 'Home Slide Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
