<x-dynamic-component
    :component="WireBladeComponent::resolve('checkbox')"
    {{ $attributes->merge(['type' => 'radio', 'class' => '!rounded-full']) }}
    :label="$label"
    :left-label="$leftLabel"
    :md="$md"
    :lg="$lg"
/>
