<div>
    <div class="w-6">
        <h1 class="text-3xl">Comments</h1>
        <form class="my-4 flex">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind.">
            <div class="py-2">
                <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
            </div>
        </form>
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="font-bold text-lg"></p>
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">3 mins ago
                    </p>
                </div>
                <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"></i>
            </div>
            <p class="text-gray-800">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel nam sit harum pariatur soluta fugiat, ipsum nesciunt iure quam a magni quos adipisci! Saepe deleniti odio explicabo autem! Deleniti, numquam.</p>
        </div>
    </div>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>

