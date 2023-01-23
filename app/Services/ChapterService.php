<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:34 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:47:28
 */
 
namespace App\Services;

use Exception;
use App\Models\Chapter;
use App\Models\ComicBook;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ChapterRepository;
use Illuminate\Support\Facades\Validator;
use App\Services\Interfaces\ChapterServiceInterface;

class ChapterService implements ChapterServiceInterface
{
    protected $chapterRepository;

    public function __construct(ChapterRepository $chapterRepository)
    {
        $this->chapterRepository = $chapterRepository;
    }

    public function getChapters()
    {
        return $this->chapterRepository->getChapters();
    }

    public function getChapter(Chapter $chapter)
    {
        return $this->chapterRepository->getChapter($chapter->id);
    }

    public function create(array $data)
    {       
        $result = $this->chapterRepository->create($data);
        return $result;
    }

    public function update(Chapter $chapter,array $data)
    {
        DB::beginTransaction();
        try {
            $result = $this->chapterRepository->update($chapter, $data);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to update Chapter');
        }
        DB::commit();

        return $result;
    }

    public function destroy(Chapter $chapter)
    {
        DB::beginTransaction();
        try {
            $result = $this->chapterRepository->destroy($chapter);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to delete Chapter');
        }
        DB::commit();
        
        return $result;
    }
}