@extends('../layout/' . $layout)
<head>
    
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <link rel='stylesheet'
        href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'>
    <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .filepond--drop-label {
            color: #4c4e53;
            margin-top: 20;
        }

        .filepond--root .filepond--drop-label{
            min-height: 9em;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            border-radius: 2em;
            background-color: #edf0f4;
            height: 1em;
            margin-bottom: 180;
        }

        .filepond--item-panel {
            background-color: #595e68;
        }

        .filepond--drip-blob {
            background-color: #7f8a9a;
        }

        .filepond--item {
            width: calc(20% - 0.5em);
        }
    </style>
</head>
@section('subhead')
    <title>File Manager</title>
@endsection

@section('subcontent')
            @if(session('status'))
                <div class="alert alert-success-soft" style="display:flex; justify-content:center;">
                    {{ session('status') }}
                </div>
            @endif

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">File Manager</h2>
            <!-- BEGIN: File Manager Menu -->
            
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500" data-lucide="search"></i>
                    <input type="text" class="form-control w-full sm:w-64 box px-10" placeholder="Search url">
                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-tw-placement="bottom-start">
                        <i class="dropdown-toggle w-4 h-4 cursor-pointer text-slate-500" role="button" aria-expanded="false" data-tw-toggle="dropdown" data-lucide="chevron-down"></i>
                        <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                            <div class="dropdown-content">
                                <div class="grid grid-cols-12 gap-4 gap-y-3 p-3">
                                    <div class="col-span-6">
                                        <label for="input-filter-1" class="form-label text-xs">File Name</label>
                                        <input id="input-filter-1" type="text" class="form-control flex-1" placeholder="Type the file name">
                                    </div>
                                    <div class="col-span-12 flex items-center mt-3">
                                        <button class="btn btn-primary w-32 ml-2">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-auto flex" >
                    <!-- BEGIN: Modal Toggle --> 
                    <div class="text-center"> 
                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Upload</a> 
                    </div> <!-- END: Modal Toggle --> 
                    <!-- BEGIN: Modal Content --> 
                    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true"> 
                        <div class="modal-dialog modal-xl"> 
                            <div class="modal-content" > 
                                <!-- BEGIN: Modal Header --> 
                                <div class="modal-header"> 
                                    <h2 class="font-medium text-base mr-auto">Upload File</h2>
                                </div> 
                                <!-- END: Modal Header --> 
                                                    
                                <!-- BEGIN: Modal Body --> 
                                <form id="addForm" method="post" action="{{route('submitFile')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="file" name="file" id='file' multiple data-allow-reorder="true"
                                        data-max-file-size="10MB" data-max-files="20" required>
                                    </div>
                                    
                                    <div class="modal-footer" style="border-top-width:150px;"> 
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> 
                                        <button type="submit" id='saveBtn' class="btn btn-primary w-20">Send</button> 
                                    </div> 
                                </form>
                                <!-- END: Modal Body --> 
                                <!-- BEGIN: Modal Footer --> 
                                <!-- END: Modal Footer --> 
                            </div> 
                    </div> 
                </div> 
                <!-- END: Modal Content --> 
                    <button class="btn btn-primary shadow-md ml-2" disabled>New Folder</button>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($data as $row)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute left-0 top-0 mt-3 ml-3">
                                <input class="form-check-input border border-slate-500" type="checkbox" >
                            </div>
                            <button  class="w-3/5 file__icon file__icon--image mx-auto">
                                <div class="file__icon--image__preview image-fit">
                                    <img  class="w-3/5 file__icon file__icon--directory mx-auto"  alt="{{ $row['filename'] }}">
                                </div>
                            </button>
                            <h5 style="text-align: center; position: relative; font-size: 10px;">{{$row['filename']}}</h5>
                            
                            {{-- @if ($faker['files'][0]['type'] == 'Empty Folder')
                                <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a>
                            @elseif ($faker['files'][0]['type'] == 'Folder')
                                <a href="" class="w-3/5 file__icon file__icon--directory mx-auto"></a>
                            @elseif ($faker['files'][0]['type'] == 'Image')
                                <button  class="w-3/5 file__icon file__icon--image mx-auto">
                                    <div class="file__icon--image__preview image-fit">
                                        <img alt="spd" src="{{ asset('dist/images/' . strtolower($faker['files'][0]['file_name'])) }}" data-action="zoom">
                                    </div>
                                </button>
                            @else
                                <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                                    <div class="file__icon__file-name">{{ $faker['files'][0]['type'] }}</div>
                                </a>
                            @endif
                            <a href="" class="block font-medium mt-4 text-center truncate">{{ $faker['files'][0]['file_name'] }}</a>
                            <div class="text-slate-500 text-xs text-center mt-0.5">{{ $faker['files'][0]['size'] }}</div> --}}
                            <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i>
                                </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <i data-lucide="download" class="w-4 h-4 mr-2"></i> Download 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- @foreach ($directory as $row)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $row['url'] }}" alt="{{ $row['name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $row['name'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevron-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
@endsection
