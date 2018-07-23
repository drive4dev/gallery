<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.07.2018
 * Time: 9:22
 */

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function all()
    {
        $images = DB::table('images')->select('*')->get();
        return $images->all();
    }

    public function getOne($id)
    {
        return DB::table('images')->select('*')->where('id', $id)->first();
    }

    public function store($filename)
    {
        DB::table('images')->insert(
            ['image' => $filename]
        );

    }

    public function show($id)
    {
        $image = $this->getOne($id);
        return $image->image;
    }

    public function update($id, $newImage)
    {
        $image = $this->getOne($id);
        Storage::delete($image->image);

        $filename = $newImage->store('uploads');

        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $filename]);
    }
    public function delete($id)
    {
        $image = $this->getOne($id);
        Storage::delete($image->image);

        DB::table('images')
            ->where('id', $id)
            ->delete();
    }
}