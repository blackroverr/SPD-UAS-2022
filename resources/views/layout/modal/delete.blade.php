<!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-modal{{$data->id}}" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-600 mt-2">Do you really want to delete <b>{{$data->email}}</b>?</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <form action="delete-users/{{$data->id}}" method="POST">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                @csrf
                                @method('delete')
                            <button type="submit" class="btn btn-danger w-24">Delete</button> 
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>