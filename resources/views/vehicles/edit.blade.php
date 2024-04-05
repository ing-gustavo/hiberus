<x-layout>

    <div class="space-y-10 divide-y divide-gray-900/10">

        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">

            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit vehicle</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Please review and update the vehicle information as needed.</p>
            </div>

            <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" action="{{ route('vehicles.update',$vehicle->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="px-4 py-6 sm:p-8">

                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-4">
                            <x-input model="brand" label="Brand" value="{{ old('brand', $vehicle->brand) }}" ></x-input>
                        </div>

                        <div class="sm:col-span-4">
                            <x-input model="model" label="Model" value="{{ old('model', $vehicle->model) }}"></x-input>
                        </div>

                        <div class="sm:col-span-4">
                            <x-input model="plate" label="Plate" value="{{ old('plate', $vehicle->plate) }}"></x-input>
                        </div>

                        <div class="sm:col-span-4">
                            <x-input model="licenseRequired" label="License require"  value="{{ old('licenseRequired', $vehicle->licenseRequired) }}"></x-input>
                        </div>

                    </div>

                </div>

                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="/vehicles" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>

            </form>

        </div>

    </div>

</x-layout>
