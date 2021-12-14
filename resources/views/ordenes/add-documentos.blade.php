<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="col-12 text-right ">
                        <a class="btn btn-secondary  btn-sm mx-2 my-2" href="{{ route('ordenes.index') }}">
                            <i class="fas fa-arrow-circle-left d-inline"></i>
                            <span class="d-inline">Salir</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="conatiner-fluid">

                            @foreach ($tiposDocumento as $item)
                                <form id="formFile{{ $item->id }}" class="col-12 formFile"
                                    enctype="multipart/form-data">
                                    <input class="form-control" type="tipo" name="tipo" value={{ $item->id }}
                                        hidden>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <label>Tipo de documento:</label>
                                                <p > {{ $item->tipo }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-8" id="inputFile{{ $item->id }}">
                                            <label>Archivo:</label>
                                            <div class="form-group has-feedback input-group">
                                                <input class="form-control form-control-sm" id="file" name="file"
                                                    type="file" accept="application/pdf" required>
                                                <span class="glyphicon glyphicon-info-sign  form-control-feedback">
                                                </span>
                                                <div class="input-group-append">
                                                    <button type="submit" id="btnUpload{{ $item->id }}"
                                                        class="btn btn-outline-primary  btn-sm btnUpload"
                                                        onclick="upload({{ $item->id }})">
                                                        <span id="spinner{{ $item->id }}"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true" hidden></span>
                                                        Subir
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="file{{ $item->id }}" class="row" hidden>
                                            <div class="col-md-1 my-auto">
                                                <img src="{{ asset('img/pdf_icon.png') }}" class="mx-3"
                                                    width="50px" height="50px" alt="">
                                            </div>
                                            <div class="col-md-10 my-auto ">
                                                <a id="delete{{ $item->id }}"
                                                    class="btn btn-danger btn-xs remove my-auto ml-5 ">
                                                    Eliminar</a>
                                                <a id="view{{ $item->id }}" target="_blank"
                                                    class="btn btn-primary btn-xs remove my-auto ">
                                                    Visualizar</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            @endforeach

                            {{-- <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ asset('img/pdf_icon.png') }}" class="mx-3" width="50px"
                                        height="50px" alt="">
                                </div>
                                <div class="col-md-3 pl-5">
                                    <a class="btn btn-danger btn-xs remove my-auto ">
                                        Eliminar</a>
                                    <a class="btn btn-primary btn-xs remove my-auto ">
                                        Visualizar</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
