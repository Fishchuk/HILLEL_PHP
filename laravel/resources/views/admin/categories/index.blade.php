
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Title')}}</th>
                        <th scope="col">{{__('Description')}}</th>
                        <th class="text-center" scope="col">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('admin.categories.parts.category_row', $categories, 'category')

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
