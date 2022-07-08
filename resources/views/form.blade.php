
<div class="container mt-4">
    @if (isset($status))
        <div class="alert alert-success">
            {{ $status }}
        </div>
    @else
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Add Lot
            </div>
            <div class="card-body">
                <form name="add-form" id="add-form" onsubmit="sendForm(this.id);">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6 mb-1">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                            <span class="text-danger" id="titleError"></span>
                        </div>
                        <div class="form-group col-6 mb-1">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" required="">
                            <span class="text-danger" id="descriptionError"></span>
                        </div>
                        <div >
                            <strong>Category:</strong>
                            <select  class="form-control" id="select2" multiple name="category[]">
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->title }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    @endif
</div>
<script>

    $(document).ready(function() {

        $('#select2').select2();

    });

</script>
