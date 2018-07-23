<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $images;

    public function __construct(ImageService $imageService)
    {
        $this->images = $imageService;
    }

    public function index()
    {
        $myImages = $this->images->all();
        return view('welcome', ['imagesInView' => $myImages]);
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $filename = $request->image->store('uploads');
        $this->images->store($filename);

        return redirect('/');
    }

    public function show($id)
    {
        $myImage = $this->images->show($id);
        return view('show', ['imageInView' => $myImage]);
    }

    public function edit($id)
    {

        $image = $this->images->getOne($id);

        return view('edit', ['imageInView' => $image]);
    }

    public function update(Request $request, $id)
    {
        $newImage = $request->image;

        $this->images->update($id, $newImage);
        return redirect('/');
    }

    public function delete($id)
    {
        $this->images->delete($id);
        return redirect('/');
    }
}
