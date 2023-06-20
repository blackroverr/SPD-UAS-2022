@extends('../layout/base')

@section('body')
    <body class="py-5">
        @yield('content')
        @include('../layout/components/dark-mode-switcher')
        @include('../layout/components/main-color-switcher')

        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if (!navigator.serviceWorker.controller) {
                navigator.serviceWorker.register("/sw.js").then(function (reg) {
                    console.log("Service worker has been registered for scope: " + reg.scope);
                });
            }
        </script>
         <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
         <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
     
         <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
         <script src='https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js'></script>
         <script src='https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js'>
         </script>
         <script
             src='https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js'>
         </script>
            <script>

                FilePond.registerPlugin(
                    // encodes the file as base64 data
                    FilePondPluginFileEncode,
        
                    // validates the size of the file
                    FilePondPluginFileValidateSize,
        
                    // corrects mobile image orientation
                    FilePondPluginImageExifOrientation,
        
                    FilePondPluginFilePoster,
        
                    // previews dropped images
                    FilePondPluginImagePreview
                )
        
                //configuration filepond
                const inputElement = document.querySelector('input[id="file"]');
        
                // Create a FilePond instance
                const pond = FilePond.create(inputElement);
        
                //tujuan filepond
                FilePond.setOptions({
                    server: {
                        process: '{{ route('upload') }}', //upload
                        revert: (uniqueFileId, load, error) => {
        
                            //delete file
                            deleteFile(uniqueFileId);
        
                            error('Error terjadi saat delete file');
        
                            load();
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                });
                //end config filepond
        
                function deleteFile(nameFile){
                    $.ajax({
                            url: '{{ route('hapus') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "DELETE",
                            data: {
                                file: nameFile
                            },
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(response) {
                                console.log('error')
                            }
                        });
                }
        
                $(document).ready(function() {
                    $("#addForm").on('submit', function(e) {
                        e.preventDefault();
                        $("#saveBtn").html('Processing...').attr('disabled', 'disabled');
                        var link = $("#addForm").attr('action');
                        $.ajax({
                            url: link,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            data: new FormData(this),
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                $("#saveBtn").html('Save').removeAttr('disabled');
                                pond.removeFiles(); //clear
                                alert('Berhasil')
                            },
                            error: function(response) {
                                $("#saveBtn").html('Save').removeAttr('disabled');
                                alert(response.error);
                            }
                        });
                    });
        
                });
            </script>     
        @yield('script')
    </body>
@endsection
