@include('common.modalHead')

<div class="row">
    <div class="col-sm-12">


        <div class="form-group">

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                </span>
                <input class="form-control input-mask-phone" wire:model.lazy="title" type="text" id="form-field-mask-2" placeholder="ejm: Titulo">
            </div>
        </div>
        @error('title') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                </span>
                <input class="form-control input-mask-phone" wire:model.lazy="content" type="text" id="form-field-mask-2" placeholder="ejm: Contenido">
            </div>
        </div>
        @error('content') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                </span>
                <input class="form-control input-mask-phone" wire:model.lazy="link" type="text" id="form-field-mask-2" placeholder="ejm: http://pc-hard.com">
            </div>
        </div>
        @error('link') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>


    <div>
        <div class="col-sm-12">
            <label class="ace-file-input">
                <input type="file" name="images[]" accept="image/jpeg,image/png,image/jpg" class="file-input">

                <span class="ace-file-container" data-title="Seleccionar"><span class="ace-file-name" data-title="No imagen">
                        <i class=" ace-icon fa fa-upload"></i></span>
                </span>
                <a class="remove" href="#">
                    <i class=" ace-icon fa fa-times"></i>
                </a>
            </label>
            @error('image') <span class="text-danger er">{{ $message }}</span> @enderror
        </div>
    </div>

</div>


@include('common.modalFooter')