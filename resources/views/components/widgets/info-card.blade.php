<div class="col-md-6 col-xl-3">
    <div class="card card-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="bg-{{$colour}} text-white avatar">
                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                        {{$slot}}
                    </span>
                </div>
                <div class="col">
                    <div class="font-weight-medium">
                        {{ $count }} {{$tittle}}
                    </div>
                    <div class="text-muted">
                        {{$subTittle}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
