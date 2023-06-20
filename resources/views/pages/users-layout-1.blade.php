@extends('../layout/' . $layout)

@section('subhead')
    <title>Users Page</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Users Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/add-new-users" class="btn btn-primary shadow-md mr-2">Add New Users</a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <!-- Alert -->
            <div class=""></div>
            @if(Session::has('status'))
                <div class="alert alert-success-soft show flex items-center mb-2" role="alert">
                    <i data-lucide="user-plus" class="w-6 h-6 mr-2"></i>
                    {{Session::get('message')}}
                </div>
            @endif
            <!-- END Alert -->
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NO</th>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="whitespace-nowrap">EMAIL</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">PASSWORD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userList as $data)
                        <tr class="intro-x">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td class="w-40">
                                <div class="flex items-center justify-center text-success">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>Active
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="edit-users/{{$data->id}}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a href="#" class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-modal{{$data->id}}">
                                       <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                            @include('layout.modal.delete')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
@endsection
