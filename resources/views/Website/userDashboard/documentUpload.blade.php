@extends('Website.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Partner Preference</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard  mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <x-user-dashboard.side-bar></x-user-dashboard.side-bar>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">

                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Post Ad</h3>
                            <div class="inner-block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form method="post" id="medicUploadForm">
                                                @csrf
                                                <div class="form-group files">
                                                    <label>Upload Your Medical Certificate<span
                                                            class="text-danger">*</span> </label>
                                                    <input type="file" name="medical_certificate" id="medicInput"
                                                        class="form-control" accept=".jpeg,jpg" required>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" id="medicUpload"
                                                        class="btn btn-primary btn-sm float-end"><i
                                                            class="lni lni-add-files"></i> Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form method="post" action="#" id="tenthUploadForm">
                                                @csrf
                                                <div class="form-group files color">
                                                    <label>Upload Your 10th Certificate<span class="text-danger">*</span>
                                                    </label>
                                                    <input type="file" id="tenthInput" name="tenth_certificate"
                                                        class="form-control" accept=".jpeg,jpg" required>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" id="tenthUpload"
                                                        class="btn btn-primary btn-sm float-end"><i
                                                            class="lni lni-add-files"></i> Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form method="post" action="#" id="twelthUploadForm">
                                                @csrf
                                                <div class="form-group files">
                                                    <label>Upload Your 12th Certificate<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" id="twelthInput" name="twelth_certificate"
                                                        class="form-control" accept=".jpeg,jpg" required>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" id="twelthUpload"
                                                        class="btn btn-primary btn-sm float-end"><i
                                                            class="lni lni-add-files"></i> Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form method="post" action="#" id="tcUploadForm">
                                                @csrf
                                                <div class="form-group files color">
                                                    <label>Upload Your Transfer Certificate <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" id="tcInput" name="clg_tc" class="form-control"
                                                        accept=".jpeg,jpg" required>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" id="tcUpload"
                                                        class="btn btn-primary btn-sm float-end"><i
                                                            class="lni lni-add-files"></i> Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-6">
                                        <form method="post" action="#" id="familyPicUploadForm">
                                            @csrf
                                            <div class="form-group files color">
                                                <label>Family Photo <span class="text-danger">*</span></label>
                                                <input type="file" id="familypicInput" name="family_pic"
                                                    class="form-control" accept=".jpeg,jpg" required>
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" id="familyPicUpload"
                                                    class="btn btn-primary btn-sm float-end" name="family_pic"><i
                                                        class="lni lni-add-files"></i> Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        $(function() {

            //upload Medical Certificate
            $('#medicUpload').on('click', (e) => {
                e.preventDefault();
                var ofile = document.getElementById('medicInput').files[0];
                var imgData = new FormData();
                imgData.append("medical_certificate", ofile);
                let URL = "{{ route('medical.certificate', $user->id) }}";
                let medicUploadForm = $("#medicUploadForm").serializeArray();
                $.each(medicUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                $.ajax({
                    url: URL,
                    type: "POST",
                    data: imgData,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            });
            //upload 10th  Certificate
            $('#tenthUpload').on('click', (e) => {
                e.preventDefault();
                var ofile = document.getElementById('tenthInput').files[0];
                var imgData = new FormData();
                imgData.append("tenth_certificate", ofile);
                let URL = "{{ route('tenth.certificate', $user->id) }}";
                let tenthUploadForm = $("#tenthUploadForm").serializeArray();
                $.each(tenthUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                $.ajax({
                    url: URL,
                    type: "POST",
                    data: imgData,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            });
            //upload 12th  Certificate
            $('#twelthUpload').on('click', (e) => {
                e.preventDefault();
                var ofile = document.getElementById('twelthInput').files[0];
                var imgData = new FormData();
                imgData.append("twelth_certificate", ofile);
                let URL = "{{ route('twelth.certificate', $user->id) }}";
                let twelthUploadForm = $("#twelthUploadForm").serializeArray();
                $.each(twelthUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                $.ajax({
                    url: URL,
                    type: "POST",
                    data: imgData,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            });
            //upload Transfer Certificate
            $('#tcUpload').on('click', (e) => {
                e.preventDefault();
                var ofile = document.getElementById('tcInput').files[0];
                var imgData = new FormData();
                imgData.append("clg_tc", ofile);
                let URL = "{{ route('tc.certificate', $user->id) }}";
                let tcUploadForm = $("#tcUploadForm").serializeArray();
                $.each(tcUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                $.ajax({
                    url: URL,
                    type: "POST",
                    data: imgData,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            });


        });
    </script>
@stop
