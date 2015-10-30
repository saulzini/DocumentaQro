
<div class="row">
    @if( isset($PaquetesItem))
        <input type="hidden" name="paquetes_id" value={{$PaquetesItem->id}}>
    @endif

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <p align="left" class="help-block"> (*) Campos obligatorios</p><br>
        <div class="form-group">
            <label for="Descripcion" class="col-lg-2 control-label"><strong>*</strong>Nombre</label>
            <div class="col-lg-10">

                @if( isset($PaquetesItem))
                    {!!Form::text('Nombre' ,$PaquetesItem->descripcion,['class'=>'form-control','id'=>'Nombre','placeholder'=>'Nombre de paquete'])!!}
                @else
                    {!!Form::text('Nombre' ,null,['class'=>'form-control','id'=>'Nombre','placeholder'=>'Nombre de paquete'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Costo" class="col-lg-2 control-label">Costo</label>
            <div class="col-lg-10">
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                @if( isset($PaquetesItem))
                {!!Form::text('Costo' ,$PaquetesItem->costo,['class'=>'form-control','id'=>'Costo'])!!}
                @else
                {!!Form::text('Costo' ,null,['class'=>'form-control','id'=>'Costo'])!!}
                @endif
                 </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Características</label>
             <div class="col-lg-10">
                <select class="form-control" id="Caracteristica" name="Caracteristicas[]" multiple="multiple">
                    @if(isset($PaquetesCaracteristicas) && !$PaquetesCaracteristicas->isEmpty())

                    @foreach($Caracteristicas  as $Caracteristica)
                     @foreach($PaquetesCaracteristicas as $PaqueteCaracteristica )
                      @if($PaqueteCaracteristica->id== $Caracteristica->id )
                       <option value="{{  $Caracteristica->id }}" selected> {{ $Caracteristica->nombre}}</option>
                      @break;
                      @elseif ( $PaqueteCaracteristica == $ultimaCaracteristica )
                       <option value="{{  $Caracteristica->id }}" > {{ $Caracteristica->nombre}} </option>
                     @endif
                     @endforeach
                    @endforeach

                    @else
                    @foreach($Caracteristicas  as $Caracteristica)
                    <option value="{{  $Caracteristica->id }}" > {{ $Caracteristica->nombre}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group" align="center">
            @if( isset($PaquetesItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar el paquete?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>


    </div>

</div>

