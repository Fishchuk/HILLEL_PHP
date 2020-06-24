    <tr>
        <th scope="row">{{$product->SKU}}</th>
        <td><img src="{{Storage::disk('public')->url($product->thumbnail)}}" width="50" height="50"></td>
        <td>{{$product->name}}</td>
        <td><a href="{{route('admin.categories.edit', $product->category->id)}}">{{$product->category->title}}</a></td>
        <td>{{$product->small_description}}</td>

        <td>
            <div style="display: flex; flex-direction: row;align-items: center;justify-content: center">
                <a href="{{route('admin.products.edit', $product)}}"class="btn btn-warning"style="margin-right: 12px">Edit</a>
                <form action="{{route('admin.products.destroy', $errors)}}"method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>

            </div>
        </td>
    </tr>

