<!-- filepath: resources/views/users/index.blade.php -->
<h1>Liste des utilisateurs</h1>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Rôle</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->role ?? 'membre' }}</td>
    </tr>
    @endforeach
</table>