@extends('admin.layout.master', ['activePage' => 'comic_book', 'titlePage' => __('Comic Book')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ url('admin/chapters/'.$chapter->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-rose">
                <h4 class="card-title">{{ __('Edit/Detail Chapter') }}</h4>
                <p class="card-category">{{ __('Chapter information') }}</p>
              </div>
              <div class="card-body ">
                <div class="row">
                   <div class="col-md-12">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Chapter Name') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Chapter Name') }}" value="{{ old('name', $chapter->name) }}" required="true" aria-required="true"/>
                            @if ($errors->has('name'))
                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Chapter Title') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Chapter Title') }}" value="{{ old('title', $chapter->title) }}" required="true" aria-required="true"/>
                            @if ($errors->has('title'))
                              <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Chapter Cover Image') }}</label>
                        <div class="col-sm-7">
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{Storage::disk('dospace')->url('uploads/'.$chapter->image)}}">
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
                   
                </div>  
              </div>
              <div class="card-footer ml-auto mr-auto text-left">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <button type="button" class="btn btn-light" onclick="window.location='{{ URL::previous() }}'">{{ __('Cancel') }}</button>
              </div>
            </div>
          </form>
        </div>
         
        <div class="card">
          <div class="card-header card-header-rose">
            <h4 class="card-title ">Chapter Image Lists</h4>
            <p class="card-category"> Here you can manage comic chapters</p>
          </div>
          
          <div class="card-body">
            <div class="row">
            <div class="col-12 text-left">
              {{-- <a href="" class="btn btn-sm btn-primary"></a> --}}
              <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addImageModal">
                  Add Image<i class="material-icons"> image</i>
              </button>
            </div>
          </div>
            <div class="row">
              @foreach ($chapter->chapter_images as $img)
              <div class="col-md-3">
                <div class="card" style="width: ">
                  <img class="card-img-top" src="{{Storage::disk('dospace')->url('uploads/'.$img->image)}}" alt="{{$img->title}}">
                   <form action="{{ route('chapter_images.destroy',$img->id) }}" method="POST" id="del-book-{{$img->id}}" class="d-inline text-center">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger text-center" data-original-title="" onclick="confirmDelete ('del-book-{{$img->id}}')">
                            Delete Image
                          </button>                              
                      </form>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>  
      </div>
   
    </div>
  </div>

  <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-add-image" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <h5 class="modal-title card-title">Add New Chapter Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
            </button>
          </div>
          <form method="post" enctype="multipart/form-data" action="{{ route('chapter_images.store') }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('post')
            <div class="modal-body">
              <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                <div class="row">
                  <div class="col-md-12 ml-auto">
                        {{-- <input type="hidden" name="images[]" id="multi-image"> --}}
                        <div class="image_append"></div>
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
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-primary submit-chapter">{{ __('Save') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
