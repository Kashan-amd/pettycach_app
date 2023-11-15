<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Petty Cash Type') }}
        </h2>
    </x-slot>

    <div class="py-12 bd">
        <div class="col-md-4 mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12"> 
                            <h5 style="text-align: center">Enter Type of Expense</h5>

                            <form class="container w-75 p-4"  action="{{ route('type.store') }}" method="POST" style="border-radius: 15px;">
                                @csrf
                                <div class="mb-3">
                                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus />
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
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

                    <div class="row">
                        <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div class="row" style="margin-top:0px;">
                                    <div class="col-md-12 mt-0 table-responsive">
                                        <table class="table container history-table" style="color:white;">
                                            <thead>
                                            <tr>
                                                <th class="text-start" scope="col" rowspan="2">Type</th>
                                                <th class="text-center" scope="col" rowspan="2" >Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key)
                                                <tr>
                                                    <td>{{$key->type}}</td>

                                                    <td class="text-center"> 
                                                        <a href="{{"types/delete/".$key->id}}"><i class="fa fa-trash" style="color: red"></i> </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>