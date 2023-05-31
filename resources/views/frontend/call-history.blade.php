@extends('layouts.front')
@section('content')
    <section>
        {{-- <div style="margin-bottom: 1rem;">
            <h3>
                Call History
            </h3>

        </div> --}}

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form class="d-flex justify-content-between call_history_filter"
                      style="margin-top: 1.5rem; margin-bottom: 1rem;">
                    <div style="font-size: 1.5rem;">Call History</div>
                    <div class="d-flex align-items-center call_history_filter--date" style="gap: 1rem;">
                        <input placeholder="Last 30 days" name="daterange" class="inputBox1" type="text"
                               value="{{ $date }}" id="date"/>
                        <div>
                            <button class="btn btn__search" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-dark table-striped" style="color: #888888;">
                        <thead>
                        <th>#</th>
                        @if (isRole('user'))
                            <th>Model</th>
                        @else
                            <th>User</th>
                        @endif
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Token</th>
                        </thead>
                        <tbody>
                        @forelse ($calls as $call)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if (isRole('user'))
                                    <td>{{ $call->host?->name }}</td>
                                @else
                                    <td>{{ $call->user?->name }}</td>
                                @endif
                                <td>{{ $call->start_time }}</td>
                                <td>{{ $call->end_time ?? 'N/A' }}</td>
                                <td>{{ $call->duration ?? 'N/A' }}</td>
                                <td>{{ callResponseType()[$call->call_status] ?? 'N/A' }}</td>
                                <td>{{ $call->call_coin ?? 'N/A' }}</td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7">
                                    <h5 class="text-center">No Record Found</h5>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <script>
        $(function () {
            var start = "{{ $start }}" || moment().subtract(6, 'days');
            var end = "{{ $end }}" || moment();
            $('input[name="daterange"]').daterangepicker({
                startDate: start,
                endDate: end,
                maxDate: moment(),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection

@section('css')
    <style>
        .inputBox1 {
            border-radius: 20px;
            background-color: black;
            height: 35px;
            padding: 0 10px;
            border: 2px solid white;
            color: white;
        }

        .btn__search {
            background-color: var(--primary);
            color: #fff;
            border-radius: 2rem;
        }

        .btn__search:hover {
            background-color: var(--primary) !important;
            color: #fff;
        }

        .daterangepicker {
            background-color: #000 !important;
        }

        .daterangepicker .calendar-table {
            background-color: #000 !important;
        }

        .daterangepicker .ranges li:hover {
            background-color: #2c3034 !important;
        }

        .daterangepicker td.available:hover,
        .daterangepicker th.available:hover,
        .daterangepicker td.off,
        .daterangepicker td.off.in-range,
        .daterangepicker td.off.start-date,
        .daterangepicker td.off.end-date {
            background-color: #000 !important;
        }

        .daterangepicker td.active,
        .daterangepicker td.active:hover,
        .daterangepicker .ranges li.active {
            background-color: var(--primary) !important;
        }

        .daterangepicker .drp-buttons .cancelBtn {
            background-color: #fff !important;
        }

        .daterangepicker .drp-buttons .cancelBtn:hover {
            color: #000 !important;
        }

        .daterangepicker .drp-buttons .applyBtn {
            background-color: var(--primary) !important;
            border-color: transparent !important;
        }

        .next.available,
        .prev.available,
        .calendar-table .table-condensed .next.available:hover,
        .calendar-table .table-condensed .prev.available:hover {
            background-color: #fff !important;
        }

        @media screen and (max-width: 600px) {
            .call_history_filter {
                display: flex;
                flex-direction: column;
                margin-top: 0 !important;
                gap: 1rem;
            }
            .call_history_filter .inputBox1{
                width: 60%;
            }
            .call_history_filter--date{
                justify-content: flex-end;
            }
        }
    </style>
@stop
