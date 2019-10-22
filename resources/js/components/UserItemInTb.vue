<template>
    <tr>
        <!--<th scope="row">{{ userItem.id }}</th>-->
        <th scope="row">{{ userItem['id'] }}</th>
        <td>{{ userItem.reg_code }}</td>
        <td> {{ userItem.full_name }}</td>
        <!--<td>

            &lt;!&ndash; Button trigger modal &ndash;&gt;
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#candidateModal{{ userItem.id }}">
                Update Score
            </button>
            &lt;!&ndash; Modal For adding score &ndash;&gt;
            <div class="modal fade" id="{{ 'candidateModal' + userItem.id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'candidateModalTitle' + userItem.id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{ 'candidateModalTitle' + userItem.id }}"> {{ userItem.full_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="update-score-form-{{ userItem.id }}" action="{{ route('update_candidate_score', ['user_id' => userItem.id]) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="score">Score</label>
                                    <input type="number" name="score" value="{{ userItem.candidate_profile.exam_score }}" onblur="checkScore(this)" class="form-control" id="score" placeholder="0-100">
                                    <input type="hidden" name="is_admitted" value="0" class="form-control" id="is_admitted{{userItem.id}}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                    onclick="event.preventDefault();
                                                                            document.getElementById('update-score-form-{{ userItem.id }}' ).submit();">
                                Save</button>
                            <button id="saveAndOfferAdmission{{userItem.id}}" type="button" class="btn btn-success" style="display: block"
                                    onclick="event.preventDefault();
                                                                            document.getElementById('update-score-form-{{ userItem.id }}' ).submit();">
                                Save & Offer Admission</button>
                        </div>
                    </div>

                </div>
            </div>


        </td>-->
    </tr>
</template>

<script>
    export default {
        name: 'user-item-in-tb',
        props: [
            'userItem'
        ],
        mounted() {
            console.log('user-item-in-tb Component mounted.')
        }
    }
</script>
