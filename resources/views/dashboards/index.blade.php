@extends('layouts.backend')

@section('content')
<div class="content">
  <div class="row">
    <!-- Row #3 -->
    <div class="col-xl-8 d-flex align-items-stretch">
      <div class="block block-rounded block-themed block-mode-loading-dark block-transparent bg-image w-100" style="background-image: url({{ asset('media/photos/photo44.jpg') }}); height:70vh;">
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
    <!-- END Row #3 -->
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