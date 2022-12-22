 <x-layout>
     @slot('body')
         <div class="py-4">
             {{-- <div class="row justify-content-lg-center">
                 <div class="col-12 mb-4">
                     <div class="card mb-3 border-0 bg-yellow-100 shadow">
                         <div class="card-header d-sm-flex flex-row align-items-center border-yellow-200 flex-0">
                             <div class="d-block mb-3 mb-sm-0">
                                 <div class="fs-5 fw-normal mb-2"> <i class="fas fa-comment-alt-exclamation    "></i> Total
                                     Messages</div> --}}
             {{-- <h2 class="fs-3 fw-extrabold">{{ $total_message }}</h2>  --}}
             {{-- <div class="small mt-2"><span class="fw-normal me-2">Yesterday</span> <span
                                         class="fas fa-angle-up text-success"></span>
                                     <span class="text-success fw-bold">10.57%</span>
                                 </div> --}}
         </div>
         </div>
         <div class="card-body p-2">
             {{-- <div id="chart"></div> --}}
         </div>
         {{-- </div>
                 </div>
             </div> --}}

         {{-- norification section --}}
         {{-- <div class="row">
                 <div class="col-12 col-md-12 col-xxl-4 mb-4">
                     <div class="card mb-3 notification-card mb-3 border-0 shadow">
                         <div class="card-header d-flex align-items-center">
                             <h2 class="fs-5 fw-bold mb-0">Notifications</h2>
                             <div class="ms-auto"><a class="fw-normal d-inline-flex align-items-center"
                                     href="{{ route('messages') }}"> <i class="fa fa-eye" aria-hidden="true"></i> View
                                     all</a></div>
                         </div>
                         <div class="card-body">
                             <div class="list-group list-group-flush list-group-timeline">

                                 @foreach ($messages as $message)
                                     @php
                                         $services = DB::table('services')->find($message->design_id);
                                         $all_users = DB::table('all_users')->find($message->user_id);
                                     @endphp
                                     <div class="list-group-item border-0">
                                         <div class="row ps-lg-1">
                                             <div class="col-auto">
                                                 <div class="icon-shape icon-xs icon-shape-purple rounded">
                                                     <i class="fas fa-comment"></i>
                                                 </div>
                                             </div>
                                             <div class="col ms-n2 mb-3">
                                                 <h3 class="fs-6 fw-bold mb-1">{{ $services->log_title }}</h3>
                                                 <p class="mb-1"> <strong>{{ $all_users->name }}</strong>
                                                     {{ $all_users->phone }} - {{ $all_users->email }}
                                                 </p>
                                                 <div class="d-flex align-items-center"> <i class="fas fa-clock"></i> <span
                                                         class="small"> {{ $message->created_at }}</span></div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                 </div>
             </div> --}}
         {{-- notification section end --}}
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12 col-lg-6 col-xl">

                     <!-- Value  -->
                     <div class="card mb-3 bg-info">
                         <div class="card-body">
                             <div class="row align-items-center gx-0">
                                 <div class="col">

                                     <!-- Title -->
                                     <h6 class="text-uppercase text-muted mb-2 text-white">
                                         Total User's
                                     </h6>

                                     <!-- Heading -->
                                     <span class="h2 mb-0 text-white">
                                         {{ $total_user }} +
                                     </span>


                                 </div>
                                 <div class="col-auto">

                                     <!-- Icon -->
                                     <i class="fas fa-users font-45"></i>

                                 </div>
                             </div> <!-- / .row -->
                         </div>
                     </div>

                 </div>
                 <div class="col-12 col-lg-6 col-xl">

                     <!-- Value  -->
                     <div class="card mb-3 bg-warning">
                         <div class="card-body">
                             <div class="row align-items-center gx-0">
                                 <div class="col">

                                     <!-- Title -->
                                     <h6 class="text-uppercase text-muted mb-2 text-white">
                                         Total Mathe's
                                     </h6>

                                     <!-- Heading -->
                                     <span class="h2 mb-0 text-white">
                                         {{ $total_matches }} +
                                     </span>


                                 </div>
                                 <div class="col-auto">

                                     <!-- Icon -->
                                     <i class="fas fa-bolt font-45"></i>

                                 </div>
                             </div> <!-- / .row -->
                         </div>
                     </div>

                 </div>

                 <div class="col-12 col-lg-6 col-xl">

                     <!-- Value  -->
                     <div class="card mb-3 bg-danger">
                         <div class="card-body">
                             <div class="row align-items-center gx-0">
                                 <div class="col">

                                     <!-- Title -->
                                     <h6 class="text-uppercase text-muted mb-2 text-white">
                                         Total Contest
                                     </h6>

                                     <!-- Heading -->
                                     <span class="h2 mb-0 text-white">
                                         {{ $total_contest }} +
                                     </span>


                                 </div>
                                 <div class="col-auto">
                                     <i class="fas fa-equals font-45"></i>

                                     <!-- Icon -->
                                 </div>
                             </div> <!-- / .row -->
                         </div>
                     </div>

                 </div>
                 <div class="col-12 col-lg-6 col-xl">

                     <!-- Value  -->
                     <div class="card mb-3 bg-primary">
                         <div class="card-body">
                             <div class="row align-items-center gx-0">
                                 <div class="col">

                                     <!-- Title -->
                                     <h6 class="text-uppercase text-muted mb-2 text-white">
                                          Participated 
                                     </h6>

                                     <!-- Heading -->
                                     <span class="h2 mb-0 text-white">
                                         {{ $total_participate }} +
                                     </span>


                                 </div>
                                 <div class="col-auto">

                                     <!-- Icon -->
                                     <i class="fas fa-users font-45"></i>
                                 </div>
                             </div> <!-- / .row -->
                         </div>
                     </div>

                 </div>
                 <div class="col-12 col-lg-6 col-xl">

                    <!-- Value  -->
                    <div class="card mb-3 bg-warning">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-muted mb-2 text-white">
                                        Total Debit
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0 text-white">
                                        {{ $total_debit }} +
                                    </span>


                                </div>
                                <div class="col-auto">

                                    <!-- Icon -->
                                    <i class="fas fa-rupee-sign font-45"></i>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Value  -->
                    <div class="card mb-3 bg-success">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="text-uppercase text-muted mb-2 text-white">
                                        Total Credit
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0 text-white">
                                        {{ $total_credit }} +
                                    </span>


                                </div>
                                <div class="col-auto">

                                    <!-- Icon -->
                                    <i class="fas fa-rupee-sign font-45"></i>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                    </div>

                </div>
             </div> <!-- / .row -->
         </div>
     @endslot
 </x-layout>
