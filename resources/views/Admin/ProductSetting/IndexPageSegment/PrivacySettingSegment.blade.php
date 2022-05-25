<div id="tab-top-2" class="card tab-pane" x-data="{

    initializeEditor()
    {
        this.privacyPolicyEditor = ClassicEditor
            .create(document.querySelector('#privacy-editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    this.privacyPolicyEditor = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

        this.refundPolicyEditor = ClassicEditor
            .create(document.querySelector('#refund-policy-editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    this.refundPolicyEditor = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    },
    updatePrivacySetting() {

        let data={

            privacyPolicy:this.privacyPolicyEditor,
            refundPolicy:this.refundPolicyEditor,
        }

        axios.post('{{ route('admin.setting.policy-setting') }}', data)
            .then((e) => {



                if (e.status == 201) {

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

x-init="initializeEditor()"

>
    <div class="card-body">
        <div class="card-title">Privacy Content Settings</div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Privacy Information</label>
                    <fieldset class="form-fieldset">
                        <div class="mb-3">
                            <label class="form-label required">Privacy Policy Section</label>
                            <textarea class="form-control " id="privacy-editor" name="example-textarea-input"  rows="4" placeholder="Content..">
                                {{$privacySettingInfo->company_privacy_policy}}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Refund Policy Section

                            </label>
                            <textarea class="form-control " id="refund-policy-editor" name="example-textarea-input" rows="4" placeholder="Content.."
                                >
                                {{$privacySettingInfo->company_refund_policy}}
                            </textarea>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button x-on:click="updatePrivacySetting" type="button" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                        </path>
                        <circle cx="12" cy="14" r="2"></circle>
                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                    </svg> Update Policy
                </button>
            </div>
        </div>
    </div>
</div>


