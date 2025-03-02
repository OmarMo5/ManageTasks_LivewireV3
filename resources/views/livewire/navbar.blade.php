<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">    
        <div class="w-full md:block md:w-auto" id="navbar-default">

            <ul class="font-medium flex flex-row p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#" class="py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 
                    md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{url('/')}}" class="py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent
                    md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 
                    dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent text-xl">Home</a>
                </li>
                <li>
                    <a href="{{route('livewire.task')}}" class="py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent 
                    md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 
                    dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent text-xl">Manage Tasks</a>
                </li>
                <li>
                    <a href="#" class="py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent 
                    md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 
                    dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent text-xl">Contact</a>
                </li>
                <li>
                    <a href="{{route('livewire.image')}}" class="py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent 
                    md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 
                    dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent text-xl">Image</a>
                </li>
                <li>
                    <div x-data="{
                        showModal: false,
                        handleKeydown(event) {
                            if (event.keyCode == 191) {
                                this.showModal = true;
                            }
                            if (event.keyCode == 27) {
                                this.showModal = false;
                                $wire.search = '';
                            }

                        },
                    }">
                        <button @click="showModal = true" type="button"
                            class="flex space-x-3 py-2 px-4 my-2 outline-none border-b border-slate-200" @keydown.window="handleKeydown">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            <span class="pr-6">Search</span>
                        </button>
                        @teleport('body')
                            <div x-show="showModal" x-trap="showModal" class="relative z-10" aria-labelledby="modal-title" role="dialog"
                                aria-modal="true">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                    <div class="flex justify-center p-4 sm:p-0">
                                        <div
                                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                            <div @click.outside="showModal = false" class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                <div class="w-full px-1 pt-1" x-data="{
                                                    searchPosts(event) {
                                                        document.getElementById('searchInput').focus();
                                                        event.preventDefault();
                                                    }
                                                }">
                                                    <input wire:model.live.throttle.500ms="search" type="text" id="searchInput"
                                                        class="block w-full flex-1 py-2 px-3 mt-2 outline-none border-none rounded-md bg-slate-100"
                                                        placeholder="Start Typing..." @keydown.slash.window="searchPosts" />
                                                    <div class="mt-2 w-full overflow-hidden rounded-md bg-white">
                                                        @foreach($result as $res)
                                                            <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
                                                                <p class="text-sm font-medium text-gray-600">{{$res->title}}</p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endteleport
                    </div>
                </li>
            </ul>
            
        </div>
    </div>
</nav>
