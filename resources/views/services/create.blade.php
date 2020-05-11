@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
<div class="dashboard-wrapper" style="margin-top: -30px">
    <div class="container-fluid dashboard-content">
        <br>
        <div class="container">
            <div class="row">
                <div class="page-header" id="top" style="width: 100%">
                    <h2 class="pageheader-title"><b>Servicios de transporte VIP 24/7</b></h2>
                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                    <p class="breadcrumb-link" style="font-weight: bold;">
                        Registra aquí una nueva carrera.
                    </p>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
        	<div class="container">
        		<div class="card">
        			<h5 class="card-header">INFORMACIÓN DE UBICACIÓN</h5>
        			<div class="card-body">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d30958.309722720314!2d-87.23153785!3d14.08964625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2shn!4v1585517583837!5m2!1ses-419!2shn" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
        		</div>
        	</div>
        </div>



        <div class="row">
        	<div class="col-md-9">
        		<form action="{{url('/carreras')}}" method="POST">
		        	{{ csrf_field() }}
        		<section class="cd-timeline js-cd-timeline">

		        	<div class="cd-timeline__container">
		        		<div class="cd-timeline__block js-cd-block">
		        			<div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
		                        <img src="../assets/vendor/timeline/img/cd-icon-user.svg" alt="Picture">
		                    </div>
		                    <div class="cd-timeline__content js-cd-content">
								<div class="row">
		                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
		                                <label for="client" style="border-bottom: 1px solid #ddd; width: 100%;margin-bottom: 15px"><p><b>Información correspondiente al cliente.</b></p></label>
		                                <div class="input-group">
		                                    <div class="input-group-prepend">
		                                        <span class="input-group-text" id="inputGroupPrepend">
		                                        	RTN
		                                        </span>
		                                    </div>
		                                    <input type="text" class="form-control" name="identity"  aria-describedby="inputGroupPrepend" maxlength="13" value="{{old('identity')}}" onkeypress='return validaNumericos(event)' required>
		                                </div>
		                            </div>
		                        </div><br>
		                    </div>
		        		</div>

		        		<div class="cd-timeline__block js-cd-block">
		        			<div class="cd-timeline__img cd-timeline__img--location js-cd-img">
		                        <img src="../assets/vendor/timeline/img/cd-icon-location.svg" alt="Picture">
		                    </div>
		                    <div class="cd-timeline__content js-cd-content">
		                		<div class="row">
		                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
		                            	<label for="client" style="border-bottom: 1px solid #ddd; width: 100%;margin-bottom: 15px"><p><b>Información correspondiente a la ubicación.</b></p></label>

		                                <label>Ubicación Actual</label>
		                                <div class="form-group">
		                                    <select class="form-control" name="starting_place">
		                                        @foreach($colonies as $colony)
		                                        <option value="{{$colony->id}}" {{ old('starting_place') == "$colony->id" ? "selected" : "" }}>{{$colony->name}}</option>
		                                        @endforeach
		                                    </select>
		                                </div><br>


		                                <label>Ubicación Destino</label>
		                                <div class="form-group">
		                                    <select class="form-control" name="arrival_place">
		                                        @foreach($colonies as $colony)
		                                        <option value="{{$colony->id}}" {{ old('arrival_place') == "$colony->id" ? "selected" : "" }}>{{$colony->name}}</option>
		                                        @endforeach
		                                    </select>
		                                </div><br>
		                            </div>
		                        </div>
		                    </div>
		        		</div>

		        		<div class="cd-timeline__block js-cd-block">
		        			<div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
		                        <img src="../assets/vendor/timeline/img/cd-icon-price.svg" alt="Picture">
		                    </div>
		                    <div class="cd-timeline__content js-cd-content">
		                		<div class="row">
		                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
		                            	<label for="client" style="border-bottom: 1px solid #ddd; width: 100%;margin-bottom: 15px"><p><b>Información correspondiente a la carrera.</b></p></label>

		                            	<div class="input-group">
		                                    <div class="input-group-prepend">
		                                        <span class="input-group-text" id="inputGroupPrepend">
		                                        	URL
		                                        </span>
		                                    </div>
		                                    <input type="text" class="form-control" name="url"  aria-describedby="inputGroupPrepend" value="{{old('url')}}" required>
		                                </div><br>

		                                <div class="input-group">
		                                    <div class="input-group-prepend">
		                                        <span class="input-group-text" id="inputGroupPrepend">
		                                        	Kilometraje
		                                        </span>
		                                    </div>
		                                    <input type="text" class="form-control" name="mileage"  aria-describedby="inputGroupPrepend" value="{{old('mileage')}}" required>
		                                </div><br>

		                                <div class="input-group" style="display: none">
		                                    <div class="input-group-prepend">
		                                        <span class="input-group-text" id="inputGroupPrepend">
		                                        	Fecha
		                                        </span>
		                                    </div>
		                                    <input type="datetime" style="padding-left: 5px;" name="date"  value="<?php echo date("d-m-Y");?>" readonly>
		                                </div><br>

		                                <div class="input-group" style="display: none">
		                                    <div class="input-group-prepend">
		                                        <span class="input-group-text" id="inputGroupPrepend">
		                                        	Hora
		                                        </span>
		                                    </div>
		                                    <input type="datetime" style="padding-left: 5px" name="time"  value="<?php echo date("H:i:s");?>" readonly>
		                                </div>

		                                <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display: none">
		                            </div>
		                        </div>
		                    </div>
		        		</div>
		        	</div>
		        	</form>
		        	<input type="submit" class="btn btn-warning btn-block" value="Registrar Carrera">
		        </section>
        	</div>
        	<div class="col-md-3">
        		@if(session('detalleFactura'))
        			<div class="alert alert-success" style="border-left: 4px solid #155724;">
                        <i class="fas fa-check-circle"></i>    Carrera registrada con éxito.
                    </div>
                    <div class="card border-3 border-top border-top-primary">
                    	<div class="card-header">
                    		Detalle Carrera
                    	</div>
                    	<div class="card-body">
                    		<ul class="list-group mb-3">
			                    <?php
			                    	$datos = explode(",", session('detalleFactura'));
			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<div>Datos conductor</div>";
			                    		echo "</div>";
			                    	echo '</li>';
			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<div style=''><i class='fas fa-user' style='color:#856404'></i>      Conductor<br>".$datos[1]."</div>";
			                    		echo "</div>";
			                    	echo '</li>';
			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<div style=''><i class='fas fa-phone' style='color:#856404'></i>      Teléfono<br>".$datos[2]."</div>";
			                    		echo "</div>";
			                    	echo '</li>';
			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<i class='far fa-money-bill-alt' style='color:#856404'></i>   Precio: ".$datos[0];
			                    		echo "</div>";
			                    	echo '</li><br>';

			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<div>Datos cliente</div>";
			                    		echo "</div>";
			                    	echo '</li>';
			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<div style='margin-bottom:7px'><i class='fas fa-user' style='color:#856404'></i>      Cliente<br>".$datos[3]."</div>";
			                    		echo "</div>";
			                    	echo '</li>';

			                    	echo '<li class="list-group-item d-flex justify-content-between">';
			                    		echo "<div>";
					                    	echo "<i class='fas fa-phone' style='color:#856404'></i>   Teléfono<br>".$datos[4]."<br>";
			                    		echo "</div>";
			                    	echo '</li>';
			                    ?>
					        </ul>
                    	</div>
                    	<div class="card-footer"></div>
                    </div>
                @endif
        		@if(session('notification'))
                    <div class="alert alert-danger" style="border-left: 4px solid #721c24;">
                        <i class="fas fa-exclamation-triangle"></i>    {{session('notification')}}
                    </div>
                @endif
        		@if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" style="border-left: 4px solid #721c24;">
                            <i class="fas fa-exclamation-triangle"></i>    {{$error}}
                        </div>
                    @endforeach
                @endif
        	</div>
        </div>  
    </div>
</div>
<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}" defer></script>
<script>
    $('#keep-order').multiSelect({
        keepOrder: true,
        afterSelect: function(values) {
            console.log("Select value: " + values);
        },
        afterDeselect: function(values) {
            console.log("Deselect value: " + values);
        }
    });

    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
            return true;
        }
        return false;      
    };
</script>
@endsection