<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:34 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:47:28
 */
 
namespace App\Services;

use App\Models\ComicBook;
use App\Repositories\ComicBookRepository;
use App\Services\Interfaces\ComicBookServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ComicBookService implements ComicBookServiceInterface
{
    protected $comicBookRepository;

    public function __construct(ComicBookRepository $comicBookRepository)
    {
        $this->comicBookRepository = $comicBookRepository;
    }

    public function getComicBooks()
    {
        return $this->comicBookRepository->getComicBooks();
    }

    public function getComicBook(ComicBook $comicBook)
    {
        return $this->comicBookRepository->getComicBook($comicBook->id);
    }

    public function create(array $data)
    {       
        $result = $this->comicBookRepository->create($data);
        return $result;
    }

    public function update(ComicBook $comicBook,array $data)
    {
        DB::beginTransaction();
        try {
            $result = $this->comicBookRepository->update($comicBook, $data);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to update ComicBook');
        }
        DB::commit();

        return $result;
    }

    public function destroy(ComicBook $comicBook)
    {
        DB::beginTransaction();
        try {
            $result = $this->comicBookRepository->destroy($comicBook);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to delete ComicBook');
        }
        DB::commit();
        
        return $result;
    }
}