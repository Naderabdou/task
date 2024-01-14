@extends('dashboard.layouts.app')

@section('title', 'المدونه')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">

                    <div class="d-flex justify-content-start breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ml-1">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">الرئيسيه</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.blogs.index')}}">المدونات</a></li>
                                <li class="breadcrumb-item active" aria-current="page">العرض</li>
                            </ol>
                        </nav>
                    </div>


                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="{{ route('admin.blogs.create') }}"><i class="mr-1"
                                        data-feather="circle"></i><span class="align-middle">اضافة خبر جديد</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{ route('admin.blogs.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="record_ids" class="record-ids">
                                <button type="submit" class="btn btn-relief-danger all_delete" id="bulk-delete" disabled="true">

                                    حذف مجموعة
                                    <i
                                        class="fa-solid fa-trash-can"></i>
                                </button>
                            </form><!-- end of form -->


                            <form method="post" action="{{route('admin.blogs.status')}}" style="display: inline-block;" id="status_sliders">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="record_ids" class="record-ids">
                                <button  type="submit" id="status_id"  class="btn btn-relief-success all_status"  disabled="disabled">


                                    تغير الحاله
                                    <i data-feather='edit'></i></button>

                            </form><!-- end of form -->


                            <div class="card">
                                <table class="datatables-basic table" id="category_table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="animated-checkbox">
                                                    <label class="m-0">
                                                        <input type="checkbox" id="record__select-all">
                                                        <span class="label-text"></span>
                                                    </label>
                                                </div>
                                            </th>
                                            <th>#</th>
                                            <th>الصوره</th>
                                            <th>الاسم</th>
                                            <th>الوصف</th>
                                            <th>الحاله</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td class="animated-checkbox">
                                                    <label class="m-0">
                                                        <input type="checkbox" class="record__select" value="{{ $blog->id }}">
                                                        <span class="label-text"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="image">
                                                    <a href="{{ asset('storage/' . $blog->image) }}">
                                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                                         style="width: 80px; height: auto;">
                                                    </a>
                                                </td>
                                                <td>{{ $blog->title  }}</td>
                                                <td>{!!   $blog->description  !!}</td>
                                                <td>
                                                    @if ($blog->status == 'active')
                                                        <div class="badge badge-pill badge-light-success mr-1">
                                                            مفعل
                                                        </div>
                                                    @else
                                                        <div class="badge badge-pill badge-light-danger mr-1">
                                                            غير مفعل
                                                        </div>
                                                    @endif


                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                            data-id="{{ $blog->id }}"
                                                            class="btn btn-sm btn-danger item-delete"><i
                                                                class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
