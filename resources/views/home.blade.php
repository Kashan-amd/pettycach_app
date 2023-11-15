<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Petty Cash Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bd">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12"> 
                            <h5 style="text-align: center">Enter Expense Details</h5>

                            <form class="container w-75 p-4"  action="{{ route('store') }}" method="POST" style="border-radius: 15px;">
                                @csrf
                                <div class="mb-3">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                                    <span style="color: red">@error('date')
                                        {{$message}}
                                    @enderror</span>
                                </div>
                                <div  class="mb-3">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 py-2 w-full" type="text" name="description" :value="old('description')" required autofocus/>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    <span style="color: red">@error('description')
                                        {{$message}}
                                    @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <x-input-label for="amount" :value="__('Amount')" />
                                    <x-text-input id="amount" class="block mt-1 py-2 w-full" type="number" name="amount" :value="old('amount')" required autofocus/>
                                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                    <span style="color: red">@error('amount')
                                        {{$message}}
                                    @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <x-input-label for="type" :value="__('Type')" />
                                    <!-- <x-text-input id="type" class="block mt-1 py-2 w-full" type="text" name="type" :value="old('type')" required autofocus/> -->
                                    <select style="background-color:#111827;color:white" name="type" class="form-control my-1" id="type">
                                        <option value="" selected disabled>Select Expense Type</option>
                                        @foreach($type as $key)
                                        <option value="{{$key->id}}">{{ $key->type }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">@error('type')
                                        {{$message}}
                                    @enderror</span>
                                </div>

                                <button type="submit" class="mt-3">
                                    <x-primary-button class="ml-0 mt-3" style="background-color:#1f2937">
                                    {{ __('Submit') }}
                                    </x-primary-button>
                                </button>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>