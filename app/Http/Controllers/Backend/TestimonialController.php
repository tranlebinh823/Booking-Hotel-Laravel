<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
class TestimonialController extends Controller
{
    public function AllTestimonial(){

        $testimonial = Testimonial::latest()->get();
        return view('backend.tesimonial.all_tesimonial',compact('testimonial'));

    } // End Method

}
