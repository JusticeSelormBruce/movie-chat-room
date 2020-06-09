<?php


namespace App\classes;


use Illuminate\Support\Facades\Storage;

class DeleteFile
{
    public function removeFile($modelName, $id, $column_name)
    {
        $model = '\App' . '\\' . $modelName;
        $class = new  $model();
        $result = $class->whereId($id)->get($column_name)->first();
        Storage::delete($result[$column_name]);
    }
}
