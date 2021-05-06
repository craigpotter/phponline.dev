<x-site.container class="max-w-screen-xl">
    <div class="space-y-6">

        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Create an article
                </h3>
                
            </div>
            
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <textarea id="articleBody" name="articleBody" rows="3" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md" placeholder="Write something" wire:model="article.body"></textarea>
        </div>

        <div>{{$article->markdownBody()}}</div>

    </div>
</x-site.container>