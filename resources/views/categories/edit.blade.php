<x-layout>

    <form action="/categories/update" method="POST">
        @csrf
        {{method_field('PUT')}}
        {{-- @dd(requesst()->post()) --}}
        <input type="hidden" name="id" value="{{\request()->id}}">

        <div class="row">

            <div class="col-6 form-group">
                <strong>Category Name:</strong>
                <input type="text" name="name" class="form-control" value ={{\request()->name}}>
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <strong>Category Slug:</strong>
                <input type="text" name="slug" class="form-control"  value ={{\request()->slug}}>
                @error('slug')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
    </form>

</x-layout>