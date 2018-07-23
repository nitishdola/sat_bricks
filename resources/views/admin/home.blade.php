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
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header p-t-25 p-b-20"><span class="">LIST OF UNPAID CUSTOMERS</span></h5>
                
                <div class="card-body">
                    <div class="notice error"><p>Tridib Kakoty. Hajo. Ph - 98765433332 | <strong>Amount : 98000.00</strong></p></div>

                    <div class="notice error"><p>Khairul Islam. Suwalkuchi. Ph - 9234234234 | <strong>Amount : 800.00</strong></p></div>

                    <div class="notice error"><p>Hafiz Ali. Guwahati. Ph - 3453453453 | <strong>Amount : 18000.00</strong></p></div>

                    <div class="notice error"><p>Al Amin. Hajo. Ph - 34534534534 | <strong>Amount : 100000.00</strong></p></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
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
                    <h5 class="card-title border-none text-white p-l-20 p-t-20 m-b-0">Total Dadon Advances</h5>
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
                    <h5 class="card-title border-none text-white p-l-20 p-t-20  m-b-0">Sales Report</h5>
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

@section('pageCss')
<style>
.notice {
  position: relative;
  margin: 1em;
  background: #F9F9F9;
  padding: 1em 1em 1em 2em;
  border-left: 4px solid #DDD;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
}

.notice:before {
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: -17px;
  background-color: #DDD;
  color: #FFF;
  width: 30px;
  height: 30px;
  border-radius: 100%;
  text-align: center;
  line-height: 30px;
  font-weight: bold;
  font-family: Georgia;
  text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
}

.info {
  border-color: #0074D9;
}

.info:before {
  content: "i";
  background-color: #0074D9;
}

.success {
  border-color: #2ECC40;
}

.success:before {
  content: "√";
  background-color: #2ECC40;
}

.warning {
  border-color: #FFDC00;
}

.warning:before {
  content: "!";
  background-color: #FFDC00;
}

.error {
  border-color: #FF4136;
}

.error:before {
  content: "X";
  background-color: #FF4136;
}
</style>
@stop
