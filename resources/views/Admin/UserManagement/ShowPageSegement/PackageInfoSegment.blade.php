<div class="col-md-6">
    <div class="card"
    x-data="{

        userPackageInfo: {
            user_package_name: '{{ $singleUserInfo->userPackageInfo->user_package_id ? $singleUserInfo->userPackageInfo->Package->package_name : 'Free Package'  }}',
            user_views_remaining: '{{ $singleUserInfo->userPackageInfo->user_views_remaining }}',
            photo_upload_remaining: '{{ $singleUserInfo->userPackageInfo->photo_upload_remaining }}',
            interest_remaining: '{{ $singleUserInfo->userPackageInfo->interest_remaining }}',
            expires_on: '{{ $singleUserInfo->userPackageInfo->expires_on }}',
            is_expired: '{{ $singleUserInfo->userPackageInfo->is_expired }}',
        },


    }"
     >
        <div class="card-header">
            <h4> User Package Information </h4>
          <div class="card-actions">
            <a href="{{route('admin.profile.edit', $singleUserInfo->id)}}">
              Purchase New Package<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
            </a>
          </div>
        </div>
        <div class="card-body">
          <dl class="row mt-3">
            <dt class="col-5">Package Name:</dt>
            <dd class="col-7" >
                <span class="badge bg-green-lt" x-text="userPackageInfo.user_package_name"></span>
            </dd>
            <dt class="col-5">View's Remains:</dt>
            <dd class="col-7" x-text="userPackageInfo.user_views_remaining+'-views'"></dd>
            <dt class="col-5">Photo Upload Remains:</dt>
            <dd class="col-7" x-text="userPackageInfo.photo_upload_remaining+'-uploads'"></dd>
            <dt class="col-5">Interest Remains:</dt>
            <dd class="col-7" x-text="userPackageInfo.interest_remaining+'-interest'"></dd>
            <dt class="col-5">Expires on:</dt>
            <dd class="col-7" >
                <span class="badge bg-primary-lt" x-text="userPackageInfo.expires_on"></span>
            </dd>
            <dt class="col-5">Expired:</dt>
            <dd class="col-7" >
                <template x-if="userPackageInfo.is_expired==0">
                <span class="badge bg-success-lt" >No</span>
                </template>
                <template x-if="userPackageInfo.is_expired==1">
                    <span class="badge bg-danger-lt" >Yes</span>
                    </template>
            </dd>
          </dl>
          <div class="card card-sm mt-3 mb-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/message -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path><line x1="8" y1="9" x2="16" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line></svg>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Caution : Make sure before changing (or) upgrading the plan kindly check the
                    <b>Settings->Product settings->Carry Forward</b>  button
                    set to ON (or) OFF to carry forward the phone number counts.
                  </div>
                  <div class="text-muted">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
