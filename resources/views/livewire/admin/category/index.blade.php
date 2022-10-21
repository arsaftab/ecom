<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="destroyCategory">
            <div class="modal-body">
                Are you sure, you want to delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes, delete</button>
            </div>
        </form>
        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->status == 1 ? 'Hidden' : 'Visible'}}</td>
                                <td>
                                    <a href="{{ url('admin/category/' .$item->id. '/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{$item->id}})" data-bs-toggle="modal" data-bs-target="#categoryModal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    window.addEventListener('close-modal', event =>{
        $('#categoryModal').modal('hide');

    });
</script>
    
@endpush