<x-app-layout>
  <x-slot name="header">
      <link rel="stylesheet" href="{{ asset("css/diceño.css")}}">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </x-slot>


  
  <div class="py-0">
      <div class="max-w-6xl mx-auto sm:px-8 lg:px-10">
          <div class=" overflow-hidden  ">
            <div class="fon">
              <div class="cont">
                  <div class="row">
                    
                    <div class=" col-md-6 col-sm-12">
                      <h3 class="title">Cliente: {{$clientes[0]["ncliente"]}}</h3>
                     <label for="" class="label"  >Tipo de servicio: {{$tiposerviciocotizara[0]["tiposervicio"]}}</label>
                     <label for="" class="label">Fecha de cotizacion: {{$cotizacion[0]["fechadecot"]}}</label>
                     <Label class="label">lugar de Expedicion: {{$cotizacion[0]["lugardeex"]}}</Label>
                     <label for="" class="label">Tiempo de entrega: {{$cotizacion[0]["tipodeent"]}}</label>
                     <label for="" class="label">Servicios: </label>
                     <div class="row">
                        @foreach ($servicios as $ser)
                            <div class="col-7">
                              <Label value='{{$ser->pk_servicios}}'>{{$ser->servicio}}</Label>
                            </div>
                            <div class="col-5" style="justify-content: end; align-items: flex-end; text-align: end"">
                              <label value='{{$ser->pk_servicios}}'>{{$ser->preservicio}} $</label>
                            </div>
                        @endforeach
                     </div>
                     <div class="row">
                      @foreach ($servicios as $se)
                        <div class="col-7">
                          <Label value='{{$se->pk_servicios}}'>Descuento de {{$se->descuento}}</Label>
                        </div>
                        <div class="col-5" style="justify-content: end; align-items: flex-end; text-align: end">
                          <label value='{{$se->pk_servicios}}'>Del {{$se->cantdescu}} %</label>
                        </div>
                      @endforeach
                     </div>
                     <div class="row">
                      <div class="col-7">
                        <Label>Total</Label>
                      </div>
                      <div class="col-5" style="justify-content: end; align-items: flex-end; text-align: end">
                        <label >$ {{$servicios[0]["total"]}}</label>
                      </div>
                      <Button class="boton">Descargar Cotizacion</Button>
                     </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="fig">
                        <figure class="figure">
                          <img src="{{ asset('img/1.jpg') }}" class="figure-img img-fluid rounded" alt="...">
                          <figcaption class="figure-caption text-end">Aqui aparecera el video.</figcaption>
                        </figure>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      @foreach ($procesotrabajo as $pro)
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card " style="width: 90%; margin: 5px; border-color: white;">
                          <div class="card-body">
                            <h5 class="card-title" value='{{$pro->pk_procesotrabajo}}' >{{$pro->protrab}}</h5>
                            <p class="card-text" style="font-size: .3cm">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div>
                      <div class="card">
                        <div class="card-header">
                          <label for="" class="title">Incluye</label>
                        </div>
                        <div class="card-body">
                          <div class="row ">
                            @foreach ($incluye as $inc)
                            <div class="col-sm-6 col-md-4">
                              <label for="" value="{{$inc->pk_incluye}}">{{$inc->modincluye}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                  </div>
                  <div>
                    <div>
                      <div>
                        <label class="fre title" >Proyectos </label>
                      </div>
                      <div class="row">
                      @foreach ($proyecto as $proy)
                        <div class="col">
                          <div class="card" style="width: 15rem; margin: 10px">
                            <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title" value="{{$proy->pk_proyectos}}">{{$proy->nproyecto}}</h5>
                              <p class="card-text" value="{{$proy->pk_proyectos}}">{{$proy->descripcion}}</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                        
                      </div>
                    </div>
                  </div>
                  <div>
                    <div>
                      <div>
                        <label class="fre title">Preguntas frecuentes </label>
                      </div>
                      <div>
                        <div class="accordion" id="accordionExample">
                          @foreach ($tiposerviciocotizara as $tip)
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button value="{{$tip->pk_tiposerviciocotizar}}" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{$tip->preguntasfre}}
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div> 
                          @endforeach
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div>
                      <label class="fre title">Clientes Satisfechos</label>
                    </div>
                    <div>
                      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('img/2.png') }}" class="d-block w-90 h-50" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('img/3.png') }}" class="d-block w-90 h-50" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('img/4.png') }}" class="d-block w-90 h-50" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          </div>
      </div>
  </div>
  <div class="elementor-container elementor-column-gap-default">
    <div class="elementor-row">
      <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-224ff73" data-id="224ff73" data-element_type="column">
          <div class="elementor-column-wrap elementor-element-populated">
            <div class="elementor-widget-wrap">
              <div class="elementor-element elementor-element-59fa7a4 elementor-widget elementor-widget-heading" data-id="59fa7a4" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                      <p class="elementor-heading-title elementor-size-default">© Grupo Desarrollo y Tecnología Bridge S.A. de C.V.
                        <br> Todos los derechos reservados</p>		</div>
                  </div>
              </div>
            </div>
          </div>
          <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-73d7b2f4" data-id="73d7b2f4" data-element_type="column">
            <div class="elementor-column-wrap elementor-element-populated">
              <div class="elementor-widget-wrap">
                <div class="elementor-element elementor-element-4794e212 elementor-widget elementor-widget-heading" data-id="4794e212" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                    <p class="elementor-heading-title elementor-size-default">Desarrollado con <span style="color: #ff0000;"><img draggable="false" role="img" class="emoji" alt="❤" src="https://s.w.org/images/core/emoji/14.0.0/svg/2764.svg" style="height: 20px; width: 20px"></span> por <a href="https://www.bridgestudio.mx">Bridge Studio</a>
                    </p>		
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  
</x-app-layout>
