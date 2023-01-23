<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:34 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:47:28
 */
 
namespace App\Services;

use Exception;
use App\Models\ChapterImage;
use App\Models\ComicBook;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ChapterImageRepository;
use App\Services\Interfaces\ChapterImageServiceInterface;

class ChapterImageService implements ChapterImageServiceInterface
{
    protected $chapterImageRepository;

    public function __construct(ChapterImageRepository $chapterImageRepository)
    {
        $this->chapterImageRepository = $chapterImageRepository;
    }

    public function create(array $data)
    {       
        $result = $this->chapterImageRepository->create($data);
        return $result;
    }

    public function update(ChapterImage $chapterImage,array $data)
    {
        DB::beginTransaction();
        try {
            $result = $this->chapterImageRepository->update($chapterImage, $data);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to update Chapter Image');
        }
        DB::commit();

        return $result;
    }

    public function destroy(ChapterImage $chapterImage)
    {
        DB::beginTransaction();
        try {
            $result = $this->chapterImageRepository->destroy($chapterImage);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to delete Chapter Image');
        }
        DB::commit();
        
        return $result;
    }
}