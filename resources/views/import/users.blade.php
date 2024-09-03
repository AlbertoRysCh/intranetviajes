<x-approxana-layout>
    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Importar Usuarios</button>
    </form>
    
</x-approxana-layout>