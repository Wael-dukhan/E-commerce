<x-layout>

    <div class="row">
        <table class="table table-bordered border-secondary table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Product id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quality</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody class="">
            @foreach($carts as $cart)
                <tr>
                    <td scope="col">{{ $cart->post_id }}</td>
                    <td>{{ $cart->title }}</td>
                    <td>{{ $cart->price }}</td>
                    <td>{{ $cart->Quality }}</td>
                    <td>
                        <form action="/carts/edit" method="GET" class="d-inline mx-2">
                            <input type="hidden" name="id" value="{{$cart->id}}">
                            <input type="hidden" name="Quality" value="{{$cart->Quality}}">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                        <form action="/carts/destroy" method="post" class="d-inline mx-2">
                            @csrf
                            {{method_field("delete")}}
                            <input type="hidden" name="id" value="{{$cart->id}}">
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                        <form action="/carts/Buy" method="get" class="d-inline mx-2">
                            @csrf
                            <input type="hidden" name="id" value="{{$cart->id}}">
                            <button type="submit" class="btn btn-success btn-sm">Buy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



</x-layout>
