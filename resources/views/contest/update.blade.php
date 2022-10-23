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
                    <form action="{{ route('contest.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="id" value={{ $data->id }}>

                                <input type="hidden" name="created_at" value={{ date('Y-m-d') }}>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>type</b> </label>
                                    <select required id="matches" name="matches_id" class="form-control">

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
                                    <input id="name" value="{{ $data->name }}" required
                                        onkeyup="url_data(this.value)" name="name" type="text" class="form-control"
                                        placeholder="name">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b> total price </b> </label>
                                    <input id="total_price" value="{{ $data->total_price }}" required id="url"
                                        name="total_price" type="number" class="form-control" placeholder="total_price">
                                </div>
                                <select id="no_of_participate" name="no_of_participate" type="number" class="form-control"
                                    placeholder="no of participate">
                                    <option value="{{$data->no_of_participate}}">{{$data->no_of_participate}}</option>
                                    <option value="15">15</option>
                                    <option value="28">28</option>

                                </select>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>
                                            participate amount </b> </label>
                                    <input id="participate_amount" required value="{{ $data->participate_amount }}"
                                        name="participate_amount" type="number" class="form-control"
                                        placeholder="participate amount">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>
                                            no of winnners </b> </label>
                                    <input id="no_of_winnners" required value="{{ $data->no_of_winnners }}"
                                        name="no_of_winnners" type="number" class="form-control"
                                        placeholder=" no of winnners ">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>
                                            percentage of winners </b> </label>
                                    <input id="percentage_of_winners" required value="{{ $data->percentage_of_winners }}"
                                        name="percentage_of_winners" type="text" class="form-control"
                                        placeholder=" percentage of winners ">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>
                                            no scratch card in one </b> </label>
                                    <input required value="{{ $data->no_scratch_card_in_one }}"
                                        name="no_scratch_card_in_one" type="number" class="form-control"
                                        placeholder=" no scratch card in one ">
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
                                            <th> prize amount</th>
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
                                                    <input class="form-control form-control-sm to" id="to" required
                                                        value="{{ $wrank->to }}" type='number' name="to[]">

                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm to" id="prize_amount"
                                                        value="{{ $wrank->prize_amount }}" type='number' required
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

    function setName(name) {
        var Index = document.getElementById('matches').selectedIndex;
        document.getElementById('name').value = name[Index].innerText;
    }

    function winnerPercentage() {
        var no_of_participate = document.getElementById('no_of_participate').value
        var no_of_winnners = document.getElementById('no_of_winnners').value
        var percentage = (Number(no_of_winnners) / Number(no_of_participate)) * 100
        document.getElementById('percentage_of_winners').value = percentage;
    }

    function totalPrice() {
        total_prize_rank_amount = 0;

        var prize_rank_amount = document.getElementsByClassName('prize');
        var total_price = document.getElementById('total_price').value;
        for (i = 0; i < prize_rank_amount.length; i++) {

            total_prize_rank_amount = total_prize_rank_amount + Number(prize_rank_amount[i].value)
        }
        console.log(total_price);
        console.log(total_prize_rank_amount);

        if (total_prize_rank_amount > total_price) {
            alert('Please Enter Amount less than or equal to ' + total_price)
            prize_rank_amount[prize_rank_amount.length - 1].value = '';
        }
    }
</script>
