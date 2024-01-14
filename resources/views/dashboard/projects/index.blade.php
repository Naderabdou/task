@extends('dashboard.layouts.app')

@section('title', ' المشاريع')

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
                                <li class="breadcrumb-item"><a href="{{route('admin.projects.index')}}">المشاريع</a></li>
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
                                    href="{{ route('admin.projects.create') }}"><i class="mr-1"
                                        data-feather="circle"></i><span class="align-middle">اضافة مشروع جديده </span></a>
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
                            <form method="post" action="{{ route('admin.projects.bulk_delete') }}" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="record_ids" class="record-ids">
                                <button type="submit" class="btn btn-relief-danger all_delete" id="bulk-delete" disabled="true">

                                    حذف مجموعة
                                    <i
                                        class="fa-solid fa-trash-can"></i>
                                </button>
                            </form><!-- end of form -->


                            <form method="post" action="{{route('admin.projects.status')}}" style="display: inline-block;" id="status_sliders">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="record_ids" class="record-ids">
                                <button  type="submit" id="status_id"  class="btn btn-relief-success all_status"  disabled="disabled">


                                    تغير الحاله
                                    <i data-feather='edit'></i></button>

                            </form><!-- end of form -->


                            <div class="card">
                                <div class="table-section">
                                <table class="datatables-basic table " >
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
                                         <!--   <th>القسم</th> -->
                                            <th>عدد الوحدات</th>
                                            <th>مساحه البناء</th>
                                            <th>مساحه الارض</th>
                                            <th>قطاع المشاريع</th>
                                            <th>اجمالي المساحة</th>

                                            <th>خدمات المشروع</th>

                                            <th>الحاله</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td class="animated-checkbox">
                                                    <label class="m-0">
                                                        <input type="checkbox" class="record__select" value="{{ $project->id }}">
                                                        <span class="label-text"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>


                                                <td class="image">
                                                    <a href="{{ asset('storage/' . $project->image) }}">
                                                    <img src="{{ asset('storage/' . $project->image) }}"
                                                         style="width: 80px; height: auto;">
                                                    </a>
                                                </td>
                                                <td>{{ $project->name  }}</td>

                                                   <!-- <td>
                                                        <a href="{{route('admin.categories.index')}}">
                                                        {{ $project->category->name }}
                                                         </a>
                                                    </td>-->
                                                <td>{{ $project->units }}</td>
                                                <td>{{ $project->building_area }}</td>
                                                <td>{{ $project->land_area }}</td>
                                                <td>{{ $project->projects_sector }}</td>
                                                <td>{{ $project->aesthetic_space }}</td>
                                                <td>{{ $project->project_services }}</td>

                                                <td >
                                                    @if ($project->status == 'active')
                                                        <span class="badge badge-light-success">مفعل</span>
                                                    @else
                                                        <span class="badge badge-light-danger">غير مفعل</span>
                                                    @endif

                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('admin.projects.destroy', $project->id) }}"
                                                            data-id="{{ $project->id }}"
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
