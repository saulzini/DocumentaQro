
<div class="row">
    <div class="col-md-2">
        @if( isset($integrantesItem))
        <input type="hidden" name="integrantesID" value={{$integrantesItem->id}}>
            @endif
    </div>

    <div class="col-md-7">

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">

                @if( isset($integrantesItem))

                    {!!Form::text('Nombre' ,$integrantesItem->nombre,['class'=>'form-control','id'=>'Nombre','placeholder'=>'Nombre del integrante'])!!}
                @else
                    {!!Form::text('Nombre' ,null,['class'=>'form-control','id'=>'Nombre','placeholder'=>'Nombre del integrante'])!!}
                @endif
            </div>
        </div>


        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Telefono</label>
            <div class="col-lg-10">

                @if( isset($integrantesItem))

                    {!!Form::text('Telefono' ,$integrantesItem->telefono,['class'=>'form-control','id'=>'Telefono','placeholder'=>'Telefono'])!!}
                @else
                    {!!Form::text('Telefono' ,null,['class'=>'form-control','id'=>'Telefono','placeholder'=>'Telefono'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Puesto</label>
            <div class="col-lg-10">

                @if( isset($integrantesItem))

                    {!!Form::text('Puesto' ,$integrantesItem->puesto,['class'=>'form-control','id'=>'Puesto','placeholder'=>'Puesto'])!!}
                @else
                    {!!Form::text('Puesto' ,null,['class'=>'form-control','id'=>'Puesto','placeholder'=>'Puesto'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">

                @if( isset($integrantesItem))

                    {!!Form::text('Email' ,$integrantesItem->email,['class'=>'form-control','id'=>'Email','placeholder'=>'Email'])!!}
                @else
                    {!!Form::text('Email' ,null,['class'=>'form-control','id'=>'Email','placeholder'=>'Email'])!!}
                @endif
            </div>
        </div>


        <div class="form-group" align="center">
            @if( isset($integrantesItem))

                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar al integrante?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>


    </div>




    </div>

