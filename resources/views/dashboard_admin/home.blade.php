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
                                                <td>

                                                    @if ($u->type === 'candidate')
                                                    {{--<a href="{{ $u->id }}" class="btn btn-dark btn-sm"> View</a>--}}
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalScrollable{{ $u->id }}">
                                                        Update Score
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalScrollable{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle{{ $u->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle{{ $u->id }}"> {{ $u->full_name }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form id="update-score-form-{{ $u->id }}" action="{{ route('update_candidate_score', ['user_id' => $u->id]) }}" method="POST">
                                                                        @csrf

                                                                        <div class="form-group">
                                                                            <label for="score">Score</label>
                                                                            <input type="number" name="score" value="{{ $u->candidate_profile->exam_score }}" class="form-control" id="score" placeholder="0-100">
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-success"
                                                                            onclick="event.preventDefault();
                                                                            document.getElementById('update-score-form-{{ $u->id }}' ).submit();">
                                                                        Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif


                                                </td>
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
