
<h1>Reporte de usuarios registrados</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Creación</th>
        <th>Habilitado</th>
        <th>Verificado</th>
    </tr>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->created_at }}</td>
            <td>{{ $usuario->activo ? 'si' : 'no' }}</td>
            <td>{{ $usuario->email_verified_at }}</td>
        </tr>
    @endforeach
</table>
<p>reporte desde {{ $fecha_inicio }} hasta {{ $fecha_fin }}</p>
