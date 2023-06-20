@extends('../layout/' . $layout)

@section('subhead')
    <title>File Manager | Upload</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">File Upload Page</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Multiple File Upload -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">File Upload</h2>
                </div>
                    <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data" class="dropzone">
                            @csrf
                    </form>
            </div>
            <div class="col-md-12 mt-2">
                <div class="alert alert-primary">
                    Refresh Your Browser to Update 
                </div>
            </div>
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                    @foreach ($data as $row)
                        <div class="col-md-3">
                            <div class="card" style="width: 10rem;">
                                <img class="card-img-top" src="{{ $row['url'] }}" alt="{{ $row['name'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row['name'] }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>    
            </div>
             
            <!-- END: Multiple File Upload -->
        </div>
    </div>
@endsection
