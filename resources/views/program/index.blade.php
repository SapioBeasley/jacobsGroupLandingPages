@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @if (Session::has('success_message'))
                    {{Session::get('success_message')}}
                @endif

                <a class="btn" href="{{route('program.create')}}">Add New Property</a>

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
                                        <a class='btn btn-info btn-xs' href="{{route('program.edit', $program['id'])}}" style="    float: right;margin-left: 10px;"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        {!! Form::open(['route' => ['program.destroy', $program['id']], 'style' => 'float: right;width: 50px', 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
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
                </div>
            </div>
        </div>
    </div>
@endsection
