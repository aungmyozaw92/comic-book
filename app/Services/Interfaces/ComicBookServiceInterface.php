<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:24 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:31:05
 */

namespace App\Services\Interfaces;

use App\Models\ComicBook;

interface ComicBookServiceInterface
{
    public function getComicBook(ComicBook $comicBook);
    public function create(array $data);
    public function update(ComicBook $comicBook,array $data);
    public function destroy(ComicBook $comicBook);
    public function getComicBooks();
}