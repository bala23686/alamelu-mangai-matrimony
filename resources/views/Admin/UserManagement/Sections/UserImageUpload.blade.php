<div class="row mt-3" x-data="{

    isNewImageUploaded:1,
    isLoadingUserPhotoList:true,
    userPhotoList:[],
    showGallary: false,
    myDropzone: '',
    initializeDropZone() {

        Dropzone.autoDiscover = false;
        this.myDropzone = new Dropzone('#userImageUpload', {
            url: '{{ route('admin.profile.uploadMultipleImage') }}',
            headers: { 'X-CSRF-Token': '{{ csrf_token() }}' },
            success(file) {
                if (file.previewElement) {
                    this.userPhotoList=[]
                  return file.previewElement.classList.add('dz-success');
                }
              },
            error(file, message) {
                let response = JSON.parse(message)
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })
                if (file.previewElement) {
                    file.previewElement.classList.add('dz-error');
                    if (typeof message !== 'string' && message.error) {
                        message = message.error;
                    }
                    for (let node of file.previewElement.querySelectorAll(
                            '[data-dz-errormessage]'
                        )) {
                        node.textContent = response.message;
                    }
                }
            },
        });

    },
    loadUserPhotoList()
    {
        this.isLoadingUserPhotoList = true
        axios.get('{{ route('admin.profile.getUserPhotos.ssr', $singleUserInfo->id ) }}')
            .then((e) => {

                this.userPhotoList = e.data
                this.isLoadingUserPhotoList = false


            })
    },
    deleteUserPhoto(id)
    {
        axios.delete('{{ route('admin.profile.deletePhoto.ssr', '' ) }}/'+id)
            .then((e) => {

                if(e.status==200)
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: e.data.message,
                        showConfirmButton: false,
                        toast: true,
                        timer: 1500
                    })
                }



            })
    }

}"
x-init="initializeDropZone();"
x-effect="loadUserPhotoList()"

>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        User Images Upload
                    </h3>
                    <p class="card-subtitle">
                        <b>NOTE :</b>Uploading Image on Admin Also Reduce The Pakcage Image Upload Count
                    </p>
                </div>
                <div class="card-actions">
                    <button type="button" x-on:click="showGallary=true;loadUserPhotoList();" class="btn btn-primary">
                        User Photo Gallery
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="m-5">


                    <form class="dropzone" id="userImageUpload" action="" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="{{ $singleUserInfo->id }}">
                    </form>


            </div>
                <template x-if="showGallary">
                    <div class="container">
                        <template x-if="isLoadingUserPhotoList">
                            <div class="mb-3">
                                <label class="form-label">Loading....</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
                                </div>
                            </div>
                        </template>
                        <div class="row row-cards m-3" x-if="!isLoadingUserPhotoList">
                            <template x-for="userPhoto in userPhotoList">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm">
                                        <a href="#" class="d-block"><img x-bind:src="userPhoto.image_full_path"
                                                class="card-img-top"></a>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="text-muted" x-text="userPhoto.created_at">3 days ago</div>
                                                </div>
                                                <div class="ms-auto">
                                                    <button type="button" x-bind:id="userPhoto.id" x-on:click="($el)=>deleteUserPhoto($el.target.id)" class="ms-3 btn btn-sm btn-danger">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <desc>Download more icon variants from https://tabler-icons.io/i/file-off</desc>
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <line x1="3" y1="3" x2="21" y2="21"></line>
                                                            <path d="M7 3h7l5 5v7m0 4a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-14"></path>
                                                         </svg>
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
