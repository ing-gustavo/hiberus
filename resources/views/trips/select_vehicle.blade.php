<x-layout>

    <div class="space-y-10 divide-y divide-gray-900/10">

        <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">

            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create Trip</h2>
                <p>Choose desired vehicle</p>
            </div>

     
            <div class="col-span-2 px-4 py-6 sm:p-8 w-full">

                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Brand</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Model</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Plate</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Licenses required</th>
                            
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($vehicles as $vehicle)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $vehicle->brand }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicle->model }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicle->plate }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicle->licenseRequired }}</td>
                                
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <form action="{{route('trips.selectDriver')}}" method="post">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="date" value="{{$date}}">
                                        <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
                                        <button type="submit" class="text-green-600 hover:text-green-900">Select vehicle</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    <div class="flex p-6 items-center justify-center text-base font-semibold">
                                        No vehicles found
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

                

        </div>

    </div>

</x-layout>
