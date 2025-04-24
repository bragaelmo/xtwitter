<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h3>
    </x-slot>
    <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>

    <div class="max-w-xl mx-auto mt-10">
        <form action="{{ route('posts.store') }}" method="POST" class="mb-6">
            @csrf
            <textarea name="content"  id="tette-text" class="w-full border rounded p-3" rows="3" placeholder="O que está acontecendo?"   maxlength="120"  required></textarea>
            <div class="text-right text-sm text-gray-500 mt-1">
                <span id="char-count">120</span> caracteres restantes
            </div>
            <div class="flex justify-end mt-2">  
               
                <button type="button" id="emoji-toggle" class="text-2xl">😊</button> 
                <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Postar
                </button>
            </div>
            <div class="flex justify-end mt-2">
            <emoji-picker id="emoji-picker" class="absolute z-10 bg-white shadow rounded" style="width: 250px; display: none;"></emoji-picker>
            </div>
          
        </form>

        <hr class="mb-4">

        <div id="tettes-list">

        </div>

    <script>
        function atualizarTettes() {
            fetch('{{ route('posts.live') }}')
                .then(res => res.text())
                .then(html => {
                    document.getElementById('tettes-list').innerHTML = html;
                });
        }

        // Atualiza a cada 1 segundos
        setInterval(atualizarTettes, 1000);
    </script>

    <script>
        const picker = document.querySelector('#emoji-picker');
        const toggleBtn = document.querySelector('#emoji-toggle');
        const textarea = document.querySelector('#tette-text');

        toggleBtn.addEventListener('click', () => {
            picker.style.display = picker.style.display === 'none' ? 'block' : 'none';
        });

        picker.addEventListener('emoji-click', event => {
            const emoji = event.detail.unicode;
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            textarea.value = text.slice(0, start) + emoji + text.slice(end);
            textarea.focus();
            textarea.setSelectionRange(start + emoji.length, start + emoji.length);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.querySelector('#tette-text');
            const count = document.querySelector('#char-count');

            if (textarea && count) {
                textarea.addEventListener('input', function () {
                    const remaining = 120 - textarea.value.length;
                    count.textContent = remaining;
                    count.classList.toggle('text-red-500', remaining <= 10); 
                });
            }
        });
    </script>
</x-app-layout>
