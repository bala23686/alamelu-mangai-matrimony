@extends('layouts.Admin.auth')

@section('tab_tittle')
PayU Payment Success
@endsection

@section('meta_tages')

@endsection

@section('styles')
@endsection

@section('page_pre_title')

@endsection

@section('page-title')
@endsection



@section('auth_section')

<div class="modal modal-blur fade show" id="modal-success" tabindex="-1" role="dialog" style="display: block;" aria-modal="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-success"></div>
        <div class="modal-body text-center py-4">
          <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/circle-check</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><path d="M9 12l2 2l4 -4"></path></svg>
          <h3>Payment succedeed</h3>
          <div class="text-muted">Your payment  has been successfully submitted. Your invoice has been sent to Email</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a href="{{route('admin.profile.index')}}" class="btn btn-success w-100">
                 Dashboard
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('scripts')

@endsection
