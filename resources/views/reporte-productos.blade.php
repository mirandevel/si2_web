<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio(Unitario)</th>
        <th>Calificacion</th>
        <th>Cantidad</th>
        <th>Marca</th>
        <th>Garantia(meses)</th>
    </tr>
    @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->calificacion }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->marca }}</td>
            <td>{{ $producto->tiempo }}</td>
        </tr>
    @endforeach
</table>
