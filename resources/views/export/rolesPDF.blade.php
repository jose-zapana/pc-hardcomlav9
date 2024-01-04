<html>
<head>

</head>
<body>
    <img src="{{ asset('/images/method_ship/1.jpg') }}" width="246px" height="205px" alt="metodo de envio">
    <table border="1px">
        <thead>
            <tr>
                <th>
                    Nombre Rol
                </th>
                <th>
                    Fecha de creación
                </th>
                <th>
                    Permisos
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $roles as $role )
            <tr>
                <td>{{ $role->description }}</td>

                <td>{{ $role->created_at }}</td>

                <td>
                    <ul>
                        @foreach( $role->permissions as $permission )
                        <li>
                            {{$permission->description}}
                        </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>