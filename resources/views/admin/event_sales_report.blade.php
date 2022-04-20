@extends('layouts.admin.template')
@section('title', 'Event Sales Report')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Event Sales Report</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="event_name">Event Name</label>
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                                class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ticket Type</label>
                                    <select class="form-control">
                                        <option>Select Ticket Type</option>
                                        <option>Paid</option>
                                        <option>Free</option>
                                        <option>Donation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="datetime-local" id="start_date" class="form-control pull-right"
                                            name="event_start">
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="datetime-local" id="end_date" class="form-control pull-right"
                                            name="event_end">
                                    </div>

                                </div>
                            </div>


                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-6">
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-3">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Orders</h3>
                                    <h3>4</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Gross Sales</h3>
                                    <h3>$23.00</h3>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Actual Sales</h3>
                                    <h3>6</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Target Sales</h3>
                                    <h3>120</h3>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Revenue</h3>
                                    <h3>$15.00</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Net Sales</h3>
                                    <h3>$15.00</h3>
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>New Customers</h3>
                                    <h3>2</h3>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Profit</h3>
                                    <h3>$35</h3>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="event-detail"
                                    style="border: 2px solid #2e6da4;padding: 13px;border-radius: 9px;">
                                    <h3>Tickets Sold</h3>
                                    <h3>35</h3>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="eventschart" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



    </section>




@endsection

@section('custom-js')
    {{-- Chart Js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    {{-- Chart Js --}}
    <script>
        // function get_data(){
        //     // ajax
        //     var data = {'paid' : 300 , "Free": 50 , "Donation" :100}
        //     return data
        // }
        const ctx = document.getElementById('myChart').getContext('2d');
        var getvalues = get_data
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Paid',
                    'Free',
                    'Donation'
                ],
                datasets: [{
                    label: 'Ticket Types',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            }

        });
    </script>

    {{-- Chart Js --}}
    <script>

        const chart = document.getElementById('eventschart').getContext('2d');
        const page_views = new Chart(chart, {
            type: 'line',
            data: {
                labels: ['1 April', '2 April', '3 April', '4 April', '5 April', '6 April'],
                datasets: [{
                    label: 'Page Views',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
