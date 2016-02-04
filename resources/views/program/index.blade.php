@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">

                @include('includes.status')

                <a class="btn btn-primary" style="margin-bottom: 25px" href="{{route('program.create')}}">Add New Program</a>

                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>Program Name</th>
                                </tr>
                            </thead>
                            @foreach ($programs as $program)
                                <tr>
                                    <td><a href="{{route('program', $program['slug'])}}">{{$program['titleStrong']}} {{$program['title']}}</td>
                                    <td class="text-center">
                                        <div class="col-md-6">
                                            <a class='btn btn-primary btn-xs' href="{{route('program.edit', $program['slug'])}}" style="width:100%"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        </div>

                                        <div class="col-md-6">
                                            {!! Form::open(['route' => ['program.destroy', $program['id']], 'style' => 'float: right;width: 100%', 'method' => 'DELETE']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'style' => 'width:100%']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                {{-- <div class="panel panel-default">
                    <div class="panel-heading">Alt Layout (Not editable yet)</div>

                    <div class="panel-body">
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>Address</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/hotel-casino-employee-program">Hotel &amp; Casino Employee Home Assistance Program</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/cosmopolitan-program">Home Assistance Program offered to Cosmopolitan Employees</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/las-vegas-incentive-program">Las Vegas Incentive Home Assistance Program</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/teachers-program">Teachers Home Assistance Program</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/southwest-airlines-program">Clear Skies Housing Assistance Program</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/doctors-reward-home-program">Doctor&#039;s Reward Home Assistance Program</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/nurses-program">Nurses Home Assistance Program</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://jacobsgroupvegas.com/programs/newlywed-program">Newlywed Home Assistance Program</a>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
