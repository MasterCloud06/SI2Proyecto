@extends('layouts.app')

@section('title', 'Crear Proveedor')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Crear Proveedor</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-700 p-4 mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-700 p-4 mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('suppliers.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf

            <label for="name" class="block mb-2">Nombre:</label>
            <input type="text" name="name" id="name" class="border p-2 mb-4 w-full" required>

            <label for="email" class="block mb-2">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="border p-2 mb-4 w-full" required>

            <label for="phone" class="block mb-2">Teléfono:</label>
            <input type="text" name="phone" id="phone" class="border p-2 mb-4 w-full">

            <label for="description" class="block mb-2">Descripción:</label>
            <textarea name="description" id="description" class="border p-2 mb-4 w-full"></textarea>

            <label for="supplies" class="block mb-2">Selecciona Suministros:</label>
            <div id="supplies_list" class="mb-4">
                @foreach($supplies as $supply)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="supply_{{ $supply->id }}"
                               name="supplies[{{ $supply->id }}][id]"
                               value="{{ $supply->id }}"
                               data-amount="{{ $supply->amount }}"
                               onchange="updateSupplies(this)">
                        <label for="supply_{{ $supply->id }}" class="ml-2">
                            {{ $supply->name }} - ${{ $supply->amount }}
                        </label>
                    </div>
                @endforeach
            </div>

            <table class="table-auto w-full mb-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Precio</th>
                        <th class="border px-4 py-2">Cantidad</th>
                        <th class="border px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                <tbody id="selected_supplies"></tbody>
            </table>

            <label for="total_amount" class="block mb-2">Precio Total:</label>
            <input type="text" id="total_amount" class="border p-2 mb-4 w-full" name="total_amount" value="0" readonly>

            <button type="submit" class="btn-primary w-full">Crear</button>
        </form>
    </div>

    <script>
        function updateSupplies(checkbox) {
            const supplyId = checkbox.value;
            const amount = parseFloat(checkbox.getAttribute('data-amount'));
            const selectedSuppliesBody = document.getElementById('selected_supplies');

            // Si el checkbox está marcado, añade el suministro a la tabla
            if (checkbox.checked) {
                // Crear una nueva fila en la tabla
                const row = document.createElement('tr');

                // Crear celdas para nombre y precio
                const nameCell = document.createElement('td');
                nameCell.classList.add('border', 'px-4', 'py-2');
                nameCell.textContent = checkbox.nextElementSibling.textContent; // Nombre del suministro

                const priceCell = document.createElement('td');
                priceCell.classList.add('border', 'px-4', 'py-2');
                priceCell.textContent = amount.toFixed(2); // Precio

                // Crear celda para la cantidad
                const quantityCell = document.createElement('td');
                quantityCell.classList.add('border', 'px-4', 'py-2');

                const quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.min = 1;
                quantityInput.value = 1; // Valor predeterminado
                quantityInput.classList.add('border', 'p-2', 'w-16');
                quantityInput.setAttribute('oninput', 'calculateTotal()');
                quantityInput.setAttribute('name', `supplies[${supplyId}][quantity]`); // Enviar cantidad en el formulario
                quantityInput.setAttribute('data-amount', amount); // Precio del suministro

                quantityCell.appendChild(quantityInput);

                // Crear celda para el subtotal
                const subtotalCell = document.createElement('td');
                subtotalCell.classList.add('border', 'px-4', 'py-2');
                subtotalCell.textContent = (amount * 1).toFixed(2); // Inicialmente el subtotal es 0

                row.appendChild(nameCell);
                row.appendChild(priceCell);
                row.appendChild(quantityCell);
                row.appendChild(subtotalCell);

                selectedSuppliesBody.appendChild(row);
            } else {
                // Si el checkbox se desmarca, eliminar la fila correspondiente
                const rows = selectedSuppliesBody.getElementsByTagName('tr');
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    if (row.cells[0].textContent === checkbox.nextElementSibling.textContent) {
                        selectedSuppliesBody.removeChild(row);
                        break;
                    }
                }
            }

            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            const quantityInputs = document.querySelectorAll('#selected_supplies input');

            quantityInputs.forEach(input => {
                const amount = parseFloat(input.getAttribute('data-amount'));
                const quantity = parseFloat(input.value);
                const subtotalCell = input.closest('tr').querySelector('td:last-child');
                const subtotal = amount * quantity;
                subtotalCell.textContent = subtotal.toFixed(2); // Actualizar el subtotal
                total += subtotal; // Sumar al total
            });

            document.getElementById('total_amount').value = total.toFixed(2);
        }
    </script>
@endsection
