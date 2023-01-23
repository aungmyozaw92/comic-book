@extends('admin.layout.master', ['activePage' => 'comic_book', 'titlePage' => __('Comic Book')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ url('admin/comic_books/'.$comic_book->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-rose">
                <h4 class="card-title">{{ __('Edit Comic Book') }}</h4>
                <p class="card-category">{{ __('Comic Book information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
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
                @endif
                <div class="row">
                   <div class="col-md-8">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $comic_book->name) }}" required="true" aria-required="true"/>
                            @if ($errors->has('name'))
                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Author') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" id="input-author" type="text" placeholder="{{ __('Author') }}" value="{{ old('author', $comic_book->author) }}" required="true" aria-required="true"/>
                            @if ($errors->has('author'))
                              <span id="author-error" class="error text-danger" for="input-author">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Artist') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('artist') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('artist') ? ' is-invalid' : '' }}" name="artist" id="input-artist" type="text" placeholder="{{ __('Artist') }}" value="{{ old('artist', $comic_book->artist) }}" required />
                            @if ($errors->has('artist'))
                              <span id="artist-error" class="error text-danger" for="input-artist">{{ $errors->first('artist') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Rating') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('rating') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" id="input-rating" type="text" placeholder="{{ __('Rating') }}" value="{{ old('rating', $comic_book->rating) }}" required />
                            @if ($errors->has('rating'))
                              <span id="rating-error" class="error text-danger" for="input-rating">{{ $errors->first('rating') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <label class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($comic_book->is_featured==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox1" value="{{$comic_book->is_featured}}" name="is_featured"> Is Featured
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($comic_book->is_recommend==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox2" value="{{$comic_book->is_recommend}}" name="is_recommend"> Is Recommend
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label">
                                      <input class="form-check-input" {{($comic_book->is_banner==1)? 'checked': ''}} type="checkbox" id="inlineCheckbox2" value="{{$comic_book->is_banner}}" name="is_banner"> Is Banner
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-9">
                          <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" cols="30" rows="10" aria-required="true">{{ old('description', $comic_book->description) }}</textarea>
                            @if ($errors->has('description'))
                              <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="col-md-4">
                      <h4 class="title">Comic Image</h4>
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="{{Storage::disk('dospace')->url('uploads/'.$comic_book->image)}}">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                              <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input name="image" type="file"/>
                              </span>
                              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> Remove
                              </a>
                          </div>
                          @if ($errors->has('image'))
                              <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                            @endif
                      </div>
                                  
                     </div>
                </div>  
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <button type="button" class="btn btn-light" onclick="window.location='{{ URL::previous() }}'">{{ __('Cancel') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
   
    </div>
  </div>
@endsection