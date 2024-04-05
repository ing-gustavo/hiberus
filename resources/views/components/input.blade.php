@props(['label','model'])

<div @class(['rounded-md border  bg-white border-gray-300  px-3 py-1 shadow-sm focus-within:border-gray-light focus-within:ring-1 focus-within:ring-gray-dark','border-red-600' => $errors->has($model)])>
    <label for="{{ $model }}" class="block text-xs font-medium text-gray-900 capitalize">{{ __($label) }}</label>
    <input name="{{ $model }}" id="{{ $model }}"   {{ $attributes }} class="block w-full border-0 p-0 text-gray-900  focus:ring-0 focus:outline-none sm:text-sm bg-white"/>
    @error($model)
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
