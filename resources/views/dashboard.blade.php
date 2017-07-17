@extends('layouts.master-backoffice')

@section('header_scripts')
<style>
    hr{
        border-top: 1px solid #DDD;
    }
</style>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h1 style="margin: 0;">{{ trans('dashboard.Dashboard') }}</h1>
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <h3>{{ trans('dashboard.Crypto') }} {{ trans('dashboard.Stats') }}</h3>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Marketcap') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        {{ number_format($last_market_stats->total_marketcap_usd, 0, ',', ' ') }}
                        @if( isset($date_markets_1day) )
                            @if( $last_market_stats->total_marketcap_usd == $date_markets_1day->total_marketcap_usd )
                                <!-- no change -->
                                @elseif( $last_market_stats->total_marketcap_usd > $date_markets_1day->total_marketcap_usd )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Volume 24h') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        {{ number_format($last_market_stats->total_24h_volume_usd, 0, ',', ' ') }}
                        @if( isset($date_markets_1day) )
                            @if( $last_market_stats->total_24h_volume_usd == $date_markets_1day->total_24h_volume_usd )
                                <!-- no change -->
                                @elseif( $last_market_stats->total_24h_volume_usd > $date_markets_1day->total_24h_volume_usd )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Bitcoin dominance') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            {{ $last_market_stats->btc_percent_marketcap }} %
                            @if( isset($date_markets_1day) )
                                @if( $last_market_stats->btc_percent_marketcap == $date_markets_1day->btc_percent_marketcap )
                                <!-- no change -->
                                @elseif( $last_market_stats->btc_percent_marketcap > $date_markets_1day->btc_percent_marketcap )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Active currencies') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            {{ $last_market_stats->active_currencies }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Active assets') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            {{ $last_market_stats->active_assets }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Last update') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            {{ $last_market_stats->created_at }}
                        </p>
                    </div>
                </div>

                <hr class="col-md-8 col-md-offset-2">

                <div class="col-md-10 col-md-offset-1">
                    <h3>XtraBYtes {{ trans('dashboard.Stats') }}</h3>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Marketcap') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        {{ number_format($last_market_xby_stats->marketcap_usd, 0, ',', ' ') }}
                        @if( isset($date_markets_xby_1day) )
                            @if( $last_market_xby_stats->marketcap_usd == $date_markets_xby_1day->marketcap_usd )
                                <!-- no change -->
                                @elseif( $last_market_xby_stats->marketcap_usd > $date_markets_xby_1day->marketcap_usd )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Volume 24h') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        {{ number_format($last_market_xby_stats->volume_24h_usd, 0, ',', ' ') }}
                        @if( isset($date_markets_xby_1day) )
                            @if( $last_market_xby_stats->volume_24h_usd == $date_markets_xby_1day->volume_24h_usd )
                                <!-- no change -->
                                @elseif( $last_market_xby_stats->volume_24h_usd > $date_markets_xby_1day->volume_24h_usd )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Rank') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                        {{ $last_market_xby_stats->rank }}
                        @if( isset($date_markets_xby_1day) )
                            @if( $last_market_xby_stats->rank == $date_markets_xby_1day->rank )
                                <!-- no change -->
                                @elseif( $last_market_xby_stats->rank > $date_markets_xby_1day->rank )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Price usd') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        {{ $last_market_xby_stats->price_usd }}
                        @if( isset($date_markets_xby_1day) )
                            @if( $last_market_xby_stats->price_usd == $date_markets_xby_1day->price_usd )
                                <!-- no change -->
                                @elseif( $last_market_xby_stats->price_usd > $date_markets_xby_1day->price_usd )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.Price btc') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            <i class="fa fa-btc" aria-hidden="true"></i>
                        {{ number_format($last_market_xby_stats->price_btc,8) }}
                        @if( isset($date_markets_xby_1day) )
                            @if( $last_market_xby_stats->price_btc == $date_markets_xby_1day->price_btc )
                                <!-- no change -->
                                @elseif( $last_market_xby_stats->price_btc > $date_markets_xby_1day->price_btc )
                                    <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                                @else
                                    <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.24h change') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            {{ $last_market_xby_stats->percent_change24h }} %
                            @if($last_market_xby_stats->percent_change24h>0)
                                <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                            @else
                                <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="col-md-12">
                        <p>
                            <b>{{ trans('dashboard.7d change') }}</b>
                        </p>
                    </div>
                    <div class="col-md-12 clearfix">
                        <p>
                            {{ $last_market_xby_stats->percent_change7d }} %
                            @if($last_market_xby_stats->percent_change7d>0)
                                <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                            @else
                                <i class="fa fa-arrow-down" aria-hidden="true" style="color:red;"></i>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="chart-container" style="position: relative; margin: auto; height: 30vh; width: 100%;">
                        <canvas id="chart"></canvas>
                    </div>
                </div>

                <hr class="col-md-8 col-md-offset-2">

                <div class="col-md-10 col-md-offset-1">
                    <h3>{{ trans('dashboard.Spotlight') }} {{ trans('dashboard.24h change') }} </h3>
                </div>

                @foreach($spotlight_24h as $token)
                    <div class="col-md-2 text-center">
                        <div class="col-md-12">
                            <p style="@if($token->symbol == 'XBY') {{'text-decoration: underline;'}} @endif">
                                <b>{{$token->name}} ({{$token->symbol}})</b>
                            </p>
                        </div>
                        <div class="col-md-12 clearfix">
                            <p>
                                {{$token->percent_change24h}} %
                                <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                            </p>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-10 col-md-offset-1">
                    <h3>{{ trans('dashboard.Spotlight') }} {{ trans('dashboard.7d change') }} </h3>
                </div>

                @foreach($spotlight_7d as $token)
                    <div class="col-md-2 text-center">
                        <div class="col-md-12">
                            <p style="@if($token->symbol == 'XBY') {{'text-decoration: underline;'}} @endif">
                                <b>{{$token->name}} ({{$token->symbol}})</b>
                            </p>
                        </div>
                        <div class="col-md-12 clearfix">
                            <p>
                                {{$token->percent_change7d}} %
                                <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                            </p>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-10 col-md-offset-1">
                    <h3>{{ trans('dashboard.Spotlight') }} {{ trans('dashboard.Volume') }} </h3>
                </div>

                @foreach($spotlight_volume as $token)
                    <div class="col-md-2 text-center">
                        <div class="col-md-12">
                            <p style="@if($token->symbol == 'XBY') {{'text-decoration: underline;'}} @endif">
                                <b>{{$token->name}} ({{$token->symbol}})</b>
                            </p>
                        </div>
                        <div class="col-md-12 clearfix">
                            <p>
                                <i class="fa fa-usd" aria-hidden="true"></i>{{number_format($token->volume_24h_usd, 0, ',', ' ')}}
                                <i class="fa fa-arrow-up" aria-hidden="true" style="color: green"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script>
        var data = {
            labels: [<?php echo '"'.implode('","',  $arr_days ).'"' ?>],
            datasets: [
                {
                    label: "{{trans ('dashboard.Price usd')}}",
                    backgroundColor: "rgba(132,99,255,0.2)",
                    borderColor: "rgba(132,99,255,1)",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(132,99,255,0.4)",
                    hoverBorderColor: "rgba(132,99,255,1)",
                    yAxisID: "y-axis-0",
                    data: [<?php echo '"'.implode('","',  $arr_xby_price_usd ).'"' ?>],
                },
                {
                    label: "{{trans ('dashboard.Marketcap')}}",
                    backgroundColor: "rgba(250,188,5,0.2)",
                    borderColor: "rgba(250,188,5,1)",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(250,188,5,0.4)",
                    hoverBorderColor: "rgba(250,188,5,1)",
                    yAxisID: "y-axis-1",
                    data: [<?php echo '"'.implode('","',  $arr_xby_marketcap ).'"' ?>],
                },
                {
                    label: "{{trans ('dashboard.Price btc')}}",
                    backgroundColor: "rgba(250,50,50,0.2)",
                    borderColor: "rgba(250,50,50,1)",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(250,50,50,0.4)",
                    hoverBorderColor: "rgba(250,50,50,1)",
                    yAxisID: "y-axis-2",
                    data: [<?php echo '"'.implode('","',  $arr_xby_price_btc ).'"' ?>],
                }
            ]
        };

        var options = {
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    position: "left",
                    "id": "y-axis-0",
                    scaleLabel: {
                        display: true,
                        labelString: '{{trans("dashboard.Price usd")}}'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(132,99,255,0.2)"
                    }
                },{
                    position: "right",
                    "id": "y-axis-1",
                    scaleLabel: {
                        display: true,
                        labelString: '{{trans("dashboard.Marketcap")}}'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(250,188,5,0.2)"
                    }
                },{
                    position: "right",
                    "id": "y-axis-2",
                    scaleLabel: {
                        display: true,
                        labelString: '{{trans("dashboard.Price btc")}}'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(250,50,50,0.2)"
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        };

        Chart.Line('chart', {
            options: options,
            data: data
        });
    </script>
@endsection
