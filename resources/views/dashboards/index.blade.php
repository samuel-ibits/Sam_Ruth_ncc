@extends('layouts.backend')

@section('content')
<div class="content">
          <div class="row">
            <!-- Row #1 -->
            <div class="col-6 col-md-4 col-xl-4">
              <a class="block block-rounded text-center" href="{{route('reports.towers.index')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-dusk">
                  <div class="ribbon-box">{{ $towercount }}</div>
                  <p class="mt-2 mb-3">
                    <i class="si si-bar-chart fa-2x text-white-75"></i>
                  </p>
                  <p class="fw-semibold text-white">Towers</p>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
              <a class="block block-rounded text-center" href="{{route('reports.tenants.index')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-dusk">
                <div class="ribbon-box">{{$tenantcount}}</div>
                  <p class="mt-2 mb-3">
                    <i class="si si-bar-chart fa-2x text-white-75"></i>
                  </p>
                  <p class="fw-semibold text-white">Tenants</p>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
              <a class="block block-rounded text-center" href="be_pages_forum_categories.html">
                <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-sea">
                  <div class="ribbon-box">{{$maintenancecount}}</div>
                  <p class="mt-2 mb-3">
                    <i class="si si-bar-chart fa-2x text-white-75"></i>
                  </p>
                  <p class="fw-semibold text-white">Maintenance</p>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
              <a class="block block-rounded text-center" href="{{route('reports.audits.index')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-lake">
                <div class="ribbon-box">{{$auditcount}}</div>
                  <p class="mt-2 mb-3">
                    <i class="si si-bar-chart fa-2x text-white-75"></i>
                  </p>
                  <p class="fw-semibold text-white">Audits</p>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
              <a class="block block-rounded text-center" href="be_comp_charts.html">
                <div class="block-content ribbon ribbon-bookmark ribbon-glass ribbon-left bg-gd-emerald">
                <div class="ribbon-box">{{$insurancecount}}</div>
                  <p class="mt-2 mb-3">
                    <i class="si si-bar-chart fa-2x text-white-75"></i>
                  </p>
                  <p class="fw-semibold text-white">Insurance</p>
                </div>
              </a>
            </div>
            <!-- <div class="col-6 col-md-4 col-xl-2">
              <a class="block block-rounded text-center" href="javascript:void(0)">
                <div class="block-content bg-gd-corporate">
                  <p class="mt-2 mb-3">
                    <i class="si si-settings fa-2x text-white-75"></i>
                  </p>
                  <p class="fw-semibold text-white">Settings</p>
                </div>
              </a>
            </div> -->
            <!-- END Row #1 -->
          </div>
          <!--div class="row items-push">
            <! Row #2 >
            <div class="col-xl-4">
              <a class="block block-rounded block-transparent bg-image d-flex align-items-stretch h-100 mb-0" href="javascript:void(0)" style="background-image: url({{ asset('media/photos/photo32@2x.jpg') }})">
                <div class="block-content block-sticky-options pt-7 bg-black-50">
                  <div class="block-options block-options-left text-white">
                    <div class="block-options-item">
                      <i class="si si-book-open text-white-75"></i>
                    </div>
                  </div>
                  <div class="block-options text-white">
                    <div class="block-options-item">
                      <i class="si si-bubbles"></i> 15
                    </div>
                    <div class="block-options-item">
                      <i class="si si-eye"></i> 3800
                    </div>
                  </div>
                  <h2 class="h3 fw-bold text-white mb-1">Travel the world</h2>
                  <h3 class="fs-base fw-medium text-white-75">Explore and achieve great things</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-4">
              <a class="block block-rounded block-transparent bg-image d-flex align-items-stretch h-100 mb-0" href="javascript:void(0)" style="background-image: url({{ asset('media/photos/photo32@2x.jpg') }})">
                <div class="block-content block-sticky-options pt-7 bg-primary-dark-op">
                  <div class="block-options block-options-left text-white">
                    <div class="block-options-item">
                      <i class="si si-book-open text-white-75"></i>
                    </div>
                  </div>
                  <div class="block-options text-white">
                    <div class="block-options-item">
                      <i class="si si-bubbles"></i> 4
                    </div>
                    <div class="block-options-item">
                      <i class="si si-eye"></i> 1680
                    </div>
                  </div>
                  <h2 class="h3 fw-bold text-white mb-1">Inspiring Solutions</h2>
                  <h3 class="fs-base fw-medium text-white-75">10 things you should do today</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-4">
              <a class="block block-rounded block-transparent bg-image d-flex align-items-stretch h-100 mb-0" href="javascript:void(0)" style="background-image: url({{ asset('media/photos/photo32@2x.jpg') }})">
                <div class="block-content block-sticky-options pt-7 bg-primary-op">
                  <div class="block-options block-options-left text-white">
                    <div class="block-options-item">
                      <i class="si si-book-open text-white-75"></i>
                    </div>
                  </div>
                  <div class="block-options text-white">
                    <div class="block-options-item">
                      <i class="si si-bubbles"></i> 16
                    </div>
                    <div class="block-options-item">
                      <i class="si si-eye"></i> 4450
                    </div>
                  </div>
                  <h2 class="h3 fw-bold text-white mb-1">Alternative Road</h2>
                  <h3 class="fs-base fw-medium text-white-75">Don't let anything disorient you</h3>
                </div>
              </a>
            </div>
            <! END Row #2 >
          </!--div-->
          <div class="row">
            <!-- Row #4 -->
            <div class="col-md-6">
              <a class="block block-rounded">
                <div class="block-content block-content-full">
                  <!-- <i class="si si-game-controller fa-2x text-pulse"></i> -->
                  <div class="fs-sm fw-semibold text-uppercase">Tower Maintenance</div>
                  <div class="row py-3 text-center">
                    <div class="col-6 border-end">
                      <div class="fs-3 fw-semibold">{{$towerWeeklyCount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                    </div>
                    <div class="col-6">
                      <div class="fs-3 fw-semibold">{{$towerMonthlyCount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6">
              <a class="block block-rounded">
                <div class="block-content block-content-full">
                  <div class="text-end">
                    <!-- <i class="si si-wallet fa-2x text-success"></i> -->
                    <div class="fs-sm fw-semibold text-uppercase">Tower Audit</div>
                  </div>
                  <div class="row py-3 text-center">
                    <div class="col-6 border-end">
                      <div class="fs-3 fw-semibold">{{$auditWeeklyCount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-muted">This week</div>
                    </div>
                    <div class="col-6">
                      <div class="fs-3 fw-semibold">{{$auditMonthlyCount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!-- END Row #4 -->
          </div>
          <div class="row">
            <!-- Row #3 -->
            <div class="col-xl-8 d-flex align-items-stretch">
              <div class="block block-rounded block-themed block-mode-loading-dark block-transparent bg-image w-100" style="background-image: url({{ asset('media/photos/photo44.jpg') }})">
                <div class="block-header bg-black-50">
                  <h3 class="block-title">
                    National Tower <small class="text-white">Portal</small>
                  </h3>
                  <!-- <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                    </button>
                    < <button type="button" class="btn-block-option">
                      <i class="si si-wrench"></i>
                    </button> ->
                  </div> -->
                </div>
                <!-- <div class="block-content bg-black-50 p-1">
                  <!- Lines Chart Container functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                  <!-- For more info and examples you can check out http://www.chartjs.org/docs/ ->
                  <canvas id="js-chartjs-dashboard-lines"></canvas>
                </div> -->
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="block block-rounded block-transparent bg-primary-dark d-flex align-items-center w-100">
                <div class="block-content block-content-full">
                  <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fs-3 fw-semibold text-success">{{ $towercount }}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-success-light">Towers</div>
                    </div>
                    <div class="mt-3 d-none d-sm-block">
                      <i class="si si-book-open fa-2x text-success"></i>
                    </div>
                  </div>
                  <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fs-3 fw-semibold text-danger">{{$tenantcount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-danger-light">Tenants</div>
                    </div>
                    <div class="mt-3 d-none d-sm-block">
                      <i class="si si-book-open fa-2x text-danger"></i>
                    </div>
                  </div>
                  <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fs-3 fw-semibold text-warning">{{$maintenancecount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-warning-light">Maintenance</div>
                    </div>
                    <div class="mt-3 d-none d-sm-block">
                      <i class="si si-book-open fa-2x text-warning"></i>
                    </div>
                  </div>
                  <div class="py-3 px-3 border-black-op-b d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fs-3 fw-semibold text-info">{{$auditcount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-info-light">Audits</div>
                    </div>
                    <div class="mt-3 d-none d-sm-block">
                      <i class="si si-book-open fa-2x text-info"></i>
                    </div>
                  </div>
                  <div class="py-3 px-3  d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fs-3 fw-semibold text-elegance">{{$insurancecount}}</div>
                      <div class="fs-sm fw-semibold text-uppercase text-elegance-light">Insurance</div>
                    </div>
                    <div class="mt-3 d-none d-sm-block">
                      <i class="si si-book-open fa-2x text-elegance"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Row #3 -->
          </div>
          <div class="row">
            <!-- Row #4 >
            <div class="col-md-4">
              <div class="block block-rounded block-transparent bg-primary">
                <div class="block-content block-content-full">
                  <div class="py-3 text-center">
                    <div class="mb-3">
                      <i class="fa fa-envelope-open fa-4x text-primary-lighter"></i>
                    </div>
                    <div class="fs-4 fw-semibold text-white">19.5k Subscribers</div>
                    <div class="text-white-75">Your main list is growing!</div>
                    <div class="pt-3">
                      <a class="btn btn-alt-primary" href="javascript:void(0)">
                        <i class="fa fa-cog opacity-50 me-1"></i> Manage list
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="block block-rounded block-transparent bg-info">
                <div class="block-content block-content-full">
                  <div class="py-3 text-center">
                    <div class="mb-3">
                      <i class="fa fab fa-twitter fa-4x text-info-light"></i>
                    </div>
                    <div class="fs-4 fw-semibold text-white">+98 followers</div>
                    <div class="text-white-75">You are doing great!</div>
                    <div class="pt-3">
                      <a class="btn btn-alt-info" href="javascript:void(0)">
                        <i class="fa fa-users opacity-50 me-1"></i> Check them out
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="block block-rounded block-transparent bg-success">
                <div class="block-content block-content-full">
                  <div class="py-3 text-center">
                    <div class="mb-3">
                      <i class="fa fa-check fa-4x text-success-light"></i>
                    </div>
                    <div class="fs-4 fw-semibold text-white">Personal Plan</div>
                    <div class=" text-white-75">This is your current active plan</div>
                    <div class="pt-3">
                      <a class="btn btn-alt-success" href="javascript:void(0)">
                        <i class="fa fa-arrow-up opacity-50 me-1"></i> Upgrade to VIP
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Row #4 -->
          </div>
        </div>
        <!-- END Page Content -->
@endsection
@section('js_after')
<script src="{{ asset('js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>
<!-- <script src="{{ asset('js/pages/be_pages_dashboard.min.js')}}"></script> -->

<!-- Page JS Code -->
{{-- <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script> --}}
<script src="{{ asset('js/pages/be_pages_dashboard.js') }}"></script>
@endsection
