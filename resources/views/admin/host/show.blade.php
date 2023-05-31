<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Host" url="{{ url()->previous() ?? 'hosts' }}" />
    </x-slot>
    <x-slot name="css">
        <style>
            .w-30 {
                width: 30%;
            }

        </style>
    </x-slot>
    <div class="card card-custom">
        <div class="card-header">
            {{-- <div class="card-title">
                <span class="card-header-icon mr-2">
                    <i class="flaticon2-chat-1 text-success"></i>
                </span>
                <h3 class="card-label">
                    Host Detail
                </h3>
            </div> --}}
            <form action="{{ url('hosts/' . $host->uuid ) }}" method="get">
                <div class="d-flex mt-5 align-items-center">
                    <label for="" class="mr-5 w-30">Date Range</label>
                    <input type="text" id="kt_daterangepicker_2" name="query" value="{{ $query }}"  placeholder="Start Date" class="form-control mr-5">
                    <button class="btn btn-success">Search</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-separate table-head-custom text-capitalize table-checkable text-center" id="">
                <thead>
                    <tr>
                        <x-table-heading name="Source" />
                        <x-table-heading name="Call Duraion/Count/Total Coins" />
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total Paid Calls</td>
                        <td>{{ $host->total_calls ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td>Accepted Calls</td>
                        <td>{{ $host->total_accepted_calls ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td>Answer Rate</td>
                        <td>{{ $host->answer_rate.'%' ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td>Call Duration</td>
                        <td>{{ $host->call_duration ?? 0 }} seconds</td>
                    </tr>
                    <tr>
                        <td>Total Coin</td>
                        <td>{{ $host->total_coin ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td>Deducted Coin</td>
                        <td>{{ $host->deducted_coin ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td>Gift Coin</td>
                        <td>{{ $host->gift_coin ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td>Deduction</td>
                        <td>33%</td>
                    </tr>
                    <tr>
                        <td>Final Coin</td>
                        <td>{{ $host->final_coin ?? 0 }}</td>
                    </tr>
                     <tr>
                        <td>Total Free Calls</td>
                        <td>{{ $host->total_calls ?? 0 }}</td>
                    </tr>
                     <tr>
                        <td>Total Free Calls Coin</td>
                        <td>{{ $host->total_free_call_coins ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $(document).ready(()=>{
                $('#kt_daterangepicker_2').val('{{ $query ?? '' }}')
            })
        </script>
    </x-slot>
</x-layout>
