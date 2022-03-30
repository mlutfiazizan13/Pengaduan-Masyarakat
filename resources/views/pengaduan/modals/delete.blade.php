{{-- delete modal --}}

    <div class="modal fade" id="deleteModal_{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this pengaduan?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure?</div>
                <div class="modal-footer">
                    @if (Auth::guard('admin')->user()->role == 'admin')
                        <form method="POST" action="{{ route('pengaduan.destroy', $d->id) }}">
                    @endif
                    @if (Auth::guard('admin')->user()->role == 'petugas')
                        <form method="POST" action="{{ route('pengaduan-petugas.destroy', $d->id) }}">
                    @endif
                    {{-- <form method="POST" action="{{ route('pengaduan.destroy', $d->id) }}"> --}}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>