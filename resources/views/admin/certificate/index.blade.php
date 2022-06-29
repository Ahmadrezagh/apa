@extends('layouts.panel')
@section('Certificate')
    active
@endsection
@section('Certificates')
    active
@endsection
@section('title')
    صدور گواهی
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">زیر سیستم صدور و مدیریت گواهی مرکز</h1>
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
                        <h3 class="card-title" style="float: right">گواهی ها</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">صدور گواهی
                            جدید
                        </button>

                        <!-- Create Modal -->
                        <div class="modal fade" id="modal-create" data-backdrop="static">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="float:right;">صدور گواهی جدید</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form method="POST" action="{{route('certificates.store')}}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label for="exampleInputEmail1">نام نمایشی گواهی (منحصر به
                                                            فرد)</label>
                                                        <input name="show_name" type="text" class="form-control"
                                                               id="exampleInputEmail1" placeholder="نام نمایشی گواهی"
                                                               required>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="exampleInputEmail1">عنوان بالای گواهی</label>
                                                        <input name="big_title" type="text" class="form-control"
                                                               id="exampleInputEmail1" placeholder="عنوان بالای گواهی"
                                                               required>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="exampleInputEmail1">عنوان ثانویه گواهی</label>
                                                        <input name="secondary_title" type="text" class="form-control"
                                                               id="exampleInputEmail1" placeholder="عنوان ثانویه گواهی"
                                                               required>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="exampleInputEmail1">عنوان گواهی</label>
                                                        <input name="title" type="text" class="form-control"
                                                               id="exampleInputEmail1" placeholder="عنوان گواهی"
                                                               required>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="exampleInputEmail1">برای</label>
                                                        <textarea name="to" id="exampleInputEmail1" cols="30"
                                                                  rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="exampleInputEmail1">متن گواهی</label>
                                                        <textarea name="body" id="exampleInputEmail1" cols="30"
                                                                  rows="10"></textarea>
                                                    </div>


                                                    <div class="form-group col-12">
                                                        <label for="left_image">تصویر سمت چپ گواهی</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="left_image"
                                                                       class="custom-file-input" id="left_image">
                                                                <label class="custom-file-label" for="left_image">تصویر
                                                                    سمت چپ را انتخاب کنید</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="right_image">تصویر سمت راست گواهی</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="right_image"
                                                                       class="custom-file-input" id="right_image">
                                                                <label class="custom-file-label" for="right_image">تصویر
                                                                    سمت راست را انتخاب کنید</label>
                                                            </div>
                                                        </div>
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
                                <th>شناسه</th>
                                <th>نام نمایشی</th>
                                <th>تاریخ صدور</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($certificates as $certificate)
                                <tr>
                                    <td>
                                        <a target="_blank"
                                           href="{{url("certificates")."/".$certificate->certificate_id}}">
                                            {{$certificate->certificate_id}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$certificate->show_name}}
                                    </td>
                                    <td>
                                        {!!  toPersianNumber(\Morilog\Jalali\Jalalian::forge(strtotime($certificate->created_at))->format("Y/m/d")) !!}
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <button type="button" class="btn btn-success dropdown-item"
                                                    data-toggle="modal" data-target="#modal-edit{{$certificate->id}}">
                                                ویرایش
                                            </button>
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-delete{{$certificate->id}}">حذف
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal-delete{{$certificate->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">حذف گواهی</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>آیا در حذف گواهی `{{$certificate->show_name}}` مطمین هستید؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    بستن
                                                </button>
                                                <form action="{{route('certificates.destroy',$certificate->id)}}"
                                                      method="POST">
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
                                <div class="modal fade" id="modal-edit{{$certificate->id}}" data-backdrop="static">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">ویرایش گواهی</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form method="POST"
                                                      action="{{route('certificates.update',$certificate->id)}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label for="exampleInputEmail1">نام نمایشی گواهی (منحصر به
                                                                    فرد)</label>
                                                                <input name="show_name" type="text" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="نام نمایشی گواهی"
                                                                       required value="{{$certificate->show_name}}">
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleInputEmail1">عنوان بالای گواهی</label>
                                                                <input name="big_title" type="text" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="عنوان بالای گواهی"
                                                                       required value="{{$certificate->big_title}}">
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleInputEmail1">عنوان ثانویه گواهی</label>
                                                                <input name="secondary_title" type="text" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="عنوان ثانویه گواهی"
                                                                       required value="{{$certificate->secondary_title}}">
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleInputEmail1">عنوان گواهی</label>
                                                                <input name="title" type="text" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="عنوان گواهی"
                                                                       required value="{{$certificate->title}}">
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleInputEmail1">برای</label>
                                                                <textarea name="to" id="exampleInputEmail1" cols="30"
                                                                          rows="10">{!! $certificate->to  !!}</textarea>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="exampleInputEmail1">متن گواهی</label>
                                                                <textarea name="body" id="exampleInputEmail1" cols="30"
                                                                          rows="10">{!! $certificate->body !!}</textarea>
                                                            </div>


                                                            <div class="form-group col-12">
                                                                <label for="left_image">تصویر سمت چپ گواهی</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="left_image"
                                                                               class="custom-file-input" id="left_image">
                                                                        <label class="custom-file-label" for="left_image">تصویر
                                                                            سمت چپ را انتخاب کنید</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label for="right_image">تصویر سمت راست گواهی</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="right_image"
                                                                               class="custom-file-input" id="right_image">
                                                                        <label class="custom-file-label" for="right_image">تصویر
                                                                            سمت راست را انتخاب کنید</label>
                                                                    </div>
                                                                </div>
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
