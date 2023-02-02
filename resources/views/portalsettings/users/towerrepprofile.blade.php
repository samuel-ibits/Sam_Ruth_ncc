@extends('layouts.backend')

@section('content')

<!-- User Info -->
<div class="bg-image bg-image-bottom" style="background-image: url('{{ asset('media/photos/photo13@2x.jpg')}}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Avatar -->
            <div class="mb-15">
                <a class="img-link" href="be_pages_generic_profile.html">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('media/avatars/avatar15.jpg')}}" alt="">
                </a>
            </div>
            <!-- END Avatar -->

            <!-- Personal -->
            <h1 class="h3 text-white font-w700 mb-10">John Smith</h1>
            <h2 class="h5 text-white-op">Tower Owner
                {{--  <a class="text-primary-light" href="javascript:void(0)">@GraphicXspace</a> --}}
            </h2>
            <!-- END Personal -->

            <!-- Actions -->
            <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                <i class="fa fa-plus mr-5"></i> Edit Profile
            </button>
            <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5">
                <i class="fa fa-envelope-o mr-5"></i> Message
            </button>
            <!-- END Actions -->
        </div>
    </div>
</div>
<!-- END User Info -->
    <!-- Page Content -->
    <div class="content">
        <!-- Projects -->
        {{-- <h2 class="content-heading">
            <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">View More..</button>
            <i class="si si-briefcase mr-5"></i> Towers
        </h2>
        <div class="row items-push">
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded ribbon ribbon-modern ribbon-success text-center">
                    <div class="ribbon-box">Active</div>
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-danger text-danger-light mx-auto my-20">
                            <i class="fa fa-globe"></i>
                        </div>
                        {{-- <div class="text-warning">
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                        </div> --}}
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600 mb-5">Tower Name</div>
                        {{-- <div class="font-size-sm text-muted">https://example.com</div> --}}
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase mr-5"></i>View Tower
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded ribbon ribbon-modern ribbon-success text-center">
                    <div class="ribbon-box">Active</div>
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-success text-success-light mx-auto my-20">
                            <i class="fa fa-birthday-cake"></i>
                        </div>
                        {{-- <div class="text-warning">
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                        </div> --}}
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600 mb-5">Tower Name</div>
                        {{-- <div class="font-size-sm text-muted">3000 icons</div> --}}
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase mr-5"></i>View Tower
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded ribbon ribbon-modern ribbon-primary text-center">
                    <div class="ribbon-box">$2999</div>
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-info text-info-light mx-auto my-20">
                            <i class="fa fa-windows"></i>
                        </div>
                        <div class="text-warning">
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600 mb-5">Windows App</div>
                        <div class="font-size-sm text-muted">Accounting Dashboard</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase mr-5"></i>View Tower
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="block block-rounded ribbon ribbon-modern ribbon-success text-center">
                    <div class="ribbon-box">Active</div>
                    <div class="block-content block-content-full">
                        <div class="item item-circle bg-warning text-warning-light mx-auto my-20">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <div class="text-warning">
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <div class="font-w600 mb-5">iOS App</div>
                        <div class="font-size-sm text-muted">Tower Name</div>
                    </div>
                    <div class="block-content block-content-full">
                        <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                            <i class="fa fa-briefcase mr-5"></i>View Tower
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- END Projects -->
    </div>
@endsection
