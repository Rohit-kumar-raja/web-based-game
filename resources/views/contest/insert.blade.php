<!-- Large modal -->
<x-layout>
    @slot('body')
        <div class="modal-content mt-5 ">

            <div class="row p-3">
                <div class="col-10">
                    <h2 class="h6 modal-title"> Add {{ $page }} </h2>
                </div>
                <div class="col-2">
                    <a class="btn btn-sm btn-secondary" href="{{ route('matches') }}"> <i class="fa fa-arrow-left"
                            aria-hidden="true"></i> All
                        {{ $page }}</a>
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
            <div class="modal-body">
                <form action="{{ route('contest.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="created_at" value={{ date('Y-m-d') }}>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Matches</b> </label>
                                <select id="matches" required onchange="setName(this)" name="matches_id"
                                    class="form-control">
                                    <option selected disabled> -Select- </option>

                                    @foreach ($matches as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>name</b> </label>
                                <input id="name" required onkeyup="url_data(this.value)" name="name" type="text"
                                    class="form-control" placeholder="name">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b><i class="fas fa-rupee-sign"></i> total price
                                    </b> </label>
                                <input id="total_price" required id="url" name="total_price" type="number"
                                    class="form-control" placeholder="total price">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> <i class="far fa-users"></i> no of participate
                                    </b> </label>
                                <select id="no_of_participate" name="no_of_participate" type="number" class="form-control"
                                    placeholder="no of participate"> 
                                <option value="15">15</option>
                                <option value="28">28</option>

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>
                                        <i class="fas fa-users"></i> no of winnners </b> </label>
                                <input id="no_of_winnners" name="no_of_winnners" type="number" class="form-control"
                                    placeholder="  no of winnners ">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>
                                        % percentage of winners </b> </label>
                                <input onkeyup="winnerPercentage()" onclick="winnerPercentage()" id="percentage_of_winners"
                                    required name="percentage_of_winners" type="text" class="form-control"
                                    placeholder="  percentage of winners  ">
                            </div>


                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>
                                        <i class="fad fa-rupee-sign"></i> participate amount </b> </label>
                                <input name="participate_amount" type="number" class="form-control"
                                    placeholder=" participate amount">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>
                                        no scratch card in one </b> </label>
                                <input required name="no_scratch_card_in_one" type="number" class="form-control"
                                    placeholder=" no scratch card in one ">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>status</b> </label>
                                <select required name="status" type="text" class="form-control" placeholder="Title">
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
                                    <tr>
                                        <td width="2%"><input type="text" id="slno1" value="1" readonly
                                                class="form-control form-control-sm" style="border:none;" /></td>
                                        <td>
                                            <input class="form-control form-control-sm from" type='number'
                                                size="7" name="from[]" id="from[]" />
                                        </td>
                                        <td>
                                            <input required class="form-control form-control-sm to" id="to"
                                                type='number' name="to[]">

                                        </td>
                                        <td>
                                            <input required onkeyup="totalPrice()"
                                                class="form-control form-control-sm prize" id="prize_amount"
                                                type='number' name="prize_amount[]">

                                        </td>
                                        <td><button type="button" name="add" id="add"
                                                class="btn btn-success btn-sm"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>

            </form>
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
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added  " ><td><input type="text" id="slno' + i + '" value="' + i +
                '" readonly class="form-control form-control-sm" style="border:none;" /></td> <td> <input class="form-control form-control-sm from" type="number" size="7" name="from[]"  /> </td><td>   <input class="form-control form-control-sm to" type="number"  name="to[]" /> </td>    <td> <input class="form-control form-control-sm prize" type="number"  id="prize_amount"   onkeyup="totalPrice()" name="prize_amount[]"> </td> <td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove btn-sm">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            i--;

            $('#row' + button_id + '').remove();
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
            prize_rank_amount[prize_rank_amount.length-1].value = '';
        }
    }
</script>
