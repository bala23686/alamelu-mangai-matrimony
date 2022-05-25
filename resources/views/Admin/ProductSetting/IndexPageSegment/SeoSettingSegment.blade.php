<div id="tab-top-3" class="card tab-pane" x-data="{

    seo:{
        seo_tittle:'{{$seoSettingInfo->seo_tittle}}',
        seo_meta_tittle:'{{$seoSettingInfo->seo_meta_tittle}}',
        seo_meta_description:'{{$seoSettingInfo->seo_meta_description}}',
        seo_meta_keywords:'{{$seoSettingInfo->seo_meta_keywords}}',
    },
    updateSeoSetting() {

        let data={

            seo_tittle:this.seo.seo_tittle,
            seo_meta_tittle:this.seo.seo_meta_tittle,
            seo_meta_description:this.seo.seo_meta_description,
            seo_meta_keywords:this.seo.seo_meta_keywords,
        }

        axios.post('{{ route('admin.setting.company-seo-setting') }}', data)
            .then((e) => {

                if (e.status == 201) {

                    axios.get('{{route('admin.setting.clear-cache')}}')
                    .then(e=>{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: e.data.message,
                            showConfirmButton: false,
                            toast: true,
                            timer: 1500
                        }).then(() => {

                            location.reload();

                        })
                    })

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: e.data.message,
                        showConfirmButton: false,
                        toast: true,
                        timer: 1500
                    }).then(() => {


                    })
                }

            })
            .catch((e) => {



                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Check all Fields are filled',
                    showConfirmButton: false,
                    toast: true,
                    timer: 1500
                })


            })

    },


}"

x-init=""

>
    <div class="card-body">
        <div class="card-title">Seo Settings</div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Seo Information</label>
                    <fieldset class="form-fieldset">
                        <div class="mb-3">
                            <label class="form-label">Tittle</label>
                            <input type="text" class="form-control" x-model="seo.seo_tittle" name="example-text-input" placeholder="Tittle">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Tittle
                            </label>
                            <input type="text" class="form-control" x-model="seo.seo_meta_tittle" name="example-text-input" placeholder="Meta Tittle">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description
                                <span class="form-label-description"><span x-text="seo.seo_meta_description.length"></span>/100</span>
                            </label>
                            <textarea class="form-control" x-model="seo.seo_meta_description" name="example-textarea-input" rows="4" placeholder="Content..">

                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Keywords
                            </label>
                            <input type="text" class="form-control" x-model="seo.seo_meta_keywords" name="example-text-input" placeholder="Meta Keywords">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button x-on:click="updateSeoSetting" type="button" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                        </path>
                        <circle cx="12" cy="14" r="2"></circle>
                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                    </svg> Save
                </button>
            </div>
        </div>
    </div>
</div>


