<nav
    class="mx-auto flex min-h-[68px] max-w-[1600px] items-center justify-between gap-5 px-5 sm:px-8 lg:px-14 border-b-2 border-[#756e5f]"
    aria-label="Hoofdnavigatie">
    <a href="{{ url('/') }}"
       class="shrink-0 text-sm font-semibold uppercase tracking-[0.24em] sm:text-base">
        DEFIANCE
    </a>

    <div class="flex items-center gap-3 text-sm sm:gap-5">
        @guest
            <a href="{{ route('login') }}"
               class="rounded-none border border-[#242321] px-4 py-2.5 transition hover:bg-[#242321] hover:text-white sm:px-5">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-[#242321] px-4 py-2.5 text-white transition hover:bg-[#4b4945] sm:px-5">
                Register
            </a>
        @else
            <span class="hidden text-sm text-[#6e6a64] sm:inline">
                        Hallo, {{ Auth::user()->name }}
                    </span>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="border border-[#242321] px-4 py-2.5 transition hover:bg-[#242321] hover:text-white">
                            <div>Mijn account</div>

                            <div class="ms-1">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Settings') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            {{--            <a href="{{ route('dashboard') }}"--}}
            {{--               class="border border-[#242321] px-4 py-2.5 transition hover:bg-[#242321] hover:text-white">--}}
            {{--                Mijn account--}}
            {{--            </a>--}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-2 py-2.5 text-sm underline underline-offset-4 hover:text-[#77716a]">
                    Uitloggen
                </button>
            </form>
        @endguest
    </div>
</nav>
