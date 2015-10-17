
<div class="row">
    <div class="col-md-2">
        @if( isset($sedesItem))
        <input type="hidden" name="sedeID" value={{$sedesItem->id}}>
            @endif
    </div>

    <div class="col-md-8">



        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">

                @if( isset($sedesItem))

                    {!!Form::text('Descripcion' ,$sedesItem->descripcion,['class'=>'form-control','id'=>'Sede','placeholder'=>'Nombre de la sede'])!!}
                @else
                    {!!Form::text('Descripcion' ,null,['class'=>'form-control','id'=>'Sede','placeholder'=>'Nombre de la sede'])!!}
                @endif
            </div>
        </div>


        <div class="form-group" align="center">
            @if( isset($sedesItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar la sede?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>
    </div>


    </div>




    </div>

