<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChapterImage;
use App\Http\Controllers\Controller;
use App\Services\ChapterImageService;
use App\Http\Requests\ChapterImage\CreateChapterImageRequest;
use App\Http\Requests\ChapterImage\UpdateChapterImageRequest;

class ChapterImageController extends Controller
{
    protected $chapterImageService;

    public function __construct(ChapterImageService $chapterImageService)
    {
        $this->chapterImageService = $chapterImageService;
    }


    public function store(CreateChapterImageRequest $request)
    {
        $chapterImage = $this->chapterImageService->create($request->all());
        return redirect('admin/chapters/'.$request['chapter_id'])->withStatus(__('Chapter Image successfully created.'));
    }


    public function destroy(ChapterImage $chapterImage)
    {
        $chapter_id = $chapterImage->chapter_id;
        $result = $this->chapterImageService->destroy($chapterImage);
        return redirect('admin/chapters/'.$chapter_id)->withStatus(__('Chapter Image successfully deleted.'));
    }
}
