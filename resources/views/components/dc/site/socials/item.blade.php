<a href="{{ $social->href }}" class="socials-icon-wrapper">
    <div class="socials-icon-box">
        <img
            class="socials-icon"
            src="/vendor/fontawesome-free/svg/brands/{{ strtolower($social->plattform) }}.svg"
            alt="Icon {{ $social->plattform }}"
        />
    </div>
</a>
