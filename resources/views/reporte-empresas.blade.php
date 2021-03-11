
<h1>Reporte de empresas registradas</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Nit</th>
        <th>Creación</th>
    </tr>
    @foreach($empresas as $empresa)
        <tr>
            <td>{{ $empresa->id }}</td>
            <td>{{ $empresa->nombre }}</td>
            <td>{{ $empresa->nit }}</td>
            <td>{{ $empresa->created_at }}</td>
        </tr>
    @endforeach
</table>
<p>reporte desde {{ $fecha_inicio }} hasta {{ $fecha_fin }}</p>
