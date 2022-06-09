@extends('Website.layouts.default')
<style>
    .highlight-error {
        border-color: red;
    }
</style>
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                        <li>Upload Documents</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard  mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">

                    @php
                        $user = App\Models\User::find(auth()->user()->id)->load('userBasicInfo');
                        [$performance, $bgColor] = App\Helpers\UserSideBar\UserSideBarHelper::make($user)->logic();
                    @endphp
                    <x-user-dashboard.side-bar :user="$user" :status="0" :performance="$performance" :bgColor="$bgColor" />

                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">

                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Upload Your Mandatory</h3>
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
                                    <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <form method="post" action="#" id="aadharUploadForm">
                                                @csrf
                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group files color">
                                                        <label>Upload Your Aadhar <span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" id="aadharInput" name="userAdharCard"
                                                            class="form-control" accept=".jpeg,jpg" required>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <label>Enter Aadhar No <span
                                                            class="text-danger">&nbsp;(*)Mandatory</span></label>
                                                    {{-- <input type="number" id="aadharNoInput" name="userAdharCardNo"
                                                    class="form-control" maxlength="16" pattern="[0-9]" required> --}}
                                                    <input class="form-control" name="userAdharCardNo" type="text"
                                                        data-type="adhaar-number" maxLength="19" required>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" id="aadharUpload"
                                                        class="btn btn-primary btn-sm float-end"><i
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
        </div>
        </div>
    </section>
    <script>
        $(function() {

            //upload Medical Certificate
            $('#medicUpload').on('click', (e) => {
                let valid = false;
                if ($('#medicInput')[0].files.length === 0) {
                    // toastr.error('Attachment Required');
                    toastr.error('Attachment Required');
                    $('#medicUpload').focus();


                } else {
                    valid = true;
                }
                var ofile = document.getElementById('medicInput').files[0];
                var imgData = new FormData();
                imgData.append("medical_certificate", ofile);
                let URL = "{{ route('medical.certificate', $user->id) }}";
                let medicUploadForm = $("#medicUploadForm").serializeArray();
                $.each(medicUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                if (valid) {
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
                }
                e.preventDefault();
            });
            //upload 10th  Certificate
            $('#tenthUpload').on('click', (e) => {
                let valid = false;
                if ($('#tenthInput')[0].files.length === 0) {
                    toastr.error('Attachment Required');
                    $('#tenthUpload').focus();


                } else {
                    valid = true;
                }

                var ofile = document.getElementById('tenthInput').files[0];
                var imgData = new FormData();
                imgData.append("tenth_certificate", ofile);
                let URL = "{{ route('tenth.certificate', $user->id) }}";
                let tenthUploadForm = $("#tenthUploadForm").serializeArray();
                $.each(tenthUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                if (valid) {
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
                }

                e.preventDefault();
            });
            //upload 12th  Certificate
            $('#twelthUpload').on('click', (e) => {
                let valid = false;
                if ($('#twelthInput')[0].files.length === 0) {
                    toastr.error('Attachment Required');
                    $('#twelthUpload').focus();


                } else {
                    valid = true;
                }

                var ofile = document.getElementById('twelthInput').files[0];
                var imgData = new FormData();
                imgData.append("twelth_certificate", ofile);
                let URL = "{{ route('twelth.certificate', $user->id) }}";
                let twelthUploadForm = $("#twelthUploadForm").serializeArray();
                $.each(twelthUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                if (valid) {
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
                }

                e.preventDefault();

            });
            //upload Transfer Certificate
            $('#tcUpload').on('click', (e) => {
                let valid = false;
                if ($('#tcInput')[0].files.length === 0) {
                    toastr.error('Attachment Required');
                    $('#tcUpload').focus();


                } else {
                    valid = true;
                }

                var ofile = document.getElementById('tcInput').files[0];
                var imgData = new FormData();
                imgData.append("clg_tc", ofile);
                let URL = "{{ route('tc.certificate', $user->id) }}";
                let tcUploadForm = $("#tcUploadForm").serializeArray();
                $.each(tcUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                if (valid) {
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
                }

                e.preventDefault();

            });
            //aadhar card
            $('[data-type="adhaar-number"]').keyup(function() {
                var value = $(this).val();
                value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join(
                    "-");
                $(this).val(value);
            });

            $('[data-type="adhaar-number"]').on("change, blur", function() {
                var value = $(this).val();
                var maxLength = $(this).attr("maxLength");
                if (value.length != maxLength) {
                    $(this).addClass("highlight-error");
                } else {
                    $(this).removeClass("highlight-error");
                }
            });
            //upload Aadhar
            $('#aadharUpload').on('click', (e) => {
                let valid = false;
                let aadharNo = $('#aadharNo').val();
                if ($('#aadharInput')[0].files.length === 0 || aadharNo === '') {
                    toastr.error('Attachment Required');
                    $('#aadharUpload').focus();

                } else {
                    valid = true;
                }

                var ofile = document.getElementById('aadharInput').files[0];
                var imgData = new FormData();
                imgData.append("userAdharCard", ofile);
                let URL = "{{ route('aadhar.certificate', $user->id) }}";
                let aadharUploadForm = $("#aadharUploadForm").serializeArray();
                $.each(aadharUploadForm, function(i, field) {
                    imgData.append(field.name, field.value);
                });
                if (valid) {
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
                }

                e.preventDefault();

            });

        });
    </script>
@stop
