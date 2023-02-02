@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Help Desk</h3>
            {{-- <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div> --}}
        </div>
        <div class="block-content">
            <form action="be_forms_premade.html" method="post" onsubmit="return false;">
                <div class="form-group row">
                    <div class="col-6">
                        <div class="form-material floating">
                            <input type="text" class="form-control" id="contact3-firstname" name="contact3-firstname">
                            <label for="contact3-firstname">Firstname</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-material floating">
                            <input type="text" class="form-control" id="contact3-lastname" name="contact3-lastname">
                            <label for="contact3-lastname">Lastname</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-material floating input-group">
                            <input type="email" class="form-control" id="contact3-email" name="contact3-email">
                            <label for="contact3-email">Email</label>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-material floating">
                            <select class="form-control" id="contact3-subject" name="contact3-subject" size="1">
                                <option value="1">Support</option>
                                <option value="2">Billing</option>
                                <option value="3">Management</option>
                                <option value="4">Feature Request</option>
                            </select>
                            <label for="contact3-subject">Where?</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-material floating">
                            <textarea class="form-control" id="contact3-msg" name="contact3-msg" rows="7"></textarea>
                            <label for="contact3-msg">Message</label>
                        </div>
                        {{-- <div class="form-text text-muted text-right">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div> --}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-info">
                            <i class="fa fa-send mr-5"></i> Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
