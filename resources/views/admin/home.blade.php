@extends('admin.layout.default')

@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks Dashboard</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </nav>
    </div>
</div>
@stop

@section('main_content')

<section class="page-content">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <h5 class="card-header p-t-25 p-b-20"><span class="">Traffic Sources</span></h5>
                <div class="card-toolbar top-right">
                    <ul class="nav nav-pills nav-pills-primary justify-content-end" id="pills-demo-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Month</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Year</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent-1">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1">
                            <ul class="list-reset list-inline-block m-b-15">
                                <li class="m-r-5">
                                    <span><i class="badge badge-info badge-circle w-10 h-10 m-r-10"></i>Direct</span>
                                </li>
                                <li class="m-r-5">
                                    <span><i class="badge badge-success badge-circle w-10 h-10 m-r-10"></i>Referral</span>
                                </li>
                            </ul>
                            <div class="ct-chart" id="traffic-week" style="height: 350px;"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2">
                            <ul class="list-reset list-inline-block m-b-15">
                                <li class="m-r-5">
                                    <span><i class="badge badge-info badge-circle w-10 h-10 m-r-10"></i>Direct</span>
                                </li>
                                <li class="m-r-5">
                                    <span><i class="badge badge-success badge-circle w-10 h-10 m-r-10"></i>Referral</span>
                                </li>
                            </ul>
                            <div class="ct-chart" id="traffic-month" style="height: 350px;"></div>
                        </div>
                        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3">
                            <ul class="list-reset list-inline-block m-b-15">
                                <li class="m-r-5">
                                    <span><i class="badge badge-info badge-circle w-10 h-10 m-r-10"></i>Direct</span>
                                </li>
                                <li class="m-r-5">
                                    <span><i class="badge badge-success badge-circle w-10 h-10 m-r-10"></i>Referral</span>
                                </li>
                            </ul>
                            <div class="ct-chart" id="traffic-year" style="height: 350px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card bg-primary" id="totalVisitsChart">
                <div class="card-body p-0">
                    <div class="card-toolbar top-right">
                        <ul class="nav nav-pills nav-pills-light justify-content-end" id="total-visits-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="total-visits-link-1" data-toggle="pill" href="#total-visits-tab-1" role="tab" aria-controls="total-visits-tab-1" aria-selected="true">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="total-visits-link-2" data-toggle="pill" href="#total-visits-tab-2" role="tab" aria-controls="total-visits-tab-2" aria-selected="false">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="total-visits-link-3" data-toggle="pill" href="#total-visits-tab-3" role="tab" aria-controls="total-visits-tab-3" aria-selected="false">Year</a>
                            </li>
                        </ul>
                    </div>
                    <h5 class="card-title border-none text-white p-l-20 p-t-20 m-b-0">Total Visits</h5>
                    <div class="tab-content" id="total-visits-tab-content">
                        <div class="tab-pane fade show active" id="total-visits-tab-1" role="tabpanel" aria-labelledby="total-visits-tab-1">
                            <span class="card-title text-white font-size-40 font-w-300 p-l-20 counter" data-count="3233">0</span>
                        </div>
                        <div class="tab-pane fade" id="total-visits-tab-2" role="tabpanel" aria-labelledby="total-visits-tab-2">
                            <span class="card-title text-white font-size-40 font-w-300 p-l-20 counter" data-count="7933">0</span>
                        </div>
                        <div class="tab-pane fade" id="total-visits-tab-3" role="tabpanel" aria-labelledby="total-visits-tab-3">
                            <span class="card-title text-white font-size-40 font-w-300 p-l-20 counter" data-count="15423">0</span>
                        </div>
                    </div>
                    <div class="ct-chart h-75 m-t-40"></div>
                </div>
            </div>
            <div class="card bg-accent" id="totalUniqueVisitsChart">
                <div class="card-body p-0">
                    <div class="card-toolbar top-right">
                        <ul class="nav nav-pills nav-pills-light justify-content-end" id="total-uniquevisits-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="total-uniquevisits-link-1" data-toggle="pill" href="#total-uniquevisits-tab-1" role="tab" aria-controls="total-uniquevisits-tab-1" aria-selected="true">Week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="total-uniquevisits-link-2" data-toggle="pill" href="#total-uniquevisits-tab-2" role="tab" aria-controls="total-uniquevisits-tab-2" aria-selected="false">Month</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="total-uniquevisits-link-3" data-toggle="pill" href="#total-uniquevisits-tab-3" role="tab" aria-controls="total-uniquevisits-tab-3" aria-selected="false">Year</a>
                            </li>
                        </ul>
                    </div>
                    <h5 class="card-title border-none text-white p-l-20 p-t-20  m-b-0">Unique Visits</h5>
                    <div class="tab-content" id="total-uniquevisits-tab-content">
                        <div class="tab-pane fade show active" id="total-uniquevisits-tab-1" role="tabpanel" aria-labelledby="total-uniquevisits-tab-1">
                            <span class="card-title text-white font-size-40 font-w-300 p-l-20 counter" data-count="1943">0</span>
                        </div>
                        <div class="tab-pane fade" id="total-uniquevisits-tab-2" role="tabpanel" aria-labelledby="total-uniquevisits-tab-2">
                            <span class="card-title text-white font-size-40 font-w-300 p-l-20 counter" data-count="3213">0</span>
                        </div>
                        <div class="tab-pane fade" id="total-uniquevisits-tab-3" role="tabpanel" aria-labelledby="total-visits-tab-3">
                            <span class="card-title text-white font-size-40 font-w-300 p-l-20 counter" data-count="7713">0</span>
                        </div>
                    </div>
                    <div class="ct-chart h-75 m-t-40"></div>
                </div>
            </div>
        </div>
    </div>
</section>
                
@endsection
