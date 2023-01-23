<?php

namespace App\Http\Controllers\Admin;

use App\Models\ComicBook;
use App\Services\ChapterService;
use App\Services\ComicBookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComicBook\CreateComicBookRequest;
use App\Http\Requests\ComicBook\UpdateComicBookRequest;

class ComicBookController extends Controller
{
    protected $comicBookService;
    protected $chapterService;

    public function __construct(ComicBookService $comicBookService,ChapterService $chapterService)
    {
        $this->comicBookService = $comicBookService;
        $this->chapterService = $chapterService;
    }

    /**
     * Display a listing of the ComicBooks
     *
     * @param  \App\ComicBook  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comic_books = $this->comicBookService->getComicBooks();
        return view('admin.comic_book.index', compact('comic_books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comic_book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateComicBookRequest $request)
    {
        $this->comicBookService->create($request->all());
        return redirect('admin/comic_books')->withStatus(__('ComicBook successfully created.'));
    }

    public function edit(ComicBook $comic_book)
    {
        return view('admin.comic_book.edit', compact('comic_book'))->withStatus(__('ComicBook successfully updated.'));
    }

     public function show(ComicBook $comic_book)
    {
        // $comic_book = $comic_book->with('chapters');
        return view('admin.comic_book.show', compact('comic_book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicBookRequest $request,ComicBook $comicBook)
    {
        $this->comicBookService->update($comicBook, $request->all());
        return redirect('admin/comic_books')->withStatus(__('ComicBook successfully updated.'));
    }

    public function destroy(ComicBook $comicBook)
    {
        $result = $this->comicBookService->destroy($comicBook);
        return redirect('admin/comic_books')->withStatus(__('Comic Book successfully deleted.'));
    }


}
