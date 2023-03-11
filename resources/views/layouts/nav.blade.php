<nav x-data="accordion(6)"
    class="h-20 top-0 z-40 flex flex-wrap items-center justify-start w-full px-4 py-3 tracking-wide text-white bg-slate-900 shadow-md bg-opacity-90 md:px-8 lg:px-14">
    <!-- Left nav -->
    <div class="flex items-center">
        <a href="#" class="text-xl tracking-wide">
            Dashboard
        </a>
    </div>
    <!-- End left nav -->

    <!-- Right nav -->
    <!-- Show menu sm,md -->
    <!-- Toggle button -->
    <div @click="handleClick()" x-data="{ open: false }" class="block text-gray-600 cursor-pointer lg:hidden">
        <button @click="open = ! open" class="w-6 h-6 text-lg">
            <svg x-show="! open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                :clas="{ 'transition-full each-in-out transform duration-500': !open }">
                <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>

            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <!-- End toggle button -->

    <!-- Toggle menu -->
    <div x-ref="tab" :style="handleToggle()"
        class="relative w-full overflow-hidden transition-all duration-700 lg:hidden max-h-0">
        <div class="flex flex-col my-3 space-y-2 text-lg hover:font-b text-gray-600">
            <a href="#" class="hover:text-gray-900"><span>Link</span></a>
            <hr>
            <a href="#" class="hover:text-gray-900"><span>Link</span></a>
            <hr>
            <a href="#" class="hover:text-gray-900"><span>Link</span></a>
        </div>
        <!-- Dropdown -->
        <div x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block"
            :class="{ 'text-slate-400': open, 'text-slate-100': !open }">
            <!-- Dropdown Toggle Button -->
            <button @mouseover="open = true" class="flex items-center p-2 rounded-md">
                <span class="mr-4">Hover Dropdown</span>
                <span :class="open = !open ? '' : '-rotate-180'" class="transition-transform duration-500 transform">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </span>
            </button>
            <!-- End Dropdown Toggle Button -->

            <!-- Dropdown Menu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="absolute md:right-0 py-1 text-gray-500 bg-white rounded-lg shadow-xl min-w-max">
                <a href="#" class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">Lorem, ipsum.</a>
                <a href="#" class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">Lorem, ipsum
                    dolor.</a>
                <a href="#" class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">Lorem ipsum dolor
                    sit amet.</a>
            </div>
            <!-- End Dropdown Menu -->
        </div>
        <!-- End Dropdown 1 -->
        <div class="py-6 px-5 space-y-6">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                    About
                </a>

                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                    Contact
                </a>
            </div>
        </div>
        <div>
            <a href="#"
                class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700">
                Sign up
            </a>
            <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                <a href="#" class="text-gray-600 hover:text-gray-900">
                    Sign in
                </a>
            </p>
        </div>
    </div>
    <!-- End toggle menu -->
    <!-- End show menu sm,md -->

    <!-- Show Menu lg -->
    <div class="hidden w-full ml-12 lg:flex lg:items-center lg:w-auto">
        <div class="items-center flex-1 pt-6 justify-start text-lg text-slate-100 lg:pt-0 list-reset lg:flex">
            <div class="mr-3">
                <a href="{{route('users')}}" class="inline-block px-4 py-2 no-underline hover:text-slate-400 text-slate-100">
                    Users
                </a>
            </div>

            <div class="mr-3">
                <a href="{{route('products')}}" class="inline-block px-4 py-2 no-underline hover:text-slate-400 text-slate-100">
                    Products
                </a>
            </div>

            <!-- Dropdown -->
            <div x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block"
                :class="{ 'text-slate-400': open, 'text-slate-100': !open }">
                <!-- Dropdown Toggle Button -->
                <button @mouseover="open = true" class="flex items-center p-2 rounded-md">
                    <span class="mr-4">Hover Dropdown</span>
                    <span :class="open = !open ? '' : '-rotate-180'"
                        class="transition-transform duration-500 transform">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </button>
                <!-- End Dropdown Toggle Button -->

                <!-- Dropdown Menu -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="absolute right-0 py-1 text-gray-500 bg-white rounded-lg shadow-xl min-w-max">
                    <a href="#" class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">Lorem, ipsum.</a>
                    <a href="#" class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">Lorem, ipsum
                        dolor.</a>
                    <a href="#" class="block px-4 py-1 hover:text-gray-900 hover:bg-gray-100">Lorem ipsum dolor
                        sit amet.</a>
                </div>
                <!-- End Dropdown Menu -->
            </div>
            <!-- End Dropdown 1 -->
        </div>
    </div>
</nav>
<script>
    // Faq
    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });
        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? '-rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ?
                    `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
    //  end faq
</script>
