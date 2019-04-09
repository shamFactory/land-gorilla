<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageFormRequest;
use App\Uploads;
use Carbon\Carbon;
use \Auth;
use \Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function store(ImageFormRequest $request)
    {
        $date = new Carbon($request->input('date'));
        $model = new Uploads();
        $model->user_id = Auth::user()->id;
        $model->date_at = $date->toDateTimeString(); 
        $model->save();
        foreach ($request->image as $k => $image) {
            $model->{'image_'.($k +1 )} = $this->saveImage($model, $k, $image);
        }
        $model->save();
        return redirect()->route('view', ['id' => $model->id]);
    }

    public function view(Request $request, $id)
    {
        $model = Uploads::findOrFail($id);
        return view('view', [
            'model' => $model
        ]);
    }

    protected function saveImage($model, $k, $image){
        $ext = $image->getClientOriginalExtension();
        $name = $model->id.'_'.$k.'_'.uniqid();
        $imageName = $name. '.' . $ext;
        $path = public_path('uploads/images/' . $imageName);
        Image::make($image)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        return $imageName;
    }
}
