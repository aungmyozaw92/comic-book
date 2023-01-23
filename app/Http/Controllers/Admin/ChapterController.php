<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use App\Services\ChapterService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chapter\CreateChapterRequest;
use App\Http\Requests\Chapter\UpdateChapterRequest;

class ChapterController extends Controller
{
    protected $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }


    public function store(CreateChapterRequest $request)
    {
        $chapter = $this->chapterService->create($request->all());
        return redirect('admin/comic_books/'.$chapter->comic_book_id)->withStatus(__('Chapter successfully created.'));
    }

    public function show(Chapter $chapter)
    {
        return view('admin.chapter.show', compact('chapter'));
    }

    
    public function update(UpdateChapterRequest $request,Chapter $chapter)
    {
        $this->chapterService->update($chapter, $request->all());
        return redirect('admin/chapters/'.$chapter->id)->withStatus(__('Chapter successfully updated.'));
    }

    public function destroy(Chapter $chapter)
    {
        $result = $this->chapterService->destroy($chapter);
        return redirect('admin/chapters')->withStatus(__('Comic Book successfully deleted.'));
    }
}
