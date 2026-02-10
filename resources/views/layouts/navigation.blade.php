<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 sticky-top shadow-sm" style="height: 64px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-100">
        <div class="flex justify-between items-center h-100">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center me-4"> {{-- ເພີ່ມ me-4 ເພື່ອຍັບອອກຈາກຂອບ --}}
                    <a href="{{ url('/') }}" class="flex items-center gap-2 text-decoration-none pe-3 border-end"> {{-- ເພີ່ມເສັ້ນຂີດຂັ້ນ --}}
                        @if(isset($siteLogo) && $siteLogo)
                            {{-- ປ່ຽນຈາກ h-12 ເປັນ h-9 (ໃຫ້ logo ນ້ອຍລົງ) --}}
                            <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="h-9 w-auto object-contain">
                        @else
                            <i class="bi bi-mortarboard-fill fs-3 text-primary"></i>
                        @endif
                        {{-- ປັບ text-xl ເປັນ text-lg ແລະ ເພີ່ມ font-weight --}}
                        <span class="font-bold text-lg text-primary d-none d-sm-block tracking-tight">LTVC</span>
                    </a>
                </div>

                <div class="hidden space-x-6 sm:ms-6 sm:flex items-center h-100" style="font-family: 'Noto Sans Lao', sans-serif;">
                    <x-nav-link :href="url('/')" :active="request()->is('/')" class="h-100 flex items-center px-3 fw-medium">
                        {{ __('ໜ້າຫຼັກ') }}
                    </x-nav-link>
                     <x-nav-link :href="url('/about')" :active="request()->is('about*')" class="h-100 flex items-center px-3 fw-medium">
                        {{ __('ກ່ຽວກັບພວກເຮົາ') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/departments')" :active="request()->is('departments*')" class="h-100 flex items-center px-3 fw-medium">
                        {{ __('ພາກວິຊາ') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/news')" :active="request()->is('news*')" class="h-100 flex items-center px-3 fw-medium">
                        {{ __('ຂ່າວສານ') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/contact')" :active="request()->is('contact*')" class="h-100 flex items-center px-3 fw-medium">
                        {{ __('ຕິດຕໍ່ພວກເຮົາ') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border rounded-pill text-sm font-medium text-gray-700 bg-gray-50 hover:bg-white hover:text-primary focus:outline-none transition ease-in-out duration-150 border-gray-200 shadow-sm">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=004a99&color=fff&size=32" class="rounded-circle me-2" width="32">
                                <div class="fw-bold">{{ Auth::user()->name }}</div>
                                <div class="ms-1 text-gray-400">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('admin.dashboard')" class="text-decoration-none">
                                <i class="bi bi-speedometer2 me-2 text-primary"></i> {{ __('Dashboard Admin') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')" class="text-decoration-none">
                                <i class="bi bi-person-gear me-2"></i> {{ __('Profile') }}
                            </x-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-danger text-decoration-none fw-bold">
                                    <i class="bi bi-box-arrow-right me-2"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm btn-sm d-flex align-items-center">
                        <i class="bi bi-box-arrow-in-right me-2"></i> ເຂົ້າສູ່ລະບົບ
                    </a>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <i class="bi bi-list fs-2" x-show="!open"></i>
                    <i class="bi bi-x-lg fs-3" x-show="open"></i>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t bg-white pb-3 shadow-sm" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="url('/')" :active="request()->is('/')" class="rounded-3">
                {{ __('ໜ້າຫຼັກ') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/about')" :active="request()->is('about*')" class="rounded-3">
                {{ __('ກ່ຽວກັບພວກເຮົາ') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/departments')" :active="request()->is('departments*')" class="rounded-3">
                {{ __('ພາກວິຊາ') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="url('/news')" :active="request()->is('news*')" class="rounded-3">
                {{ __('ຂ່າວສານ') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/contact')" :active="request()->is('contact*')" class="rounded-3">
                {{ __('ຕິດຕໍ່ພວກເຮົາ') }}
            </x-responsive-nav-link>
        </div>
        </div>
</nav>