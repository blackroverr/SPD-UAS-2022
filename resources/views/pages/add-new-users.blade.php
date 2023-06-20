@extends('../layout/' . $layout)

@section('subhead')
    <title>Add New User</title>
@endsection

@section('subcontent')
<form action="add-user" method="POST">
    @csrf
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Add New User</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control w-full" placeholder="Input the name" required> 
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control w-full" placeholder="Input the email" required>
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control w-full" placeholder="Input the password" required>
                </div>
                <div class="mt-3" hidden>
                    <label for="photo" class="form-label">Password</label>
                    <input id="photo" name="photo" type="text" class="form-control w-full" value="default.jpg" >
                </div>
                <div class="mt-3">
                    <label for="role" class="form-label">Role</label>
                    <select data-placeholder="Select the Role" name="role_id" class="form-control" id="role" required>
                        <option value="" disabled selected><--Select One--></option>
                        @foreach ($role as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3" hidden>
                    <label for="active" class="form-label">Active Status</label>
                    <div class="form-switch mt-2">
                        <input type="checkbox" value="1" name="active" id="active" class="form-check-input" checked>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</form>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
