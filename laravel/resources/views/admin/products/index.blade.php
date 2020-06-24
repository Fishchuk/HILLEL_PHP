
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th scope="col">{{__('SKU')}}</th>
                        <th scope="col">{{__('Thumbnail')}}</th>
                        <th scope="col">{{__('Name')}}</th>
                        <th scope="col">{{__('Category')}}</th>
                        <th scope="col">{{__('Small Description')}}</th>
                        <th class="text-center" scope="col">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('admin.products.parts.product_row', $products, 'product')

                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
