@extends('layouts.Admin.app')

@section('tab_tittle')
    Home |  {{$company->company_name}}
@endsection

@section('meta_tages')
@endsection

@section('page_pre_title')
    Product Dashboard
@endsection

@section('page-title')
    Admin Dashboard
@endsection

@section('page_content')
    {{-- first row  --}}
    <div class="row row-cards">
        <x-widgets.info-card :count="$totalUsers" tittle="Total Users" subTittle="Total Users Registered" colour="green">
            {{-- icon slot  --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <desc>Download more icon variants from https://tabler-icons.io/i/users</desc>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                </svg>
            {{--end icon slot  --}}
        </x-widgets.info-card>
        <x-widgets.info-card :count="$newUsers" tittle="New Users" subTittle="Users Registred Today" colour="blue">
            {{-- icon slot  --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/user-plus</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 11h6m-3 -3v6"></path>
             </svg>
            {{--end icon slot  --}}
        </x-widgets.info-card>
        <x-widgets.info-card :count="$activeUsers" tittle="Active Users" subTittle="Users On Active" colour="yellow">
            {{-- icon slot  --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <desc>Download more icon variants from https://tabler-icons.io/i/user-circle</desc>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="9"></circle>
                <circle cx="12" cy="10" r="3"></circle>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
             </svg>
            {{--end  icon slot  --}}
        </x-widgets.info-card>
        <x-widgets.info-card :count="$verifiedUsers" tittle="Verfied Users" subTittle="Total Verified Users" colour="dark">
           {{-- icon slot  --}}
           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <desc>Download more icon variants from https://tabler-icons.io/i/user-check</desc>
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
            <path d="M16 11l2 2l4 -4"></path>
         </svg>
           {{--end icon slot  --}}
        </x-widgets.info-card>
    </div>
    {{--end of first row  --}}
@endsection('page_content')

@section('scripts')
@endsection
