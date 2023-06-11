@extends('layouts.front')
@section('content')
    <section>
    <div class="row">
        <div class="col-md-12">
        <div style="font-size: 1.5rem;" class="mb-3">Transaction History</div>
        
        </div>
    </div>
    
    <div style="font-size: 1.5rem;" class="mb-3">Token History</div>
        <div class="row">
            <ul
                class="nav nav-tabs chat_card--tabs d-flex"
                id="chat_box"
                role="tablist"
            >
                <li
                    class="nav-item"
                    role="presentation"
                >
                    <button
                        class="nav-link w-100 chat_card--btn active"
                        id="home-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#token_type"
                        type="button"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true"
                    >
                    <i class="bi bi-wallet2"></i>
                        Type
                    </button>
                </li>
                <li
                    class="nav-item"
                    role="presentation"
                >
                    <button
                        class="nav-link w-100 chat_card--btn"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#privateChat"
                        type="button"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >
                        <i
                            class="bi bi-chat-heart-fill"
                        ></i>
                       Private Chat
                    </button>
                </li>

                <li
                    class="nav-item"
                    role="presentation"
                >
                    <button
                        class="nav-link w-100 chat_card--btn"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#report"
                        type="button"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >
                    <i class="bi bi-file-bar-graph"></i>
                      Income Report
                    </button>
                </li>
            </ul>
  </div>

            <div
                class="tab-content pt-2 mt-20"
            >
                <div
                    class="tab-pane active show"
                    id="token_type"
                    role="tabpanel"
                    aria-labelledby="contact-tab"
                >
                    <div
                        class="tip_box"
                    >
                    <form class="d-flex justify-content-between call_history_filter"
                      style="margin-top: 1.5rem; margin-bottom: 1rem;">
                    <h5 >Type</h5>
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
                        <th>Date</th>
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
