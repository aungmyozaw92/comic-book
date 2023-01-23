<?php

namespace App\Repositories;

use App\Models\ComicBook;
use Illuminate\Support\Facades\Storage;

class ComicBookRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ComicBook::class;
    }
    
    /**
     * @param string $id
     *
     * @return ComicBook
     */
    public function getComicBook($id)
    {
        return $this->getById($id);
    }

    public function getComicBooks()
    {
        $comic_book = ComicBook::filter(request()->all());
        if(request()->get('paginate')){
            return $comic_book->paginate(request()->get('paginate'));
        }else{
            return $comic_book->get();
        }
    }

    /**
     * @param array $data
     *
     * @return ComicBook
     */
    public function create(array $data)
    {
        $attachmentRepo = new AttachmentRepository();
        $filename = $attachmentRepo->create($data['image']);
        return ComicBook::create([
            'name' => $data['name'],
            'author' => $data['author'],
            'artist' => $data['artist'],
            'description' => $data['description'],
            'image' => $filename,
            'rating' => $data['rating'],
            'is_featured' => isset($data['is_featured']) ? $data['is_featured'] : false,
            'is_recommend' => isset($data['is_recommend']) ? $data['is_recommend'] : false,
            'is_banner' => isset($data['is_banner']) ? $data['is_banner'] : false,
        ]);
    }

    /**
     * @param ComicBook  $comicBook
     * @param array $data
     *
     * @return mixed
     */
    public function update(ComicBook $comicBook, array $data)
    {
        if (isset($data['image']) && $data['image']) {
           $attachmentRepo = new AttachmentRepository();
           if ($comicBook->image) {
                Storage::disk('dospace')->delete('uploads/'.$comicBook->image);
            }
            $filename = $attachmentRepo->create($data['image']);
        }
        $comicBook->name = isset($data['name']) ? $data['name'] : $comicBook->name;
        $comicBook->author = isset($data['author']) ? $data['author'] : $comicBook->author;
        $comicBook->artist = isset($data['artist']) ? $data['artist'] : $comicBook->artist;
        $comicBook->description = isset($data['description']) ? $data['description'] : $comicBook->description;
        $comicBook->image = isset($data['image']) ? $filename : $comicBook->image;
        $comicBook->rating = isset($data['rating']) ? $data['rating'] : $comicBook->rating;
        $comicBook->is_featured = isset($data['is_featured']) ? $data['is_featured'] : false;
        $comicBook->is_recommend = isset($data['is_recommend']) ? $data['is_recommend'] : false;
        $comicBook->is_banner = isset($data['is_banner']) ? $data['is_banner'] : false;

        $comicBook->save();
       
       return $comicBook->refresh();
    }

    /**
     * @param ComicBook $comicBook
     */
    public function destroy(ComicBook $comicBook)
    {   
        if ($comicBook->image) {
            Storage::disk('dospace')->delete('uploads/'.$comicBook->image);
        }
        $this->deleteById($comicBook->id);
    }
}
