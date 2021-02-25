<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio(Unitario)</th>
        <th>Cantidad</th>
        <th>Marca</th>
        <th>Fecha(venta)</th>
    </tr>
    @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->marca }}</td>
            <td>{{ $producto->fecha }}</td>
        </tr>
    @endforeach
</table>
