
@extends('layouts.panel')
@section('Contacts')
    active
@endsection
@section('Contact')
    active
@endsection
@section('title')
    پیام های تماس با ما
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">لیست پیام ها</h1>
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
                        <h3 class="card-title" style="float: right">پیام های تماس با ما</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                       
                        <table id="table" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>نام فرستدنده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach ($contact_us_messages as $contact_us_message)
                                <tr>
                                    <td>
                                        {{$contact_us_message->name}}
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-show{{$contact_us_message->id}}" >نمایش</button>
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$contact_us_message->id}}" >حذف</button>
                                        </div>
                                    </td>

                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal-delete{{$contact_us_message->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">حذف پیام</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>آیا در حذف پیام `{{$contact_us_message->name}}` مطمین هستید؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                <form action="{{route('admin_contact_us.destroy',$contact_us_message->id)}}" method="POST">
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

                                <!-- Show Modal -->
                                <div class="modal fade" id="modal-show{{$contact_us_message->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{$contact_us_message->name}}پیام </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="">نام</label>
                                                        <input type="text" class="form-control" value="{{$contact_us_message->name}}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="">ایمیل</label>
                                                        <input type="text" class="form-control" value="{{$contact_us_message->email}}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="">موضوع</label>
                                                        <input type="text" class="form-control" value="{{$contact_us_message->title}}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="">پیام</label>
                                                        <textarea type="text" class="form-control js-no-ckeditor" >{{$contact_us_message->message}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <a href="mailto:{{$contact_us_message->email}}" class="btn btn-primary">پاسخ درقالب ایمیل</a>
                                                </div>
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
