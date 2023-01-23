@extends('admin.layout.master', ['activePage' => 'user-management', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-rose">
            <h4 class="card-title ">Users</h4>
            <p class="card-category"> Here you can manage users</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Add user</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                      Name
                    </th>
                    <th>
                      User Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Created At
                    </th>
                    <th class="text-right">
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $usr)
                  <tr>
                      <td>
                          {{ $usr->name }}
                      </td>
                      <td>
                          {{ $usr->username }}
                      </td>
                      <td>
                          {{ $usr->email }}
                      </td>
                      
                      <td>
                        {{ $usr->created_at }}
                      </td>
                      <td class="td-actions text-right">
                          <a rel="tooltip" class="btn btn-success btn-link" href="{{url('admin/users/'.$usr->id.'/edit')}}"
                              data-original-title="" title="">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                          </a>

                          <form action="{{ route('users.destroy',$usr->id) }}" method="POST" id="del-usr-{{$usr->id}}" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" id="" onclick="confirmDelete ('del-usr-{{$usr->id}}')">
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