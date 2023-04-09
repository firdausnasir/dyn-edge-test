<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($customer->id) ? __('Edit Customer') . ': ' . $customer->id : __('Create Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <form action="@isset($customer?->id) {{ route('customers.update', $customer) }} @else {{ route('customers.store') }} @endisset"
                              method="POST">
                            @csrf
                            @isset($customer?->id)
                                @method('PUT')
                            @endisset
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full name</label>
                                    <input type="text" id="full_name" name="full_name"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="John" value="{{ old('full_name', $customer?->full_name) }}" required>
                                    <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" id="email" name="email"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="Doe" value="{{ old('email', $customer?->email) }}" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="ic_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IC Number</label>
                                    <input type="text" id="ic_no" name="ic_no"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="001230018372" value="{{ old('ic_no', $customer?->ic_no) }}" required>
                                    <x-input-error :messages="$errors->get('ic_no')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" max="{{ date('Y-m-d') }}" value="{{ old('date_of_birth', $customer?->date_of_birth) }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           required>
                                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="mobile_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
                                    <input type="tel" id="mobile_no" name="mobile_no" value="{{ old('mobile_no', $customer?->mobile_no) }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="phone_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                    <input type="tel" id="phone_no" name="phone_no" value="{{ old('phone_no', $customer?->phone_no) }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                                    <input type="tel" id="state" name="state" value="{{ old('state', $customer?->state) }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>
                                <div>
                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mb-1">Select an option</label>
                                    <select id="countries" name="country_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose a country</option>
                                        @foreach($countries as $countryId => $countryName)
                                            <option value="{{ $countryId }}" @selected($customer?->country_id === $countryId)>{{ $countryName }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                                </div>
                            </div>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
