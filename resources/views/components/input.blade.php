@php
    $hasError = false;
    if ($name) { $hasError = $errors->has($name) && !$errorless; }
@endphp

<div class="@if($disabled) opacity-60 @endif">
    @if ($label || $cornerHint)
        <div class="flex {{ !$label && $cornerHint ? 'justify-end' : 'justify-between' }} mb-1">
            @if ($label)
                <x-dynamic-component
                    :component="WireBladeComponent::resolve('label')"
                    :label="$label"
                    :has-error="$hasError"
                    :for="$id"
                />
            @endif

            @if ($cornerHint)
                <x-dynamic-component
                    :component="WireBladeComponent::resolve('label')"
                    :label="$cornerHint"
                    :has-error="$hasError"
                    :for="$id"
                />
            @endif
        </div>
    @endif

    <div class="relative rounded-md @unless($shadowless) shadow-sm @endunless">
        @if ($prefix || $icon)
            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none
                {{ $hasError ? 'text-negative-500' : 'text-secondary-400' }}">
                @if ($icon)
                    <x-dynamic-component
                        :component="WireBladeComponent::resolve('icon')"
                        :name="$icon"
                        class="h-5 w-5"
                    />
                @elseif($prefix)
                    <span class="pl-1 flex items-center self-center">
                        {{ $prefix }}
                    </span>
                @endif
            </div>
        @elseif($prepend)
            {{ $prepend }}
        @endif

        <input {{ $attributes->merge([
            'class'        => $getInputClasses($hasError),
            'type'         => 'text',
            'autocomplete' => 'off',
        ]) }} />

        @if ($suffix || $rightIcon || ($hasError && !$append))
            <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none
                {{ $hasError ? 'text-negative-500' : 'text-secondary-400' }}">
                @if ($rightIcon)
                    <x-dynamic-component
                        :component="WireBladeComponent::resolve('icon')"
                        :name="$rightIcon"
                        class="h-5 w-5"
                    />
                @elseif ($suffix)
                    <span class="pr-1 flex items-center justify-center">
                        {{ $suffix }}
                    </span>
                @elseif ($hasError)
                    <x-dynamic-component
                        :component="WireBladeComponent::resolve('icon')"
                        name="exclamation-circle"
                        class="h-5 w-5"
                    />
                @endif
            </div>
        @elseif ($append)
            {{ $append }}
        @endif
    </div>

    @if (!$hasError && $hint)
        <label @if ($id) for="{{ $id }}" @endif class="mt-2 text-sm text-secondary-500 dark:text-secondary-400">
            {{ $hint }}
        </label>
    @endif

    @if ($name && !$errorless)
        <x-dynamic-component
            :component="WireBladeComponent::resolve('error')"
            :name="$name"
        />
    @endif
</div>