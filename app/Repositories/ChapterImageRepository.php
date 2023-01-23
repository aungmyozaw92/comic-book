<?php

namespace App\Repositories;

use App\Models\ChapterImage;
use Illuminate\Support\Facades\Storage;
use App\Repositories\AttachmentRepository;

class ChapterImageRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ChapterImage::class;
    }

    /**
     * @param array $data
     *
     * @return ChapterImage
     */
    public function create(array $data)
    {
        $attachmentRepo = new AttachmentRepository();
      
        if (isset($data['images']) && $data['images']) {
            foreach($data['images'] as $image){
                $file = $attachmentRepo->create($image);
                $chapterImage = ChapterImage::create([
                    'chapter_id' => $data['chapter_id'],
                    'image' => $file,
                ]);
          
            }
        }
        return $chapterImage->refresh();
    }

    /**
     * @param ChapterImage  $chapterImage
     * @param array $data
     *
     * @return mixed
     */
    public function update(ChapterImage $chapterImage, array $data)
    {
       
    }

    /**
     * @param ChaptChapterImageer $chapterImage
     */
    public function destroy(ChapterImage $chapterImage)
    {   
        if ($chapterImage->image) {
            Storage::disk('dospace')->delete('uploads/'.$chapterImage->image);
        }
        $this->deleteById($chapterImage->id);
    }
}
