<?php

namespace App\Repositories;

use App\Models\Chapter;
use App\Models\ChapterImage;
use Illuminate\Support\Facades\Storage;
use App\Repositories\AttachmentRepository;

class ChapterRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Chapter::class;
    }
    
    /**
     * @param string $id
     *
     * @return Chapter
     */
    public function getChapter($id)
    {
        return $this->getById($id);
    }

    public function getChapters()
    {
        $comic_book = Chapter::filter(request()->all());
        if(request()->get('paginate')){
            return $comic_book->paginate(request()->get('paginate'));
        }else{
            return $comic_book->get();
        }
    }

    /**
     * @param array $data
     *
     * @return Chapter
     */
    public function create(array $data)
    {
        $attachmentRepo = new AttachmentRepository();
        $filename = $attachmentRepo->create($data['image']);
  
        $chapter = Chapter::create([
            'name' => $data['name'],
            'title' => $data['title'],
            'comic_book_id' => $data['comic_book_id'],
            'image' => $filename,
            
        ]);
        if (isset($data['images']) && $data['images']) {
            foreach($data['images'] as $image){
                $file = $attachmentRepo->create($image);
                ChapterImage::create([
                    'chapter_id' => $chapter->id,
                    'image' => $file,
                ]);
          
            }
        }
        return $chapter->refresh();
    }

    /**
     * @param Chapter  $chapter
     * @param array $data
     *
     * @return mixed
     */
    public function update(Chapter $chapter, array $data)
    {
        if (isset($data['image']) && $data['image']) {
           $attachmentRepo = new AttachmentRepository();
           if ($chapter->image) {
                Storage::disk('dospace')->delete('uploads/'.$chapter->image);
            }
            $filename = $attachmentRepo->create($data['image']);
        }
        $chapter->name = isset($data['name']) ? $data['name'] : $chapter->name;
        $chapter->title = isset($data['title']) ? $data['title'] : $chapter->title;
        $chapter->image = isset($data['image']) ? $filename : $chapter->image;

        $chapter->save();
       
       return $chapter->refresh();
    }

    /**
     * @param Chapter $chapter
     */
    public function destroy(Chapter $chapter)
    {   
        if ($chapter->image) {
            Storage::disk('dospace')->delete('uploads/'.$chapter->image);
        }
        $this->deleteById($chapter->id);
    }
}
