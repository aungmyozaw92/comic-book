<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:24 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:31:05
 */

namespace App\Services\Interfaces;

use App\Models\Chapter;
use App\Models\ComicBook;

interface ChapterServiceInterface
{
    public function getChapter(Chapter $chapter);
    public function create(array $data);
    public function update(Chapter $chapter,array $data);
    public function destroy(Chapter $chapter);
    public function getChapters();
}