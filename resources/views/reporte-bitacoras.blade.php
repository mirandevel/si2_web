
<h1>Reporte de bitácoras</h1>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>
    @foreach($bitacoras as $bitacora)
        <tr>
            <td>{{ $bitacora->name }}</td>
            <td>{{ $bitacora->descripcion }}</td>
            <td>{{ $bitacora->fecha }}</td>
            <td>{{ $bitacora->hora }}</td>
        </tr>
    @endforeach
</table>
<p>reporte desde {{ $fecha_inicio }} hasta {{ $fecha_fin }}</p>
