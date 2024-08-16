<header x-data="{ mobileMenuOpen: false }" class="relative z-30 @if(Request::is('/')){{ 'bg-white' }}@else{{ 'bg-zinc-50' }}@endif">
    <div class="px-8 mx-auto max-w-7xl xl:px-5">
        <div class="flex relative z-30 justify-between items-center h-24 md:space-x-6">
            <div class="inline-flex">
            <!-- data-replace='{ "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }' -->
                <a href="{{ route('home') }}" class="flex justify-center items-center space-x-3 text-blue-500 transition-all duration-1000 ease-out transform">
                   <x-logo class="w-auto h-8"></x-logo>
                </a>
            </div>
            <div class="flex flex-grow justify-end -my-2 -mr-2 md:hidden">
                <button @click="mobileMenuOpen = true" type="button" class="inline-flex justify-center items-center p-2 rounded-full transition duration-150 ease-in-out text-zinc-400 hover:text-zinc-500 hover:bg-zinc-100 focus:outline-none focus:bg-zinc-100 focus:text-zinc-500">
                    <svg class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path></svg>
                </button>
            </div>

            <nav class="hidden absolute relative top-0 left-0 z-20 justify-center items-center w-full md:block">
                <div x-data="{
                            navigationMenuOpen: false,
                            navigationMenu: '',
                            navigationMenuCloseDelay: 200,
                            navigationMenuCloseTimeout: null,
                            navigationMenuLeave() {
                                let that = this;
                                this.navigationMenuCloseTimeout = setTimeout(() => {
                                that.navigationMenuClose();
                                }, this.navigationMenuCloseDelay);
                            },
                            navigationMenuReposition(navElement) {
                                this.navigationMenuClearCloseTimeout();
                                    console.log(this.$refs.navigationDropdown.offsetWidth/2);
                                    this.$refs.navigationDropdown.style.left = navElement.offsetLeft + 'px';
                                    console.log(navElement.offsetLeft);
                                    this.$refs.navigationDropdown.style.marginLeft = (navElement.offsetWidth/2) + 'px';
                            },
                                navigationMenuClearCloseTimeout(){
                                clearTimeout(this.navigationMenuCloseTimeout);
                                },
                                navigationMenuClose(){
                                this.navigationMenuOpen = false;
                                this.navigationMenu = '';
                            }
                        }" class="relative z-10 w-auto"
                    >
                        <div class="relative">
                            <ul class="flex flex-1 justify-center items-center p-1 list-none rounded-md text-zinc-500 group">
                                <li class="px-0.5" @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='platform'" @mouseleave="navigationMenuLeave()">
                                    <button :class="{ 'text-zinc-900 bg-zinc-100' : navigationMenu=='platform', 'hover:text-zinc-900' : navigationMenu!='platform' }" class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-sm font-medium rounded-full transition-colors focus:outline-none disabled:opacity-50 disabled:pointer-events-none group">
                                        <span>Platform</span>
                                        <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'platform' }" class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                </li>
                                <li class="px-0.5" @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='resources'" @mouseleave="navigationMenuLeave()">
                                    <button :class="{ 'text-zinc-900 bg-zinc-100' : navigationMenu=='resources', 'hover:text-zinc-900' : navigationMenu!='resources' }" class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-sm font-medium rounded-full transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none group">
                                        <span>Resources</span>
                                        <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'resources' }" class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                </li>
                                <li class="px-0.5">
                                    <a href="#_" class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-sm font-medium rounded-full transition-colors hover:text-zinc-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none hover:bg-zinc-100 group">
                                        Pricing
                                    </a>
                                </li>
                                <li class="px-0.5">
                                    <a href="#_" class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-sm font-medium rounded-full transition-colors hover:text-zinc-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none hover:bg-zinc-100 group">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <div x-ref="navigationDropdown" 
                        x-show="navigationMenuOpen" 
                        x-transition:enter="transition ease-out duration-300" 
                        x-transition:enter-start="opacity-0 scale-[0.9] pointer-events-none translate-y-0" 
                        x-transition:enter-end="opacity-100 scale-100 pointer-events-default translate-y-11" 
                        x-transition:leave="transition ease-in duration-300" 
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0" 
                        x-transition:leave-end="opacity-0 scale-[0.9] translate-y-11" 
                        @mouseover="navigationMenuClearCloseTimeout()" 
                        @mouseleave="navigationMenuOpen=false" 
                        class="absolute top-0 pt-4 duration-200 ease-out -translate-x-1/2 translate-y-11" 
                    x-cloak>
                        <div class="flex overflow-hidden justify-center w-auto h-auto bg-white rounded-2xl border shadow-sm border-neutral-200/70">
                            <div x-show="navigationMenu == 'platform'" class="flex gap-x-3 justify-center items-stretch p-3 w-full max-w-7xl">
                                <div class="flex relative flex-col justify-center items-center p-10 w-48 h-full text-center bg-blue-600 rounded-xl">
                                    <img src="{{ Storage::url('images/wave-white.png') }}" class="z-20 w-auto h-4 -translate-x-1.5">
                                    <h3 class="z-30 mt-1 mt-4 text-xs font-normal text-blue-200">Start building your next great idea.</h3>
                                    <a href="https://devdojo.com/wave" class="block relative items-center px-4 py-2 mt-5 w-full text-sm font-medium leading-5 text-center text-blue-500 bg-white rounded-full border border-transparent shadow-sm transition duration-150 ease-in-out hover:bg-zinc-100 focus:outline-none focus:border-zinc-300 focus:shadow-outline-gray active:bg-zinc-100">
                                        Download
                                    </a>
                                </div>
                                <div class="flex-shrink-0 w-72">
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100 group">
                                        <span class="block mb-1 font-medium text-black">Authentication</span>
                                        <span class="block font-light leading-5 opacity-50">Configure the login, register, and forgot password for your app</span>
                                    </a>
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Roles and Permissions</span>
                                        <span class="block leading-5 opacity-50">We utilize the bullet-proof Spatie Permissions package</span>
                                    </a>
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Subscriptions</span>
                                        <span class="block leading-5 opacity-50">Integration payments and let users subscribe to a plan</span>
                                    </a>
                                </div>
                                <div class="flex-shrink-0 w-72">
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Posts and Pages</span>
                                        <span class="block font-light leading-5 opacity-50">Easily write blog articles and create pages for your application</span>
                                    </a>
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Themes</span>
                                        <span class="block leading-5 opacity-50">Kick-start your app with a pre-built theme or create your own</span>
                                    </a>
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Settings and More</span>
                                        <span class="block leading-5 opacity-50">Easily create and update app settings. And so much more</span>
                                    </a>
                                </div>
                            </div>
                            <div x-show="navigationMenu == 'resources'" class="flex justify-center items-stretch p-3 w-full">
                                <div class="w-72">
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Documentation</span>
                                        <span class="block font-light leading-5 opacity-50">Learn how to setup, install, and configure Wave.</span>
                                    </a>
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Videos</span>
                                        <span class="block font-light leading-5 opacity-50">A series of video screencasts to help you get started.</span>
                                    </a>
                                    <a href="#_" @click="navigationMenuClose()" class="block px-3.5 py-3 text-sm rounded-xl hover:bg-neutral-100">
                                        <span class="block mb-1 font-medium text-black">Blog</span>
                                        <span class="block leading-5 opacity-50">Wave comes with a full blogging platform. See an example here. </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="hidden relative z-30 flex-shrink-0 justify-center items-center space-x-3 h-full text-sm md:flex">
                @if(auth()->guest())
                    <a href="{{ route('login') }}" class="px-4 py-2 font-medium rounded-full text-zinc-500 hover:bg-zinc-100 whitespace-no-wrap hover:text-blue-600 focus:outline-none focus:text-zinc-900">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex justify-center items-center px-4 py-2 font-medium text-white bg-blue-500 rounded-md rounded-full border border-transparent shadow-sm transition duration-150 ease-in-out whitespace-no-wrap hover:bg-blue-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-wave active:bg-blue-700">
                        Sign up
                    </a>
                @else
                    <a href="{{ route('wave.dashboard') }}" class="inline-flex justify-center items-center px-4 py-2 font-medium text-white bg-blue-500 rounded-md rounded-full border border-transparent shadow-sm transition duration-150 ease-in-out whitespace-no-wrap hover:bg-blue-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-wave active:bg-blue-700">
                        View Dashboard
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenuOpen" x-transition:enter="duration-300 ease-out scale-100" x-transition:enter-start="opacity-50 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-75 ease-in scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-100" class="absolute inset-x-0 top-0 z-40 transition transform origin-top md:hidden">
        <div class="shadow-lg">
            <div class="bg-white divide-y-2 divide-zinc-50 shadow-xs">
                <div class="pt-6 pb-6 space-y-6">
                    <div class="flex justify-between items-center px-8 mt-1">
                        <div>
                            <x-logo class="w-auto h-8"></x-logo>
                        </div>
                        <div class="-mr-2">
                            <button @click="mobileMenuOpen = false" type="button" class="inline-flex justify-center items-center p-2 rounded-full transition duration-150 ease-in-out text-zinc-400 hover:text-zinc-500 hover:bg-zinc-100 focus:outline-none focus:bg-zinc-100 focus:text-zinc-500">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <nav class="grid row-gap-8">
                            <a href="#" class="flex items-center px-8 py-3 space-x-3 rounded-md transition duration-150 ease-in-out hover:bg-zinc-50">
                                <svg class="flex-shrink-0 ml-0.5 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                                <div class="text-base font-medium leading-6 text-zinc-900">
                                    Authentication
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-8 py-3 space-x-3 rounded-md transition duration-150 ease-in-out hover:bg-zinc-50">
                                <svg class="flex-shrink-0 ml-0.5 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="text-base font-medium leading-6 text-zinc-900">
                                    Roles and Permissions
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-8 py-3 space-x-3 rounded-md transition duration-150 ease-in-out hover:bg-zinc-50">
                                <svg class="flex-shrink-0 ml-0.5 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                <div class="text-base font-medium leading-6 text-zinc-900">
                                    Subscriptions
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-8 py-3 space-x-3 rounded-md transition duration-150 ease-in-out hover:bg-zinc-50">
                                <svg class="flex-shrink-0 ml-0.5 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                <div class="text-base font-medium leading-6 text-zinc-900">
                                    Posts and Pages
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-8 py-3 space-x-3 rounded-md transition duration-150 ease-in-out hover:bg-zinc-50">
                                <svg class="flex-shrink-0 ml-0.5 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                <div class="text-base font-medium leading-6 text-zinc-900">
                                    Themes
                                </div>
                            </a>
                            <a href="#" class="flex items-center px-8 py-3 space-x-3 rounded-md transition duration-150 ease-in-out hover:bg-zinc-50">
                                <svg class="flex-shrink-0 ml-0.5 w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <div class="text-base font-medium leading-6 text-zinc-900">
                                    Settings and More
                                </div>
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="px-8 py-6 space-y-6">
                    <div class="grid grid-cols-2 px-1 pb-4 row-gap-4 col-gap-8">
                        <a href="/#pricing" class="text-base font-medium leading-6 transition duration-150 ease-in-out text-zinc-900 hover:text-zinc-700">
                            Pricing
                        </a>
                        <a href="#" class="text-base font-medium leading-6 transition duration-150 ease-in-out text-zinc-900 hover:text-zinc-700">
                            Docs
                        </a>
                        <a href="#" class="text-base font-medium leading-6 transition duration-150 ease-in-out text-zinc-900 hover:text-zinc-700">
                            Blog
                        </a>
                        <a href="#" class="text-base font-medium leading-6 transition duration-150 ease-in-out text-zinc-900 hover:text-zinc-700">
                            Videos
                        </a>
                    </div>
                    <div class="space-y-6">
                        @if(auth()->guest()) 
                            <a href="{{ route('register') }}" class="flex justify-center items-center px-4 py-3 w-full text-base font-medium leading-6 text-white bg-blue-600 rounded-md rounded-full border border-transparent shadow-sm transition duration-150 ease-in-out hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-wave active:bg-blue-700">
                                Sign up
                            </a>
                            <p class="text-base font-medium leading-6 text-center text-zinc-500">
                                Existing customer?
                                <a href="{{ route('login') }}" class="text-blue-600 transition duration-150 ease-in-out hover:text-blue-500">
                                    Sign in
                                </a>
                            </p>
                        @else
                            <a href="{{ route('wave.dashboard') }}" class="flex justify-center items-center px-4 py-3 w-full text-base font-medium leading-6 text-white bg-blue-600 rounded-md rounded-full border border-transparent shadow-sm transition duration-150 ease-in-out hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-wave active:bg-blue-700">
                                View Dashboard
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Mobile Menu --}}
</header>
