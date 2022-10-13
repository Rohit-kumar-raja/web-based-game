<x-layout>
    @slot('body')
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i class="fas fa-home    "></i> </a></li>
                    <li class="breadcrumb-item"><a href="#">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0 col-10">
                    <h1 class="h4">{{ $page }}</h1>
                </div>

            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 row">
                    <div class="col-10">
                        <h6 class="m-0 font-weight-bold text-primary">Update </h6>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('contest') }}" class="m-0 font-weight-bold text-success"> <i
                                class="fas fa-arrow-left"></i> Go To {{ $page }} </a>
                    </div>
                </div>

                <!-- Large modal -->



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
                <div class="modal-body">
                    <form action="{{ route('matches.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="id" value={{ $data->id }}>

                                <input type="hidden" name="created_at" value={{ date('Y-m-d') }}>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>type</b> </label>
                                    <select required name="matches_id" class="form-control">

                                        @foreach ($matches as $data1)
                                            @if ($data1->id == $data->matches_id)
                                            <option value="{{ $data1->id }}">{{ $data1->name }}</option>
                                            @else
                                                <option value="{{ $data1->id }}">{{ $data1->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>name</b> </label>
                                    <input value="{{ $data->name }}"  required  onkeyup="url_data(this.value)" name="name" type="text"
                                        class="form-control" placeholder="name">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b> total_price </b> </label>
                                    <input value="{{ $data->total_price }}" required id="url" name="total_price" type="number" class="form-control"
                                        placeholder="total_price">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b> no_of_participate </b> </label>
                                    <input value="{{ $data->no_of_participate }}" name="no_of_participate" type="number" class="form-control"
                                        placeholder="No Of Participate">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>
                                            participate_amount </b> </label>
                                    <input value="{{ $data->participate_amount }}" name="participate_amount" type="number" class="form-control"
                                        placeholder="participate_amount">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b> 
                                            no_of_winnners </b> </label>
                                    <input value="{{ $data->no_of_winnners }}" name="no_of_winnners" type="number" class="form-control"
                                        placeholder=" no_of_winnners ">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b> 
                                            percentage_of_winners </b> </label>
                                    <input value="{{ $data->percentage_of_winners }}" name="percentage_of_winners" type="text" class="form-control"
                                        placeholder=" percentage_of_winners ">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b> 
                                            no_scratch_card_in_one </b> </label>
                                    <input value="{{ $data->no_scratch_card_in_one }}" name="no_scratch_card_in_one" type="number" class="form-control"
                                        placeholder=" no_scratch_card_in_one ">
                                </div>


                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>status</b> </label>
                                    <select required name="status" type="text" class="form-control"
                                        placeholder="Title">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>

                                <table class="table table-bordered table-responsive mt-3" id="dynamic_field"
                                    style="overflow-y:auto;">
                                    <thead>
                                        <tr>
                                            <th> Item No.</th>
                                            <th> from </th>
                                            <th> to</th>
                                            <th> prize_amount</th>
                                            <th> Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rank as $wrank)
                                            <tr id="row{{ $loop->iteration }}">
                                                <td width="2%"><input type="text" id="slno1"
                                                        value="{{ $loop->iteration }}" readonly
                                                        class="form-control form-control-sm slno" style="border:none;" />
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm from" type='number'
                                                        value="{{ $wrank->from }}" size="7" name="from[]"
                                                        id="from" />
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm to" id="to"
                                                        value="{{ $wrank->to }}" type='number' name="to[]">

                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm to" id="prize_amount"
                                                        value="{{ $wrank->prize_amount }}" type='number'
                                                        name="prize_amount[]">

                                                </td>
                                                <td>
                                                    @if ($loop->iteration == 1)
                                                        <button type="button" name="add" id="add"
                                                            class="btn btn-success btn-sm"><i class="fa fa-plus"
                                                                aria-hidden="true"></i></button>
                                                    @else
                                                        <button type="button" name="remove"
                                                            id="{{ $loop->iteration }}"class="btn btn-danger btn_remove btn-sm">X</button>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    @endslot
</x-layout>
<script>
    // function url_data(data) {
    //     document.getElementById('url').value = data.replaceAll(' ', '+')

    // }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    var loop = 0;
    $(document).ready(function() {
        var i = document.getElementsByClassName('slno').length;


        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added  " ><td><input type="text" id="slno' + i + '" value="' + i +
                '" readonly class="form-control form-control-sm" style="border:none;" /></td> <td> <input class="form-control form-control-sm from" type="number" size="7" name="from[]"  /> </td><td>   <input class="form-control form-control-sm to" type="number"  name="to[]" /> </td>    <td> <input class="form-control form-control-sm to" type="number"  id="prize_amount"  name="prize_amount[]"> </td> <td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove btn-sm">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            document.getElementsByClassName('from')[button_id - 1].value = ''
            i--;

            $('#row' + button_id + '').hide();
        });

    });
</script>
