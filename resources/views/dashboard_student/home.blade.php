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
                        <a class="nav-link" id="subjects-tab" data-toggle="tab" href="#subjects" role="tab"
                           aria-controls="subjects" aria-selected="true">Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Recommended Books</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        {{--Profile Tab...--}}
                        <br>

                        @if (is_null(Auth::user()->avatar))
                            <form id="file-upload-form" class="uploader" action="{{route('update_avatar')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                @csrf
                                <input id="file-upload" type="file" name="{{ \App\Utils\Constants::DBC_AVATAR }}" accept="image/*" onchange="readURL(this);">
                                <label for="file-upload" id="file-drag">
                                    <img id="file-image" src="#" alt="Preview" class="hidden">
                                    <div id="start" >
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                        <div>Select a file or drag here</div>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                        <br>
                                        <span class="text-danger">{{ $errors->first( \App\Utils\Constants::DBC_AVATAR ) }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </label>
                            </form>
                        @else
                            <img src="{{ asset('storage/'.Auth::user()->avatar) }}" width="120px" height="120px">
                        @endif
                        <br>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">Personal Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">REG NO</th>
                                <td>{{ Auth::user()->reg_code ?? '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ Auth::user()->email ?? '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Full Name</th>
                                <td>{{ (Auth::user()->first_name . ' ' . Auth::user()->last_name) ??  ('Unknown User') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ Auth::user()->gender ?? ''}}</td>
                            </tr>
                            <tr>
                                <th scope="row">User Type</th>
                                <td>{{ Auth::user()->type ?? '' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="subjects" role="tabpanel" aria-labelledby="subjects-tab">

                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">C.A. Test (30)</th>
                                <th scope="col">Exam (70)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mathematics</td>
                                <td>20</td>
                                <td>59</td>
                            </tr>
                            </tbody>
                        </table>
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
                                {{--<td>{{ $user['']}} 28-Dec-2019</td>--}}
                            </tr>
                            <tr>
                                <th scope="row">Time</th>
                                {{--<td>{{ $user['']}} 12:00 pm</td>--}}
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
