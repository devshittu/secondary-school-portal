@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Exam Schedule</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        {{--Profile Tab...--}}
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">Student Personal Details</th>
                                {{--<th scope="col">First</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">REG NO</th>
                                <td>{{ $user['reg_code']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $user['email']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Full Name</th>
                                <td>{{ $user['first_name'] . ' ' .  $user['last_name']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ $user['gender']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">User Type</th>
                                <td>{{ $user['type']}}</td>
                            </tr>
                            {{--<tr>
                                <th scope="row"></th>
                                <td>{{ $user['']}}</td>
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        ... Home tab
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">Exam Schedule</th>
                                {{--<th scope="col">First</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Exam Date</th>
                                <td>{{ $user['']}} 28-Dec-2019</td>
                            </tr>
                            <tr>
                                <th scope="row">Time</th>
                                <td>{{ $user['']}} 12:00 pm</td>
                            </tr>
                            {{--<tr>
                                <th scope="row"></th>
                                <td>{{ $user['']}}</td>
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
