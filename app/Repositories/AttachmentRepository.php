<?php

namespace App\Repositories;

use App\Models\ComicBook;
use Illuminate\Support\Facades\Storage;


class AttachmentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
         return ComicBook::class;
    }
    
    public function create($file)
    {
        $file_name = null;
        $path  = 'uploads';
        if ($file) {
            if (gettype($file) == 'string') {
                $file_name = uniqid(). time(). '_' . '.' . 'png';
                Storage::disk('dospace')->put($path . '/' . $file_name, base64_decode($file),'public');
            } else {
            $file_name = time() . '_' . $file->getClientOriginalName();
            $content = file_get_contents($file);
            // Storage::disk('dospace')->put($path . '/' . $file_name, $content);
            Storage::disk('dospace')->put($path . '/' . $file_name, $content, 'public');
            
        }
        Storage::setVisibility($path . '/' . $file_name, "public");
           
        }
         return $file_name;
    }
}