
<div class="row">

    <div class="col-md-5">
        <div class="form-group">
            <div class="col-lg-12">
                @if( isset($ProgramasItem))
                <input type="hidden" name="programaId" value={{$ProgramasItem->id}}>
                {!!  Form::file('image',['id'=>'imagenDocumentaQro','align'=>'center','type'=>'file','class'=>'img-responsive form-control file-loading'] )  !!}
                @else
                {!!  Form::file('image',['id'=>'imagenDocumentaQro','align'=>'center','type'=>'file','class'=>'img-responsive form-control file-loading'] )  !!}
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <p align="left" class="help-block"> (*) Campos obligatorios</p><br>
        <div class="form-group">
            <label for="Titulo" class="col-lg-2 control-label"><strong>*</strong>Título</label>
            <div class="col-lg-10">
                @if( isset($ProgramasItem))
                    {!!Form::text('Titulo' ,$ProgramasItem->titulo,['class'=>'form-control','id'=>'Titulo','placeholder'=>'Título del programa'])!!}
                @else
                    {!!Form::text('Titulo' ,null,['class'=>'form-control','id'=>'Titulo','placeholder'=>'Título del programa'])!!}
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Festivales</label>
            <div class="col-lg-10">
                <select class="form-control" id="Festivales" name="Festivales[]" multiple="multiple">
                    @if(isset($ProgramasFestivales) && !$ProgramasFestivales->isEmpty())

                    @foreach($Festivales  as $Festival)
                    @foreach($ProgramasFestivales as $ProgramaFestival)
                    @if($ProgramaFestival->id == $Festival->id )
                    <option value="{{  $Festival->id }}" selected> {{ $Festival->titulo}}</option>
                    @break;
                    @elseif ( $ProgramaFestival== $ultimoFestival)
                    <option value="{{  $Festival->id }}" > {{ $Festival->titulo}} </option>
                    @endif
                    @endforeach
                    @endforeach

                    @else
                    @foreach($Festivales  as $Festival)
                    <option value="{{  $Festival->id }}" > {{ $Festival->titulo}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Patrocinadores</label>
            <div class="col-lg-10">
                <select class="form-control" id="Patrocinadores" name="Patrocinadores[]" multiple="multiple">
                    @if(isset($ProgramasPatrocinadores) && !$ProgramasPatrocinadores->isEmpty())

                    @foreach($Patrocinadores  as $Patrocinador)
                    @foreach($ProgramasPatrocinadores as $ProgramaPatrocinador)
                    @if($ProgramaPatrocinador->id == $Patrocinador->id )
                    <option value="{{  $Patrocinador->id }}" selected> {{ $Patrocinador->nombre}}</option>
                    @break;
                    @elseif ( $ProgramaPatrocinador == $ultimoPatrocinador)
                    <option value="{{  $Patrocinador->id }}" > {{ $Patrocinador->nombre}} </option>
                    @endif
                    @endforeach
                    @endforeach

                    @else
                    @foreach($Patrocinadores  as $Patrocinador)
                    <option value="{{  $Patrocinador->id }}" > {{ $Patrocinador->nombre}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group" align="center">
            @if( isset($ProgramasItem))
                {!! Form::submit('Modificar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Modificar', 'style'=>'width:20%','onclick'=>'return confirm ("¿Seguro que desea modificar el realizador?")'])!!}
            @else
                {!! Form::submit('Agregar',['class'=>'btn btn-success btn-xs tooltips','data-placement'=>'top','data-original-title'=>'Agregar', 'style'=>'width:20%'])!!}
            @endif
        </div>
    </div>
</div>

