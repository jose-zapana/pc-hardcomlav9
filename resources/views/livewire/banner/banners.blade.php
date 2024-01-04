<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_length" id="dynamic-table_length">
                        @include('common.searchbox')
                    </div>
                </div>
                <div class="col-xs-6">
                    <div id="dynamic-table_filter" class="dataTables_filter">
                        <ul class="btn btn-white btn-info btn-bold" style="list-style: none;">
                            <li>
                                <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">
                                    <i class="menu-icon fa fa-pencil-square-o blue"></i>
                                    Agregar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="widget-content">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-primary" style="background: #3B3F5C">
                            <tr>
                                <th class="table-th text-white">TÍTULO</th>
                                <th class="table-th text-white">CONTENIDO</th>
                                <th class="table-th text-white">LINK</th>
                                <th class="table-th text-white">IMAGEN</th>
                                <th class="table-th text-white">ACTIONS</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                            <tr>
                                <td>
                                    <h6>{{$banner->title}}</h6>
                                </td>
                                <td>
                                    <h6>{{$banner->content}}</h6>
                                </td>
                                <td>
                                    <h6>{{$banner->link}}</h6>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/banners/' .$banner->image) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click="Edit({{$banner->id}})" class="btn btn-xs btn-info" title="Edit">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="Confirm('{{$banner->id}}')" class="btn btn-xs btn-danger" title="Delete">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $banners->links() }}

                </div>

            </div>

        </div>
    </div>

    @include('livewire.banner.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('banner-added', msg => {
            $('#theModal').modal('hide')
        });

    });
</script>