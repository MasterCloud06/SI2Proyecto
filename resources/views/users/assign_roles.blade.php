<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Asignar Roles a {{ $user->name }}</h1>

        <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
            @csrf
            <label for="roles" class="block font-bold mb-2">Selecciona los Roles:</label>
            <select name="roles[]" id="roles" class="block w-full mb-4" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        @if($user->roles->contains($role)) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Asignar Roles
            </button>
        </form>
    </div>
</x-app-layout>
