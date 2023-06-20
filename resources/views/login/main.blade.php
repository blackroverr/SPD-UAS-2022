@extends('../layout/' . $layout)

@section('head')
    <title>Login SPD </title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a class="-intro-x flex items-center pt-2">
                    <img alt="" width="140" height="100" src="{{ asset('dist/images/spd_logo.png') }}">
                </a>
                <div class="my-auto">
                    <img alt="" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Sistem Pengelolaan Data <br> Polibatam</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your Files in one place</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
           
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
                        
                        <div class="intro-x mt-8">
                            @if(Session::has('status'))
                                <div class="alert alert-danger mb-2" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                            <form action="" method="post">
                                @csrf
                                    <label class="form-label mb-2" for="email">Email</label>  
                                    <input id="email" name="email" type="email" class="intro-x login__input form-control py-3 px-4 block" >
                            
                                    <label class="form-label mt-2" for="password">Password</label> 
                                    <input id="password" name="password" type="password" class="intro-x login__input form-control py-3 px-4 block" autocomplete="new-password" >    
                                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                        <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                                    </div>
                            </form>
                        </div>                      
                    </div>
                </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection

