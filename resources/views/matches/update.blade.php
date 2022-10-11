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
                    <div class="col-6">
                        <h6 class="m-0 font-weight-bold text-primary">Update {{ $page }} Data </h6>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('matches.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                @csrf
                                <input name="id" type="hidden" value="{{ $data->id }}">

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>url</b> </label>
                                    <input value="{{ $data->url }}" required onchange="fetchApi(this.value)"
                                        onclick="fetchApi(this.value)" name="url" type="text" class="form-control"
                                        placeholder="url">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>name</b> </label>
                                    <input value="{{ $data->name }}" required name="name" type="text"
                                        class="form-control" placeholder="name">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>team one</b> </label>
                                    <input value="{{ $data->teamone }}" required name="teamone" type="text"
                                        value="" class="form-control" placeholder="teamone">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>team two</b> </label>
                                    <input value="{{ $data->teamtwo }}" required name="teamtwo" type="text"
                                        value="" class="form-control" placeholder="teamtwo">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>team one image </b> </label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input value="{{ $data->url }}" accept="image/*"  name="teamoneimg"
                                                type="file" class="form-control" placeholder="teamoneimg	">
                                        </div>
                                        <div class="col-6">
                                            <img src="{{ asset('upload/matches/' . $data->teamoneimg) }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>team two image </b> </label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input value="{{ $data->url }}" accept="image/*"  name="teamtwoimg"
                                                type="file" class="form-control" placeholder="teamtwoimg	">
                                        </div>
                                        <div class="col-6">
                                            <img src="{{ asset('upload/matches/' . $data->teamtwoimg) }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>date</b> </label>
                                    <input value="{{ $data->date }}" required name="date" type="text"
                                        value="" class="form-control" placeholder="date">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>time</b> </label>
                                    <input value="{{ $data->time }}" required name="time" type="text"
                                        value="" class="form-control" placeholder="time">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>vanue</b> </label>
                                    <input value="{{ $data->vanue }}" required name="vanue" type="text"
                                        value="" class="form-control" placeholder="vanue">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="" class="text-dark"> <b>status</b> </label>
                                    <select required name="status" type="text" class="form-control"
                                        placeholder="Title">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea hidden required name="api" type="text" class="form-control" placeholder="api Details">none</textarea>
                                </div>
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
        <script>
            function fetchApi(url) {
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    // getting the data from api
                    obj = JSON.parse(this.responseText);
                    console.log(obj);
                    document.getElementsByName('name')[0].value = obj.info.match
                    document.getElementsByName('teamone')[0].value = obj.teams.teamone
                    document.getElementsByName('teamtwo')[0].value = obj.teams.teamtwo
                    document.getElementsByName('date')[0].value = obj.info.date
                    document.getElementsByName('time')[0].value = obj.info.time
                    document.getElementsByName('vanue')[0].value = obj.info.venue

                }
                var data = {
                    url: url,
                    _token: '7dWGsJjuB7dUGW3K8Es4vm8SFj1Gxq77Ilp9ckWH'
                };
                xhttp.open("POST", "{{ route('matches') }}/api", true);
                xhttp.setRequestHeader("Content-Type", "application/json");
                xhttp.send(JSON.stringify(data));
            }
        </script>
    @endslot
</x-layout>
