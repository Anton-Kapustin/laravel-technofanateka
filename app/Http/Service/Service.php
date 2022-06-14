<?php

namespace App\Http\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Service {

    public static function getAllColumnsFromTable(String $tableName) {
        $arrayColumns = Schema::getColumnListing($tableName);
        return $arrayColumns;
    }

    public function getAuthUser(){
        return Auth::user();
    }

    public function deleteFile(String $disk, String $path)
    {
        return Storage::disk($disk)->delete($path);
    }

}