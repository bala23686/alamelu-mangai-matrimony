@extends('Website.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>Partner Preference</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    @php
                        $user=App\Models\User::find(auth()->user()->id)->load('userBasicInfo');
                        [$performance,$bgColor]=App\Helpers\UserSideBar\UserSideBarHelper::make($user)->logic();
                    @endphp
                    <x-user-dashboard.side-bar  :user="$user" :status="0" :performance="$performance" :bgColor="$bgColor" />
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 profile-settings-block mb-3">
                            <h3 class="text-center fw-light mt-3 mb-5">Upoad Your Pictures Here !</h3>
                            <div class="post-ad-tab">
                                <form id="imageUploadForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2 text-center">
                                            <div class="image">
                                                <img class='shadow' id='profileImg'
                                                    src="{{ asset('assets/Website/camera.png') }}" alt="Preview">
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <div class="d-grid gap-2">
                                                <input type="file" name='profileImage' id="imgInp" accept="image/*">
                                                <br>
                                                <button class="btn btn-primary" id='imgUploadBtn' type="submit"
                                                    disabled>Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="card mt-5">
                                    <div class="card-header">
                                        <h5 class="fw-normal">Your Pictures</h5>
                                    </div>
                                    <div class="card-body d-flex justify-content-evenly">

                                        @foreach ($imageInfo as $image)
                                            <img class='rounded showImg' width="15%"
                                                src='{{ !empty($image->user_photo) ? $image->image_full_path : 'https://www.kindpng.com/picc/m/22-223941_transparent-avatar-png-male-avatar-icon-transparent-png.png' }}'
                                                alt="#" data-bs-toggle="modal" id={{ $image->id }}
                                                data-bs-target="#exampleModal">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- MODAL AREA --}}
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id='modalImg' src="" alt="" class="card-img w-50">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id='imgDelBtn' type="button" class="btn btn-danger">Delete Image</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL AREA --}}

    <script>
        $(".showImg").each(function(index) {
            $(this).on("click", function() {
                modalImg.src = this.src;
                $('#imgDelBtn').attr('data-id', this.id);
            });
        });


        $(function() {
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    profileImg.src = URL.createObjectURL(file)
                    $('#imgUploadBtn').removeAttr('disabled');
                }
            }

            //***************************************************
            // UPLOAD GALLERY IMAGES
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#imageUploadForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData($('#imageUploadForm')[0]);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('userImage.upload', auth()->user()->id) }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        if (data.status == 200) {
                            toastr.success(data.message);
                            location.reload();

                        } else if (data.status == 500) {
                            toastr.error(data.message);
                            profileImg.src = "{{ asset('assets/Website/avatar.png') }}";
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            //***************************************************
            // DELETE GALLERY IMAGES
            $('#imgDelBtn').click((e) => {
                let delId = event.target.getAttribute("data-id");
                let URL = "{{ route('userImage.delete', "+ delId +") }}";
                alert('Are You Sure Want To Delete Your Image !');
                $.ajax({
                    url: URL,
                    type: "DELETE",
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {

                        if (data.status == 200) {
                            toastr.success(data.message);

                        }

                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(errorThrown);
                    }
                });
            });
        })
    </script>
@endsection
