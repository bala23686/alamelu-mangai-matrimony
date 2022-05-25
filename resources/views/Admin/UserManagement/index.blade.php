@extends('layouts.Admin.app')

@section('tab_tittle')
    Profile Managament | {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection


@section('page_pre_title')
    Profile List
@endsection

@section('page-title')
@endsection



@section('page_content')
    <div x-data="{
        userList: [],
        statusList: [],
        genderList: [],
        casteList: [],
        locationList: [],
        packageList: [],
        martialStatusList: [],
        heightList: [],
        totalProfile: 0,
        choosedCasteId: 0,
        choosedLocationId: 0,
        isLoading: true,
        isLoadingStatus: true,
        links: [],
        prev_url: '',
        next_url: '',
        searchQuery: '',
        filterQueryString: '',
        getChoosedCasteId(id) {

            console.log(id)
            let casteId = $('#choose_caste_' + id).attr('data-id');
            this.choosedCasteId = casteId
            console.log(casteId)
            this.getProfileListPaginate('{{ route('admin.profile.ssr') }}' + this.filterQueryString)


        },
        getChoosedLocationId(id) {
            console.log(id)
            let locationId = $('#choose_location_' + id).attr('data-id');
            this.choosedLocationId = locationId
            console.log(this.choosedLocationId)
            this.getProfileListPaginate('{{ route('admin.profile.ssr') }}' + this.filterQueryString)
        },
        getProfileListPaginate(paginateLink, frompagination = 0) {
            this.isLoading = true
            if (frompagination) {
                axios.get(paginateLink + `&&perpage=${$refs.show.value}&&userStatus=${$refs.m_status.value}&&gender=${$refs.gender.value}&&caste=${this.choosedCasteId}&&location=${this.choosedLocationId}&&searchQuery=${this.searchQuery}&&minHeight=${$refs.min_height.value}&&maxHeight=${$refs.max_height.value}&&package=${$refs.package.value}&&mstatus=${$refs.martialStatus.value}&&minage=${$refs.min_age.value}&&maxage=${$refs.max_age.value}`)
                    .then((e) => {

                        console.log(e.data)
                        this.links = e.data.links
                        this.totalProfile = e.data.total
                        this.userList = e.data.data
                        this.prev_url = e.data.prev_page_url
                        this.next_url = e.data.next_page_url
                        this.isLoading = false
                        document.body.scrollTop = 0;

                    })
            } else {
                axios.get('{{ route('admin.profile.ssr') }}?' + `perpage=${$refs.show.value}&&userStatus=${$refs.m_status.value}&&gender=${$refs.gender.value}&&caste=${this.choosedCasteId}&&location=${this.choosedLocationId}&&searchQuery=${this.searchQuery}&&minHeight=${$refs.min_height.value}&&maxHeight=${$refs.max_height.value}&&package=${$refs.package.value}&&mstatus=${$refs.martialStatus.value}&&minage=${$refs.min_age.value}&&maxage=${$refs.max_age.value}`)
                    .then((e) => {

                        console.log(e.data)
                        this.links = e.data.links
                        this.totalProfile = e.data.total
                        this.userList = e.data.data
                        this.prev_url = e.data.prev_page_url
                        this.next_url = e.data.next_page_url
                        this.isLoading = false


                    })
            }

        },
        loadUserList() {
            axios.get('{{ route('admin.profile.ssr') }}' + this.filterQueryString)
                .then((e) => {

                    console.log(e.data)
                    this.links = e.data.links
                    this.totalProfile = e.data.total
                    this.userList = e.data.data
                    this.isLoading = false
                    this.next_url = e.data.next_page_url
                    console.log(this.userList)

                })
        },
        loadPackageList() {

            axios.get('{{ route('admin.submaster.package.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.packageList = e.data
                    console.log(this.packageList)

                })
        },
        loadMartialStatusList() {

            axios.get('{{ route('admin.submaster.m-status.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.martialStatusList = e.data
                    console.log(this.martialStatusList)

                })
        },
        loadStatusList() {

            axios.get('{{ route('admin.status.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.statusList = e.data
                    this.isLoadingStatus = false
                    console.log(this.statusList)

                })
        },
        loadGenderList() {

            axios.get('{{ route('admin.submaster.gender.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.genderList = e.data
                    this.isLoadingStatus = false
                    console.log(this.genderList)

                })
        },
        loadHeightList() {

            axios.get('{{ route('admin.submaster.height.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.heightList = e.data
                    console.log(this.heightList)

                })
        },
        loadCasteList() {

            axios.get('{{ route('admin.submaster.caste.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.casteList = e.data
                    this.isLoadingStatus = false
                    console.log(this.casteList)

                })
        },
        loadLocationList() {

            axios.get('{{ route('admin.submaster.location.ssr') }}')
                .then((e) => {
                    console.log(e.data)
                    this.locationList = e.data
                    this.isLoadingStatus = false
                    console.log(this.locationList)

                })
        },
    }" x-init="loadPackageList();
    loadStatusList();
    loadGenderList();
    loadCasteList();
    loadMartialStatusList();
    loadLocationList();
    loadHeightList();
    loadUserList();">
        <div class="col-12 col-md-12 ms-auto d-print-none mb-2">
            <div class="card">
                <div class="card-body">
                    {{-- filter-row-one --}}
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-evenly">
                                <div class="mb-3">
                                    <label class="form-label">Show</label>
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <select class="form-select" x-ref="show"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="10">10</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="150">150</option>
                                                <option value="200">200</option>
                                                <option value="250">250</option>
                                                <option value="300">300</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Filter By Status</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="m_status"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <template x-for="status in statusList" :key="status.id">
                                                    <option x-bind:value="status.id" x-text="status.status_name"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Filter By Gender</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="gender"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <template x-for="gender in genderList" :key="gender.id">
                                                    <option x-bind:value="gender.id" x-text="gender.gender_name"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Filter By Caste</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <input class="form-control" list="castes" placeholder="Enter caste name"
                                                type="text" name="Caste List" id="casteinput"
                                                x-on:blur="(e)=>getChoosedCasteId(e.target.value)">
                                            <datalist id="castes">
                                                <template x-for="caste in casteList" :key="caste.id">
                                                    <option x-bind:id="'choose_caste_'+caste.caste_name"
                                                        x-bind:label="caste.caste_name+'-'+caste.religion.religion_name"
                                                        x-bind:data-id="caste.id" x-bind:value="caste.caste_name" />
                                                </template>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Filter By Location</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <input class="form-control" list="locations" type="text"
                                                placeholder="Enter city name" name="Caste List" id="locationinput"
                                                x-on:blur="(e)=>getChoosedLocationId(e.target.value)">
                                            <datalist id="locations">
                                                <template x-for="location in locationList" :key="location.id">
                                                    <option x-bind:id="'choose_location_'+location.city_name"
                                                        x-bind:label="location.city_name" x-bind:data-id="location.id"
                                                        x-bind:value="location.city_name" />
                                                </template>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Filter By Package</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="package"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <template x-for="package in packageList" :key="package.id">
                                                    <option x-bind:value="package.id" x-text="package.package_name">
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end filter-row-one --}}
                    {{-- filter-row-2 --}}
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="mb-3 px-1">
                                    <label class="form-label">Filter By M-Status</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="martialStatus"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <template x-for="mstatus in martialStatusList" :key="mstatus.id">
                                                    <option x-bind:value="mstatus.id" x-text="mstatus.martial_status_name">
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Min-Height</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="min_height"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <template x-for="height in heightList" :key="height.id">
                                                    <option x-bind:value="height.id" x-text="height.height_feet_cm">
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Max-Height</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="max_height"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <template x-for="height in heightList" :key="height.id">
                                                    <option x-bind:value="height.id" x-text="height.height_feet_cm">
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Min-age</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="min_age"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 px-1">
                                    <label class="form-label">Max-age</label>
                                    <div class="row g-2">
                                        <div class="col-12" x-if="(!isLoadingStatus && !isLoading)">
                                            <select class="form-select" x-ref="max_age"
                                                x-on:change="(e)=>{getProfileListPaginate('{{ route('admin.profile.ssr') }}'+filterQueryString)}">
                                                <option selected value="0">All</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row ">
                                <label class="form-label">Global Search</label>
                                <div class="d-flex justify-content-evenly">
                                    <div class="input-group input-group-flat mx-2">
                                        <input type="search" x-model="searchQuery"
                                            x-on:input.debounce.500ms="getProfileListPaginate('{{ route('admin.profile.ssr') }}?perpage='+$refs.show.value+'&&userStatus='+$refs.m_status.value+'&&searchQuery='+searchQuery+'&&caste='+choosedCasteId+'&&gender='+$refs.gender.value)"
                                            class="form-control d-inline-block w-1"
                                            placeholder="Search Profile-ID / Username / Phone Number / Email">
                                        <span class="input-group-text">
                                            <a x-on:click="()=>window.location.href='{{ route('admin.profile.index') }}'"
                                                class="link-secondary" title="" data-bs-toggle="tooltip"
                                                data-bs-original-title="Clear search">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                    <a href="{{ route('admin.profile.create') }}" class="btn btn-primary mx-1">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        New user
                                    </a>
                                    <a href="#" class="btn btn-dark mx-1"
                                        x-on:click="()=>window.location.href='{{ route('admin.profile.index') }}'">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                        Clear Filters
                                    </a>
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <a href="#" class="btn-action" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Import</a>
                                                <a href="#" class="dropdown-item">Export</a>
                                                <a href="#" class="dropdown-item">Download</a>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end filter-row-2 --}}
                    <div class="row g-2 mt-1">
                        <div class="col-md-4">
                            <div class="row">
                                <label class="form-label">Total Profile : <span x-text="totalProfile"></span></label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- user-info-card --}}
        <div class="row row-cards">
            <div class="progress" x-show="isLoading">
                <div class="progress-bar progress-bar-indeterminate bg-dark"></div>
            </div>
            <template x-show="!isLoading" x-for="userinfo in userList" :key="userinfo.id">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <img x-bind:src="userinfo.user_basic_info.image_with_path"
                                class="avatar avatar-xl mb-3 avatar-rounded">
                            <h3 class="m-0 mb-1"><a target="_blank" x-bind:href="'{{route('admin.profile.show', '')}}/'+userinfo.id" x-text="userinfo.username"></a></h3>

                            <div class="text-muted m-0 mb-1" x-text="userinfo.phonenumber"></div>
                            <div class="badge bg-dark-lt m-0 mb-1" x-text="userinfo.user_package_info.package.package_name">
                            </div>
                            <dl class="row mt-3 text-start">
                                <dt class="col-5">P-ID:</dt>
                                <dd class="col-7"><span x-text="userinfo.user_profile_id"></span></dd>
                                <dt class="col-5">Date:</dt>
                                <dd class="col-7"><span x-text="userinfo.created_at"></span></dd>
                                <dt class="col-5">Status:</dt>
                                <dd class="col-7"> <span class="badge bg-purple-lt"
                                        x-text="userinfo.status.status_name">Owner</span></dd>
                                <dt class="col-5">Gender:</dt>
                                <dd class="col-7">
                                    <span class="badge bg-dark-lt"
                                        x-text="userinfo.user_basic_info.gender.gender_name">Male</span>
                                </dd>
                                <dt class="col-5">V-Status:</dt>
                                <dd class="col-7"> <template x-if="userinfo.is_verified">
                                        <span class="badge bg-green-lt">Verified</span>
                                    </template>
                                    <template x-if="!userinfo.is_verified">
                                        <span class="badge bg-danger-lt">Not-Verified</span>
                                    </template>
                                </dd>
                            </dl>

                        </div>
                        <div class="d-flex">
                            <a class="card-btn userView" target="_blank" x-bind:href="'{{route('admin.profile.show', '')}}/'+userinfo.id" x-bind:data-id="userinfo.id">
                                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                <polyline points="3 7 12 13 21 7"></polyline>
                            </svg> --}}
                                View / Edit
                            </a>
                            <a class="card-btn userDelete" x-bind:data-id="userinfo.id">
                                <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                </path>
                            </svg> --}}
                                Delete
                            </a>

                        </div>
                    </div>
                </div>
            </template>
        </div>
        {{-- end user-info-card --}}
        {{-- pagination section --}}
        <div class="row row-cards mt-2" x-show="!isLoading">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="pagination float-end">
                            <li x-bind:class="(prev_url)? 'page-item' : 'page-item  disabled'">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
                                    x-on:click.prevent="getProfileListPaginate(prev_url)">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="15 6 9 12 15 18"></polyline>
                                    </svg>
                                    prev
                                </a>
                            </li>
                            <template x-for="(link,index) in links" x-key="link.label">
                                <template x-if="index!=0 && index!=links.length-1">
                                    <li x-bind:class="(link.active)? 'page-item active' : 'page-item'"><a
                                            class="page-link"
                                            x-on:click.prevent="getProfileListPaginate(link.url,1)"><span
                                                x-text="link.label"></span></a></li>
                                </template>
                            </template>
                            <li x-bind:class="(next_url)? 'page-item' : 'page-item  disabled'">
                                <a class="page-link" href="#" x-on:click.prevent="getProfileListPaginate(next_url,1)">
                                    next
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="9 6 15 12 9 18"></polyline>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of pagination section --}}
    </div>
    </div>
@endsection('page_content')


@section('scripts')
    <script>
        $(function() {



            //section to handle user view button
            // $('body').on('click', '.userView', function() {
            //     var userId = $(this).attr('data-id')

            //     window.location.href = "{{ route('admin.profile.show', '') }}/" + userId

            // });
            //end section to handle user view button

            //section to handle user Delete button
            $('body').on('click', '.userDelete', function() {
                var userId = $(this).attr('data-id')
                console.log(userId);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {

                        let url = '{{ route('admin.profile.index') }}/' + userId

                        axios.delete(url)
                            .then((e) => {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'User Deleted',
                                    showConfirmButton: false,
                                    toast: true,
                                    timer: 1500
                                }).then(() => {
                                    window.location.href =
                                        "{{ route('admin.profile.index') }}"
                                })
                            }).catch((e) => {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'User Infomation cannot be deleted',
                                    toast: true,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            })

                    }
                });


            });
            //end section to handle user Delete button

        });
    </script>
@endsection
