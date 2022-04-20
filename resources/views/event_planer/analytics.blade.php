@extends('layouts.event_planer.template')
@section('title', 'Analytics')
@section('mainBody')

    <section class="content">
    <div class="container" id="analytic">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Analytics</h3>
                        <p>See where your sales are coming from, in real time</p>
                    </div>
                    <!-- /.box-header -->

                    <hr class="solid">
                    <div class="box-body">
                        <p>Updates every minute</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <select class="form-control report-category" id="report-category">
                                        <option value="sales">Sales</option>
                                        <option value="attendees">Attendees</option>
                                        <option value="traffic">Traffic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <select class="form-control">

                                        <option>Last 30 days</option>
                                        <option>Last 60 days</option>
                                        <option>Last 90 days</option>
                                        <option>All time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <select class="form-control">
                                        <option>Daily Data</option>
                                        <option>Hourly Data</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="eventname">Event Name</label>
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                                class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4 sales">
                                <div class="form-group">
                                <label for="eventname">Select</label>
                                    <select class="form-control">
                                        <option>Quantity Sold</option>
                                        <option>Gross sales</option>
                                        <option>Net sales</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <br><br>
                        <!-- <div class="row">
                            <div class="col-md-4 sales">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Quantity Sold</option>
                                        <option>Gross sales</option>
                                        <option>Net sales</option>
                                    </select>
                                </div>

                            </div> -->
                            <div class="col-md-4 attendees">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Number of Attendees</option>
                                        <option>Number of Orders</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4 traffic">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Page Views</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="analyticschart" width="200" height="200"></canvas>
                            </div>
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


    <script>
        $(document).ready(function() {
            $(".sales").show();
            $(".attendees").hide();
            $(".traffic").hide();
        });

        $(".report-category").click(function() {

            var select = document.getElementById('report-category');
            var value = select.options[select.selectedIndex].value;

            if (value == "sales") {
                $(".sales").show();
                $(".attendees").hide();
                $(".traffic").hide();

            } else if (value == "attendees") {
                $(".attendees").show();
                $(".sales").hide();
                $(".traffic").hide();
            } else {
                $(".traffic").show();
                $(".sales").hide();
                $(".attendees").hide();
            }
        });
    </script>

    {{-- Chart Js --}}
    <script>
        const ctx = document.getElementById('analyticschart').getContext('2d');
        const sales = new Chart(ctx, {
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
                    }
                ]
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
