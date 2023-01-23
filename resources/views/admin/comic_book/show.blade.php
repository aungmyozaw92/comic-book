@extends('admin.layout.master', ['activePage' => 'comic_book', 'titlePage' => __('Comic Book')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title ">Comic Books Detail</h4>
            <p class="card-category"> Here you can manage comic books</p>
          </div>
          {{-- @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
          @endif --}}
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-7">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td> {{ $comic_book->name }}</td>
                      </tr>
                      <tr>
                        <td>Author</td>
                        <td> {{ $comic_book->author }}</td>
                      </tr>
                      <tr>
                        <td>Artist</td>
                        <td> {{ $comic_book->artist }}</td>
                      </tr>
                      <tr>
                        <td>Rating</td>
                        <td> {{ $comic_book->rating }}</td>
                      </tr>
                      <tr>
                        <td>Is Featured</td>
                        <td>
                            <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($comic_book->is_featured==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" disabled="true" >
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Is Recommend</td>
                        <td>
                            <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($comic_book->is_recommend==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" disabled="true" >
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Is Banner</td>
                        <td>
                            <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($comic_book->is_banner==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" disabled="true" >
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Description </td>
                          <td>
                              {{ $comic_book->description }}
                          </td>
                          
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-5">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="{{Storage::disk('dospace')->url('uploads/'.$comic_book->image)}}">
                          </div>
                      </div>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-left">
        {{-- <a href="" class="btn btn-sm btn-primary"></a> --}}
        <button class="btn btn-md btn-primary" data-toggle="modal" data-target="#signupModal">
            Add Chapter<i class="material-icons">assignment</i>
        </button>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-rose">
            <h4 class="card-title ">Chapter Lists</h4>
            <p class="card-category"> Here you can manage comic chapters</p>
          </div>
          <div class="card-body">
            <div class="row">
              @foreach ($comic_book->chapters as $chapter)
              <div class="col-md-3">
                <div class="card" style="width: ">
                  <img class="card-img-top" src="{{Storage::disk('dospace')->url('uploads/'.$chapter->image)}}" alt="{{$chapter->title}}">
                  <div class="card-body">
                    <h5 class="card-title">{{$chapter->name}}</h5>
                    <p class="card-text">{{$chapter->title}}</p>
                    <a href="{{url('admin/chapters/'.$chapter->id)}}" class="btn btn-primary text-center">View Chapter</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>        
      </div>
    </div>

  </div>
</div>

{{-- <button class="btn btn-round" data-toggle="modal" data-target="#signupModal">
    <i class="material-icons">assignment</i>
    SignUp
</button> --}}

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Add New Chapter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{ route('chapters.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
          <div class="modal-body">
             <input type="hidden" name="comic_book_id" value="{{ $comic_book->id }}">
              <div class="row">
                <div class="col-md-8 ml-auto">
                  <div class="row">
                    <label class="col-sm-4 col-form-label">{{ __('Chpater Name') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Chpater Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-4 col-form-label">{{ __('Chpater Title') }}</label>
                    <div class="col-sm-8">
                      <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Chpater Title') }}" value="{{ old('title') }}" required="true" aria-required="true"/>
                        @if ($errors->has('title'))
                          <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-4 col-form-label">{{ __('Images') }}</label>
                    <div class="col-sm-8">
                      {{-- <input type="hidden" name="images[]" id="multi-image"> --}}
                      <div class="image_append">

                      </div>
                      <div class="image-wrapper">
                      <div class="sections">

                          <div class="images">
                            <div class="pic">
                              add
                            </div>
                          </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 ml-auto">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                          <img src="{{ asset('images') }}/image_placeholder.jpg">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input name="image" type="file"/>
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                        @if ($errors->has('image'))
                            <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                          @endif
                    </div>
                  </div>
                </div>
                </div>
              </div>
            
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary submit-chapter">{{ __('Save') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection