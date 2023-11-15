
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Petty Cash History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <form action="{{ route('history.index') }}" method="GET" class="text-end ">
                @csrf
                <x-text-input id="search" class="inline mt-1 md:px-12" type="text" placeholder="Search Description..." name="search"/>
                <x-text-input style="background-color:#111827;color:grey" type="date" id="start_date" name="start_date"/>
                <x-text-input class="mt-2" style="background-color:#111827;color:grey" type="date" id="end_date" name="end_date"/>

                <button type="submit">
                    <x-primary-button class="ml-0 mb-3" style="background-color:#1f2937">
                    {{ __('Filter') }}
                    </x-primary-button>
                </button>
            </form>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row" style="margin-top:0px;">
                        <div class="col-md-12 mt-0 table-responsive">
                            <table class="table container history-table" style="color:white;">
                                <thead>
                                <tr>
                                    <th class="text-start" scope="col" rowspan="2">Date</th>
                                    <th class="text-start" scope="col" rowspan="2">Description</th>
                                    <th class="text-start" scope="col" rowspan="2">Amount</th>
                                    <th class="text-center" scope="col" colspan="{{$type->count()}}">Analyses of expenses</th>
                                    <th class="text-center" scope="col" rowspan="2" >Action</th>
                                </tr>
                                <tr>
                                    @foreach($type as $key)
                                    <th class="text-start" scope="col">{{$key->type}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pettycash as $transaction)
                                    <tr>
                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->description}}</td>
                                        <td>{{number_format((float)$transaction->amount, 2, '.', '')}}</td>
                                        
                                        @foreach($type as $key)
                                        <td>
                                            @if ($transaction->type == $key->id)
                                            {{number_format((float)$transaction->amount, 2, '.', '')}}
                                            @endif
                                        </td>
                                        @endforeach

                                        <td class="text-center"> 
                                            <a href="{{"delete/".$transaction->id}}"><i class="fa fa-trash" style="color: red"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th class="text-left">Total</th>
                                        <td> <div style="font-weight: bold; color: rgb(86, 86, 192)"> {{ number_format((float)$amountTotal, 2, '.', '') }} </div></td>
                                        @foreach ($type as $typeItem)
                                            @if (isset($typetotals[$typeItem->id]))
                                                <td> <div style="font-weight: bold; color: rgb(86, 86, 192)"> {{ number_format((float)$typetotals[$typeItem->id], 2, '.', '') }} </div></td>
                                            @else
                                                <td style="font-weight: bold; color: rgb(86, 86, 192)">---</td>
                                            @endif
                                        @endforeach
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <a href="{{ route('export.excel') }}" class="text-end">  
                                <x-primary-button class="ml-0 mb-3" style="background-color:#1f2937">
                                {{ __('Export') }}
                                </x-primary-button>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
