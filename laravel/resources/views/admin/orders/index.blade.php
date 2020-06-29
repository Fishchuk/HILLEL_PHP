
@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('User Name')}}</th>
                        <th scope="col">{{__('User Surname')}}</th>
                        <th scope="col">{{__('User Email')}}</th>
                        <th scope="col">{{__('User Phone')}}</th>
                        <th scope="col">{{__('Country')}}</th>
                        <th scope="col">{{__('City')}}</th>
                        <th scope="col">{{__('Address')}}</th>
                        <th scope="col">{{__('Total')}}</th>
                        <th class="text-center" scope="col">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @each('admin.orders.parts.order_row', $orders, 'order')

                    </tbody>

                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection
