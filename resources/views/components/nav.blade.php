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
            <a href="{{ route('dashboard') }}"
               class="border border-[#242321] px-4 py-2.5 transition hover:bg-[#242321] hover:text-white">
                Mijn account
            </a>
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
