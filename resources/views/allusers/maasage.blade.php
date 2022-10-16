<!-- Large modal -->

<div class="modal fade" id="modal-default{{ $allusers->id }}" tabindex="-1" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title"> Details </h2><button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 border-end"> City : {{ $allusers->city }}
                        <hr>
                        State : {{ $allusers->state }}
                        <hr>
                        Address : {{ $allusers->address }}
                        <hr>
                    </div>

                    <div class="col-6"> Document Type : {{ $allusers->document_type }}
                        <hr>
                        Document : {{ $allusers->document }}
                        <hr>
                        Email Verified : @if ($allusers->document_verified)
                            <span class="btn btn-outline-success btn-sm"> <i class="fas fa-check-circle "></i> Yes {{$allusers->email_verified_at}}</span>
                        @else
                            <span class="btn btn-outline-danger btn-sm"> <i class="fas fa-times-circle"></i> No</span>
                        @endif
                        <hr>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
