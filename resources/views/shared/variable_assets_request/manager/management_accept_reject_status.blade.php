@if ($request_info->management_accept_reject_status == 'accept')
    <a href="#">
        <div class="d-flex flex-column w-100">
            <div class="d-flex justify-content-between mb-1">
                <span>{{ ucfirst($request_info->management_accept_reject_status) }}</span>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-success" style="width: 100%" role="progressbar" aria-valuenow="100"
                    aria-valuemin="100" aria-valuemax="100"></div>
            </div>
            <span style="font-size: 12px;">
                {{ $request_info->management_accept_reject_date }}
            </span>
        </div>
    </a>
@elseif ($request_info->management_accept_reject_status == 'reject')
    <a href="#" data-bs-toggle="modal" data-bs-target="#managementmodalCenter-{{ $request_info->id }}">
        <div class="d-flex flex-column w-100">
            <div class="d-flex justify-content-between mb-1">
                <span>{{ ucfirst($request_info->management_accept_reject_status) }}</span>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-danger" style="width: 100%" role="progressbar" aria-valuenow="100"
                    aria-valuemin="100" aria-valuemax="100"></div>
            </div>
            <span style="font-size: 12px;">
                {{ $request_info->management_accept_reject_date }}
            </span>
        </div>
    </a>
@else
    <a href="#" data-bs-toggle="modal" data-bs-target="#managementmodalCenter-{{ $request_info->id }}">
        <div class="d-flex flex-column w-100">
            <div class="d-flex justify-content-between mb-1">
                <span>Unknown</span>
            </div>
            <div class="progress" style="height: 3px;">
                <div class="progress-bar bg-danger" style="width: 100%" role="progressbar" aria-valuenow="100"
                    aria-valuemin="100" aria-valuemax="100"></div>
            </div>
        </div>
    </a>
@endif

<div class="col-lg-4 col-md-6">
    <form class="manage_accept_reject_save" action="#" method="POST" id="create-form">
        @csrf
        <div>
            <div class="modal fade" id="managementmodalCenter-{{ $request_info->id }}" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="managementmodalCenterTitle">
                                Accept / Reject
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3">
                                    <input type="hidden" value="{{ $request_info->id }}" name="request_info_id"
                                        required id="request_info_id">
                                    <select class="form-select" name="management_accept_reject_status" required
                                        id="management_accept_reject_status">
                                        <option selected="" value="">--Select Status--</option>
                                        <option value="accept" @if ($request_info->management_accept_reject_status == 'accept') selected @endif>Accept
                                        </option>
                                        <option value="reject" @if ($request_info->management_accept_reject_status == 'reject') selected @endif>Reject
                                        </option>
                                    </select>
                                    <br>
                                    <input type="text" placeholder="Remark" name="remark" class="form-control"
                                        id="remark">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreManagementVariableAcceptRejectStatus', '#create-form') !!}
@endsection
