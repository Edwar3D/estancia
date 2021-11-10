
<form id="form_inspectores" action="{{ route('ciudadano') }}" class="my-3">
    <div class="row ">
        <div class="form-inline justify-content-center col-md-6 ">
            <p class="mr-2 my-auto">Dependencia:</p>
            <select id="select_dependencia" name="select_dependencia" form="form_inspectores"
                class="form-control my-auto" onchange="selectDependencia()">
                <option value="0" selected>
                    Todas las dependencias
                </option>
                @foreach ($options as $item)
                    <option value="{{ $item->id }}"
                        {{ $item->id == $request['select_dependencia'] ? ' selected' : '' }}>
                        {{ $item->dependencia }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-inline col-md-6 justify-content-center mt-sm-3  mt-md-0">
            <input id="search" name="search" class="form-control col-6 mr-1" type="search"
                placeholder="Nombre del inspector" value="@php echo $request['search'] ?? '' @endphp">
            <button class="btn btn-outline-success mr-2" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <a onclick="ver()" id="btn-clean" href="{{ route('ciudadano') }}" type="button"
                class="btn btn-light rounded-pill">
                Ver Todos
            </a>
        </div>
</form>

<script>
    var btnAll = document.getElementById('btn-clean');
    var selected = document.getElementById('select_dependencia');
    var search = document.getElementById('search');
    if (parseInt(selected.value) == 0 && search.value == '') {
        btnAll.style.visibility = 'hidden'
    } else {
        btnAll.style.visibility = 'visble'
    }
    console.log(selected.value);

    function selectDependencia() {
        console.log(event.target.value);
        location.href = "/ciudadano?select_dependencia=" + event.target.value + "&search=" + document.getElementById(
            'search').value;

    }
</script>
