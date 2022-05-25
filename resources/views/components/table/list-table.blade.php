<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $tittle }}</h3>
        </div>
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        @foreach ($datas[0] as $key => $d)
                            <th>{{ $key }}</th>
                        @endforeach
                        @foreach ($tableActions as $tableAction)
                            <th>{{ $tableAction }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    @foreach ($datas as $key=>$data)
                        <tr>
                            @foreach ($data as $d)
                                <td class="text-muted">
                                    {{ $d  }}
                                </td>
                            @endforeach
                            @foreach ($actionTypes as $actionType)
                            <td class="text-muted">
                                <a href="{{route($actionType['routeName'],$datas[$key]['id'])}}"
                                    class="btn btn-success btn-sm">
                                    {{ $actionType['buttonText'] }}
                                </a>
                            </td>
                        @endforeach
                        </tr>
                    @endforeach


                    {{-- <td class="text-muted">3,654</td>
                        <td class="text-muted">82.54%</td>
                        <td class="text-muted"></td> --}}

                </tbody>
            </table>
        </div>
    </div>

</div>
