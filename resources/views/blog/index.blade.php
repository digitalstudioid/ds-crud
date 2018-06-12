@extends('blog.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h1>Simple Laravel Ajax Crud</h1>
  </div>
</div>

<div class="form-group row add">
  <div class="col-md-5">
    <input type="text" class="form-control" id="title" name="title"
    placeholder="Your title Here" required>
    <p class="error text-center alert alert-danger hidden"></p>
  </div>
  <div class="col-md-5">
    <input type="text" class="form-control" id="description" name="description"
    placeholder="Your description Here" required>
    <p class="error text-center alert alert-danger hidden"></p>
  </div>
  <div class="col-md-2">
    <button class="btn btn-warning" type="submit" id="add">
      <span class="glyphicon glyphicon-plus"></span> Add New Data
    </button>
  </div>
</div>

<div class="row">
  <div class="table-responsive">
    <table class="table table-borderless" id="table">
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
      {{ csrf_field() }}

      <?php $no=1; ?>
      @foreach($blogs as $blog)
        <tr class="item{{$blog->id}}">
          <td>{{$no++}}</td>
          <td>{{$blog->title}}</td>
          <td>{{$blog->description}}</td>
          <td>
          <button class="edit-modal btn btn-primary" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-description="{{$blog->description}}">
            <span class="glyphicon glyphicon-edit"></span> Edit
          </button>
          <button class="delete-modal btn btn-danger" data-id="{{$blog->id}}" data-title="{{$blog->title}}" data-description="{{$blog->description}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
          </button>
        </td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="t">
            </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-2" for="description">Description:</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="d">
          </div>
        </div>
        </form>
          <div class="deleteContent">
          Are you Sure you want to delete <span class="title"></span> ?
          <span class="hidden id"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn actionBtn" data-dismiss="modal">
            <span id="footer_action_button" class='glyphicon'> </span>
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

@stop