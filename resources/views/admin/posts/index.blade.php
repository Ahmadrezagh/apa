
@extends('layouts.panel')
@section('Posts')
    active
@endsection
@section('Post')
    active
@endsection
@section('title')
    پست ها
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">پست</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float: right">پست ها</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">ایجاد پست</button>

                        <!-- Create Modal -->
                        <div class="modal fade" id="modal-create" data-backdrop="static">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="float:right;">ایجاد پست</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form  method="POST" action="{{route('posts.store')}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                               <div class="row">
                                                   <div class="form-group col-lg-6">
                                                       <label for="exampleInputEmail1">عنوان</label>
                                                       <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="عنوان پست" required>
                                                   </div>
                                                   <div class="form-group col-lg-6">
                                                       <label for="post_type_id">نوع </label>
                                                       <select name="post_type_id" class="form-control js-example-basic-multiple" id="post_type_id" style="width: 100% !important;">
                                                           @foreach(\App\Models\PostType::all() as $postType)
                                                               <option value="{{$postType->id}}">{{$postType->name}}</option>
                                                           @endforeach
                                                       </select>
                                                   </div>
                                                   <div class="form-group col-12">
                                                       <label for="exampleFormControlSelect1">دسته بندی </label>
                                                       <select class="form-control js-example-basic-multiple col-12" name="categories[]" multiple="multiple" style="width: 100% !important;">
                                                           @foreach(\App\Models\Category::all() as $category)
                                                               <option value="{{$category->id}}">{{$category->name}}</option>
                                                           @endforeach
                                                       </select>
                                                   </div>
                                                   <div class="form-group col-12">
                                                       <label for="exampleInputFile">تصویر پست</label>
                                                       <div class="input-group">
                                                           <div class="custom-file">
                                                               <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                               <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="form-group col-12">
                                                       <textarea name="text" id="" cols="30" rows="10"></textarea>
                                                   </div>
                                                   <div class="form-group col-12">
                                                       <label for="exampleFormControlSelect1">تگ ها</label>
                                                       <select class="form-control js-example-basic-multiple col-12" name="tags[]" multiple="multiple" style="width: 100% !important;">
                                                           @foreach(\App\Models\Tag::all() as $category)
                                                               <option value="{{$category->id}}">{{$category->name}}</option>
                                                           @endforeach
                                                       </select>
                                                   </div>
                                               </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">ثبت</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <table id="table" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>نوع</th>
                                <th>بازدید</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{$post->link}}" target="_blank">{{$post->title}}</a>
                                    </td>
                                    <td>
                                        {{$post->type->name ?? ' - '}}
                                    </td>
                                    <td>{{$post->view}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$post->id}}" >ویرایش</button>
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$post->id}}" >حذف</button>
                                        </div>
                                    </td>

                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal-delete{{$post->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">حذف پست</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>آیا در حذف پست `{{$post->title}}` مطمین هستید؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                <form action="{{route('posts.destroy',$post->slug)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>

                                                </form>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <!-- /.modal -->
                                <!-- Change Modal -->
                                <div class="modal fade" id="modal-edit{{$post->id}}" data-backdrop="static">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">ویرایش پست</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form  method="POST" action="{{route('posts.update',$post->slug)}}"  enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label for="exampleInputEmail1">عنوان</label>
                                                                <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" placeholder="عنوان پست" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="post_type_id">نوع </label>
                                                                <select name="post_type_id" class="form-control js-example-basic-multiple" id="post_type_id" style="width: 100% !important;">
                                                                    @foreach(\App\Models\PostType::all() as $postType)
                                                                        <option value="{{$postType->id}}" @if($postType->id == $post->post_type_id) selected @endif>{{$postType->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleFormControlSelect1">دسته بندی </label>
                                                                <select class="form-control js-example-basic-multiple col-12" name="categories[]" multiple="multiple" style="width: 100% !important;">
                                                                    @foreach(\App\Models\Category::all() as $category)
                                                                        <option value="{{$category->id}}" @if(in_array($category->id,$post->categories()->get()->pluck('id')->toArray())) selected @endif >{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                                <img src="{{url($post->image)}}" alt="" style="width: 300px">
                                                            </div>
                                                            <div class="form-group col-12 mt-3">
                                                                <label for="exampleInputFile">تصویر پست</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <textarea name="text" id="" cols="30" rows="10">{{$post->text}}</textarea>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleFormControlSelect1">تگ ها</label>
                                                                <select class="form-control js-example-basic-multiple col-12" name="tags[]" multiple="multiple" style="width: 100% !important;">
                                                                    @foreach(\App\Models\Tag::all() as $category)
                                                                        <option value="{{$category->id}}" @if(in_array($category->id,$post->tags()->get()->pluck('id')->toArray())) selected @endif>{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">ویرایش</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                            @endforeach

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
