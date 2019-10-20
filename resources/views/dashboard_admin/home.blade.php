@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill"
                               href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                               aria-selected="true">Users</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                               role="tab" aria-controls="v-pills-profile" aria-selected="false">Link</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                               role="tab" aria-controls="v-pills-messages" aria-selected="false">Link</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                               role="tab" aria-controls="v-pills-settings" aria-selected="false">Link</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                                 aria-labelledby="v-pills-home-tab">


                                <br>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">REG CODE</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($users) == 0)
                                        <p>No user exist {{ $user->id }}</p>
                                    @else
                                        @foreach ($users as $u)
                                            <tr>
                                                <th scope="row">{{ $u->id }}</th>
                                                <td>{{ $u->reg_code }}</td>
                                                <td>{{ $u->first_name . ' ' . $u->last_name }}</td>
                                                <td><a href="{{ $u->id }}" class="btn btn-dark btn-sm"> View</a></td>
                                            </tr>
                                        @endforeach

                                    @endif
                                    </tbody>
                                </table>
                                <p>More functionality is coming.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                 aria-labelledby="v-pills-profile-tab">
                                <p>More functionality is coming.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                 aria-labelledby="v-pills-messages-tab">
                                <p>More functionality is coming.</p>

                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                 aria-labelledby="v-pills-settings-tab">
                                <p>More functionality is coming.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
        </div>
    </div>
@endsection
