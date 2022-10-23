<x-layout>
    @slot('body')

        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg></a></li>
                    <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Withdraw Request</li>
                </ol>
            </nav>


            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0 col-10">
                    <h1 class="h4">Withdraw Request</h1>

                </div>

            </div>
            @if (session('store'))
                <div class="alert alert-success">
                    {{ session('store') }}
                </div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger">
                    {{ session('delete') }}
                </div>
            @endif
            @if (session('update'))
                <div class="alert alert-success">
                    {{ session('update') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-secondary">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('status1'))
                <div class="alert alert-success">
                    {{ session('status1') }}
                </div>
            @endif

        </div>
        </div>
        <div class="card">
            <div class="table-responsive py-4">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead class="text-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>user name </th>
                            <th>Amount </th>
                            <th>Payment type</th>
                            <th>Payment id</th>
                            <th>payment_status</th>
                            <th>approved_by</th>
                            <th>Delete</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot class="text-dark">
                        <tr>
                            <th>S.NO</th>
                            <th>name </th>
                            <th>Amount </th>
                            <th>Payment type</th>
                            <th>Payment id</th>
                            <th>payment_status</th>
                            <th>approved_by</th>

                            <th>Delete</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $withdraw_request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-info"> <a target="_blank"
                                        href="{{ route('one.user', $withdraw_request->user->id) }}">{{ $withdraw_request->user->name }}</a>
                                </td>



                                <td>{{ $withdraw_request->amount }}</td>
                                <td>
                                    {{ $withdraw_request->payment_type }}
                                </td>
                                <td>
                                    {{ $withdraw_request->payment_id }}
                                </td>
                                <td>{{ $withdraw_request->approved_by }}</td>
                                <td>
                                    <select class="form-control form-control-sm" name="" id="">
                                        @if ($withdraw_request->payment_status != '')
                                            <option selected disabled> {{ $withdraw_request->payment_status }} </option>
                                        @else
                                            <option selected disabled>Status</option>
                                        @endif
                                        <option value="success">Success</option>
                                        <option value="padding">pandding</option>
                                        <option value="reject">reject</option>

                                    </select>
                                </td>
                                <td><a href="{{ route('withdraw_request.delete', $withdraw_request->id) }}"
                                        class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>


                                <td><a href="{{ route('withdraw_request.status', $withdraw_request->id) }}"
                                        class="btn @if ($withdraw_request->status == 1) btn-success @endif btn-secondary  btn-sm">
                                        @if ($withdraw_request->status == 1)
                                            Active
                                        @else
                                            Deactive
                                        @endif
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endslot
</x-layout>
