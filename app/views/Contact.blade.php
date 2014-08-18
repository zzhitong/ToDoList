@extends('MasterTemplate.site')
@section('mainContent')

<div class="content">
    <div class="row">
        <h3>My Contact Information:</h3>
        <table class="table">
            <tr>
                <td>Name:</td>
                <td>{{$Contact->getFullName()}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{$Contact->phone}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{$Contact->email}}</td>
            </tr>
        </table>
    </div>
</div>


@stop