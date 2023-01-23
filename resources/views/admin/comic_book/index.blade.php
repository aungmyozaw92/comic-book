@extends('admin.layout.master', ['activePage' => 'comic_book', 'titlePage' => __('Comic Book')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Comic Books</h4>
            <p class="card-category"> Here you can manage comic books</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{route('comic_books.create')}}" class="btn btn-sm btn-primary">Add Comic Book</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                      Image
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Author
                    </th>
                    <th>
                      Artist
                    </th>
                    <th>
                      Rating
                    </th>
                    <th class="">
                      Featured
                    </th>
                    <th class="">
                      Recommend
                    </th>
                    <th class="">
                      Banner
                    </th>
                     <th class="text-right">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($comic_books as $book)
                  <tr>
                      <td>
                        <img width="100" src="{{Storage::disk('dospace')->url('uploads/'.$book->image)}}" alt="">
                          {{-- {{ $book->image ?  : null }} --}}
                      </td>
                      <td>
                          {{ $book->name }}
                      </td>
                      <td>
                          {{ $book->author }}
                      </td>
                      <td>
                          {{ $book->artist }}
                      </td>
                      <td>
                          {{ $book->rating }}
                      </td>
                      
                      <td>
                         <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($book->is_recommend==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" disabled="true" >
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                            </div>
                      </td>
                      <td>
                        <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($book->is_recommend==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" disabled="true" >
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                            </div>
                      </td>
                      <td>
                        <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($book->is_recommend==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" disabled="true" >
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                            </div>
                      </td>
                      <td class="td-actions text-right">
                          <a rel="tooltip" class="btn btn-success btn-link" href="{{url('admin/comic_books/'.$book->id)}}"
                              data-original-title="" title="">
                              <i class="material-icons">remove_red_eye</i>
                              <div class="ripple-container"></div>
                          </a>
                          <a rel="tooltip" class="btn btn-success btn-link" href="{{url('admin/comic_books/'.$book->id.'/edit')}}"
                              data-original-title="" title="">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                          </a>

                          <form action="{{ route('comic_books.destroy',$book->id) }}" method="POST" id="del-book-{{$book->id}}" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" onclick="confirmDelete ('del-book-{{$book->id}}')">
                                  <i class="material-icons">delete</i>
                                  <div class="ripple-container"></div>
                              </button>                              
                          </form>
                      </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>
@endsection