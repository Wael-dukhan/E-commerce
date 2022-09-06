<x-layout>

    <form action="/carts/update" method="POST">
        @csrf
        {{method_field('PUT')}}
        {{-- @dd(requesst()->post()) --}}
        <input type="hidden" name="id" value="{{\request()->id}}">

        <div class="row">

            <div class="col-6 form-group">
                <strong>Quality :</strong>
                <input type="text" name="Quality" class="form-control" value ={{\request()->Quality}}>
            </div>
                
        </div>
        <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
    </form>

</x-layout>