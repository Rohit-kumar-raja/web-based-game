<!-- Large modal -->

<div class="modal fade" id="modal-default" tabindex="-1" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title"> Add {{ $page }} </h2><button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('matches.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <input type="hidden" name="created_at" value={{ date('Y-m-d') }}>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>url</b> </label>
                                <input required onchange="fetchApi(this.value)" onclick="fetchApi(this.value)"
                                    name="url" type="text" class="form-control" placeholder="url">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>name</b> </label>
                                <input required  name="name" type="text" class="form-control" placeholder="name">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>team one</b> </label>
                                <input required name="teamone" type="text" value="" class="form-control"
                                    placeholder="teamone">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>team two</b> </label>
                                <input required name="teamtwo" type="text" value="" class="form-control"
                                    placeholder="teamtwo">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>team one image </b> </label>
                                <input accept="image/*" required name="teamoneimg" type="file" class="form-control"
                                    placeholder="teamoneimg	">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>team two image </b> </label>
                                <input accept="image/*" required name="teamtwoimg" type="file" class="form-control"
                                    placeholder="teamtwoimg	">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>date</b> </label>
                                <input required name="date" type="text" value="" class="form-control"
                                    placeholder="date">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>time</b> </label>
                                <input required name="time" type="text" value="" class="form-control"
                                    placeholder="time">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>venue</b> </label>
                                <input required name="venue" type="text" value="" class="form-control"
                                    placeholder="venue">
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
</div>

<script>
    function fetchApi(url) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            // getting the data from api
            obj=JSON.parse(this.responseText);
            console.log(obj);
            document.getElementsByName('name')[0].value=obj.info.match
            document.getElementsByName('teamone')[0].value=obj.teams.teamone
            document.getElementsByName('teamtwo')[0].value=obj.teams.teamtwo
            document.getElementsByName('date')[0].value=obj.info.date
            document.getElementsByName('time')[0].value=obj.info.time
            document.getElementsByName('venue')[0].value=obj.info.venue

        }
        var data = {
            url: url,
            _token: '7dWGsJjuB7dUGW3K8Es4vm8SFj1Gxq77Ilp9ckWH'
        };
        xhttp.open("POST", "{{ route('matches.fatch.api') }}", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify(data));
    }
</script>
