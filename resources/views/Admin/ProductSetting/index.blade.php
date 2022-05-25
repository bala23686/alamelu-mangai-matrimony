@extends('layouts.Admin.app')

@section('tab_tittle')
    Settings |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    Product Settings
@endsection

@section('page-title')
    Product Settings
@endsection



@section('page_content')
    <div class="container">
        {{-- third row of page --}}
        <div class="row mt-3">
            {{-- third row first column of page --}}
            <div class="col-md-12">
                <div class="card-tabs ">
                    <!-- Cards navigation -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#tab-top-1" class="nav-link active" data-bs-toggle="tab">General
                                Settings</a></li>
                        <li class="nav-item"><a href="#tab-top-2" class="nav-link" data-bs-toggle="tab">Policy
                                Settings</a></li>
                        <li class="nav-item"><a href="#tab-top-3" class="nav-link" data-bs-toggle="tab">Seo
                                Settings</a></li>
                        {{-- <li class="nav-item"><a href="#tab-top-4" class="nav-link"
                                data-bs-toggle="tab">Professional Info</a></li>
                        <li class="nav-item"><a href="#tab-top-5" class="nav-link" data-bs-toggle="tab">Native
                                Info</a></li>
                        <li class="nav-item"><a href="#tab-top-6" class="nav-link"
                                data-bs-toggle="tab">Religious Info</a></li>
                        <li class="nav-item"><a href="#tab-top-7" class="nav-link" data-bs-toggle="tab">User
                                Preference</a></li> --}}
                    </ul>

                    <div class="tab-content">
                        <!-- Content of card #1 -->
                        @include(
                            'Admin.ProductSetting.IndexPageSegment.ProductSettingSegement'
                        )
                        <!-- Content of card #2 -->
                        @include(
                            'Admin.ProductSetting.IndexPageSegment.PrivacySettingSegment'
                        )
                         <!-- Content of card #3 -->
                         @include(
                            'Admin.ProductSetting.IndexPageSegment.SeoSettingSegment'
                        )

                    </div>
                </div>
            </div>
            {{-- end of third row first column of page --}}
        </div>
        {{-- End of third row of page --}}


    </div>
@endsection('page_content')


@section('scripts')
    <script>



    </script>
@endsection
