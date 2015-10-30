
<div class="row">
    @if( isset($realizadoresItem))
        <input type="hidden" name="realizadorID" value={{$realizadoresItem->id}}>
    @endif

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <p align="left" class="help-block"> (*) Campos obligatorios</p><br>
        <div class="form-group">
            <label for="Realizador" class="col-lg-2 control-label"><strong>*</strong>Nombre del realizador</label>
            <div class="col-lg-10">

                @if( isset($realizadoresItem))

                    {!!Form::text('Nombre' ,$realizadoresItem->nombre,['class'=>'form-control','id'=>'Nombre','placeholder'=>'Nombre del realizador'])!!}
                @else
                    {!!Form::text('Nombre' ,null,['class'=>'form-control','id'=>'Nombre','placeholder'=>'Nombre del realizador'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Vínculo</label>
            <div class="col-lg-10">

                @if( isset($realizadoresItem))

                    {!!Form::text('Vinculo' ,$realizadoresItem->vinculo,['class'=>'form-control','id'=>'Vinculo','placeholder'=>'Vínculo'])!!}
                @else
                    {!!Form::text('Vinculo' ,null,['class'=>'form-control','id'=>'Vinculo','placeholder'=>'Vínculo'])!!}
                @endif
            </div>
        </div>



        <div class="form-group">
            <label for="Email" class="col-lg-2 control-label">E-mail</label>
            <div class="col-lg-10">

                @if( isset($realizadoresItem))

                    {!!Form::text('Email' ,$realizadoresItem->email,['class'=>'form-control','id'=>'Email','placeholder'=>'documentaqro@gmail.com'])!!}
                @else
                    {!!Form::text('Email' ,null,['class'=>'form-control','id'=>'Email','placeholder'=>'documentaqro@gmail.com'])!!}
                @endif
            </div>
        </div>





        <div class="form-group">
            <label for="AsistenciasS" class="col-lg-2 control-label">Teléfono</label>
            <div class="col-lg-10">
                @if( isset($realizadoresItem))
                    {!!Form::text('Telefono' ,$realizadoresItem->telefono,['class'=>'form-control','id'=>'telefono','placeholder'=>'442200726'])!!}
                @else
                    {!!Form::text('Telefono' ,null,['class'=>'form-control','id'=>'telefono','placeholder'=>'442200726'])!!}
                @endif
            </div>
        </div>


        <div class="form-group" align="center">
            @if( isset($realizadoresItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar el realizador?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>


    </div>




</div>

