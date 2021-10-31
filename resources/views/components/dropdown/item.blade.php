<a {{ $attributes->merge(['class' => $getClasses()]) }}>
    @if ($icon)
        <x-dynamic-component
            :component="WireBladeComponent::resolve('icon')"
            :name="$icon"
            class="w-5 h-5 mr-2"
        />
    @endif

    {{ $label ?? $slot }}
</a>
