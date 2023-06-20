@extends('../layout/' . $layout)

@section('subhead')
    <title>Update Profile</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Update Profile</h2>
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            
        </div>
        @endif
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="" class="rounded-full" src="{{ asset('dist/images') . '/' . Auth::user()->photo }}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                        <div class="text-slate-500">{{ Auth::user()->role->name }}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center active:bg-violet-700" href="#personal_information">
                        <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Personal Information
                    </a>
                    <a class="flex items-center mt-5 active:bg-violet-700" href="#change_password">
                        <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->

        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Personal Information -->
            <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                @csrf
                @method('put')
                <div class="intro-y box mt-5" id="personal_information">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Personal Information</h2>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-8 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="text" class="form-control w-full" placeholder="Input text" value="{{ Auth::user()->email }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" name="name" type="text" class="form-control w-full" placeholder="Input text"  value="{{  Auth::user()->name }}" required>
                                    <span class="span text-danger error-text"></span>
                                </div>
                                <div class="mt-3">
                                    <label for="favorite_color" class="form-label">Favorite Colors</label>
                                    <input id="favorite_color" name="favorite_color" type="text" class="form-control w-full" placeholder="Input text"  value="{{  Auth::user()->favorite_color }}" >
                                    <span class="span text-danger error-text"></span>
                                </div>
                                {{-- <div class="mt-3">
                                    <label for="photo" class="form-label">Foto Profile</label>
                                    <input id="photo" type="file" class="form-control w-full" placeholder="Input text" value="{{  Auth::user()->name }}">
                                </div> --}}
                            </div>
                        </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                    
            <!-- END: Personal Information -->
            <!-- BEGIN: Change Password -->
            <form method="POST" action="{{ route('password.update', Auth::user()->id) }}">
                @csrf
                @method('put')
                <div class="intro-y box mt-5 tab-pane" id="change_password">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">Change Password</h2>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-8 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div>
                                    <label for="password" class="form-label">New Password</label>
                                    <input id="password" name="password" type="password" class="form-control w-full" placeholder="Input Your New Password" required>
                                </div>
                            </div>
                        </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                            </div>
                    </div>
                </div>
            </form>
            <!-- END: Change Password -->
        </div>
    </div>
@endsection

{{-- @section('script') --}}
{{-- CUSTOM JS CODES --}}
{{-- <script>
    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });
    
    $(function(){
      /* UPDATE ADMIN PERSONAL INFO */
      $('#AdminInfoForm').on('submit', function(e){
          e.preventDefault();
          $.ajax({
             url:$(this).attr('action'),
             method:$(this).attr('method'),
             data:new FormData(this),
             processData:false,
             dataType:'json',
             contentType:false,
             beforeSend:function(){
                 $(document).find('span.error-text').text('');
             },
             success:function(data){
                  if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                      $('span.'+prefix+'_error').text(val[0]);
                    });
                  }else{
                    $('.admin_name').each(function(){
                       $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                    });
                    alert(data.msg);
                  }
             }
          });
      });
      
    });
  </script>
@endsection --}}
