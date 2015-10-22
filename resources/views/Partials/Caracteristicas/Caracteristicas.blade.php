
<div class="row">
    <div class="col-md-2">
        @if( isset($caracteristicasItem))
        <input type="hidden" name="caracteristicasID" value={{$caracteristicasItem->id}}>
            @endif
    </div>

    <div class="col-md-7">
        <p align="left" class="help-block"> (*) Campos obligatorios</p><br>
        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label"><strong>*</strong>Caracteristica</label>
            <div class="col-lg-10">

                @if( isset($caracteristicasItem))

                    {!!Form::text('Nombre' ,$caracteristicasItem->nombre,['class'=>'form-control','id'=>'Caracteristica','placeholder'=>'Caracteristica del patrocinio'])!!}
                @else
                    {!!Form::text('Nombre' ,null,['class'=>'form-control','id'=>'Caracteristica','placeholder'=>'Caracteristica del patrocinio'])!!}
                @endif
            </div>
        </div>



        <div class="form-group" align="center">
            @if( isset($caracteristicasItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar la caracteristica?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>


    </div>




    </div>

