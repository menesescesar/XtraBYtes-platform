@extends('layouts.master-backoffice')

@section('header_scripts')
<style>
    th {
        border-bottom: 1px solid #d6d6d6;
    }

    tr:nth-child(even) {
        background: #e9e9e9;
    }

    .pointer{
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="container col-md-12">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h2>XtraBYtes {{trans('prediction.Market Cap')}}: <i class="fa fa-usd"></i>{{ number_format($xby_market_cap,0,"."," ") }}</h2>
                </div>
                <div class="col-md-6 text-center">
                    <h2>XtraBYtes {{trans('prediction.Price')}}: <i class="fa fa-usd"></i>{{$xby_price_usd}} / {{ number_format($xby_price_btc,8)}}<i class="fa fa-btc"></i></h2>
                </div>
                <div class="col-md-12">
                    <h3>{{trans('prediction.TOP 3 Tokens')}}</h3>
                    <div data-role="main" class="ui-content">
                        <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow col-md-12">
                            <thead>
                            <tr>
                                <th>{{trans('prediction.Name')}}</th>
                                <th>{{trans('prediction.Symbol')}}</th>
                                <th data-priority="1">{{trans('prediction.Market Cap')}}</th>
                                <th data-priority="2">{{trans('prediction.Token Price')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($top3 as $top)
                                <tr>
                                    <td>{{$top->name}}</td>
                                    <td>{{$top->symbol}}</td>
                                    <td><i class="fa fa-usd"></i>{{number_format($top->marketcap,0,"."," ")}}</td>
                                    <td><i class="fa fa-usd"></i>{{number_format($top->priceusd,4,"."," ")}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3>{{trans('prediction.I Believe XBY can reach a market cap of')}}:</h3>
                </div>
                @foreach($top3 as $top)
                    <div class="col-md-6 form-inline">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="op_xby_market_cap" marketcap="{{$top->marketcap}}">
                        </span>
                            <span class="form-control">{{$top->name}} ({{$top->symbol}})</span>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_xby_market_cap">
                    </span>
                        <span class="form-control">{{trans('prediction.Custom')}}</span>
                    </div>
                </div>

                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.Market Cap')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control" id="op_xby_market_cap_usd" placeholder="{{trans('prediction.Marketcap in usd')}}">
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">XBY {{trans('prediction.Price')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <span type="text" class="form-control" id="op_xby_market_price"></span>
                    </div>
                </div>

                <hr class="col-md-12">

                <div class="col-md-12">
                    <h3>{{trans('prediction.I Believe Crypto can reach a market cap of')}}:</h3>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_crypto_market_cap" marketcap="1109000000000">
                    </span>
                        <span class="form-control">{{trans('prediction.Top 5 oil companies')}}
                            ( <span class="pointer" title="~ $343B">ExxonMobil</span>,
                            <span class="pointer" title="~ $228B">Shell</span>,
                            <span class="pointer" title="~ $206B">Chevron</span>,
                            <span class="pointer" title="~ $204B">PetroChina</span>,
                            <span class="pointer" title="~ $128B">Total</span> )
                        </span>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_crypto_market_cap" marketcap="1879000000000">
                    </span>
                        <span class="form-control">{{trans('prediction.Top 5 tech companies')}}
                            ( <span class="pointer" title="~ $741B">Apple</span>,
                            <span class="pointer" title="~ $367B">Alphabet</span>,
                            <span class="pointer" title="~ $340B">Microsoft</span>,
                            <span class="pointer" title="~ $231B">Facebook</span>,
                            <span class="pointer" title="~ $200B">Samsung</span> )
                        </span>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_crypto_market_cap" marketcap="7800000000000">
                    </span>
                        <span class="form-control">{{trans('prediction.Gold')}}</span>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_crypto_market_cap" marketcap="28600000000000">
                    </span>
                        <span class="form-control">{{trans('prediction.World Money')}} ({{trans('prediction.coins, bank notes, checking deposits')}})</span>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_crypto_market_cap" marketcap="70000000000000">
                    </span>
                        <span class="form-control">{{trans('prediction.All Stock Market')}}</span>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="op_crypto_market_cap">
                    </span>
                        <span class="form-control">{{trans('prediction.Custom')}}</span>
                    </div>
                </div>

                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.Market Cap')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control" id="crypto_market_cap" placeholder="{{trans('prediction.Marketcap in usd')}}">
                    </div>
                </div>

                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">XBY {{trans('prediction.Market Cap')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <span type="text" class="form-control" id="crypto_xby_market_cap"></span>
                    </div>
                </div>
                <div class="col-md-6 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">XBY {{trans('prediction.Price')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <span type="text" class="form-control" id="crypto_xby_market_price"></span>
                    </div>
                </div>

                <hr class="col-md-12">

                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.Bought all my XBY Tokens at roughly')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control" id="investment_price_tokens" placeholder="{{trans('prediction.value per token in usd')}}">
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.with a total of')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><img width="15px" src=" {{ asset('/img/xby-logo.png') }} " ></span>
                        <input type="text" class="form-control" id="investment_num_tokens" placeholder="{{trans('prediction.number of tokens')}}">
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.Tokens')}}.</p>
                    </div>
                </div>

                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.Total investment of')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <span type="text" class="form-control" id="investment_total_usd"></span>
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.The value now is')}} </p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <span type="text" id="investment_actual_value" class="form-control"></span>
                    </div>
                </div>

                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <p class="form-control-static">{{trans('prediction.With a future XBY market cap of')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control" id="xby_possible_market_cap" placeholder="{{trans('prediction.Possible marketcap in usd')}}">
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">, {{trans('prediction.the value of my investment would be')}}</p>
                    </div>
                    <div class="form-group input-group input-group-sm">
                        <span class="input-group-addon" ><i class="fa fa-usd"></i></span>
                        <span type="text" class="form-control" id="investment_possible_value"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')
    <script>
        var xby_supply = {{$xby_supply}};
        var xby_actual_marketcap = {{$xby_market_cap}};
        var xby_actual_price_usd = {{$xby_price_usd}};
        var crypto_actual_marketcap = {{$crypto_market_cap}};

        $(function() {
            clear();

            //objs for xby prediction
            var op_xby_market_price = $("#op_xby_market_price");
            var op_xby_market_cap_usd = $("#op_xby_market_cap_usd");

            $("input:radio[name=op_xby_market_cap]").click(function() {
                var marketcap = $(this).attr('marketcap');
                if(marketcap>0)
                {
                    op_xby_market_cap_usd.val( parseInt(marketcap).toLocaleString() );
                    op_xby_market_cap_usd.prop('disabled', true);
                    op_xby_market_price.html( (marketcap/xby_supply).toFixed(6) );
                }
                else
                {
                    op_xby_market_cap_usd.prop('disabled', false);
                }
            });

            op_xby_market_cap_usd.keyup(function() {
                var marketcap = $(this).val();
                marketcap = parseInt( marketcap.replace(/\s/g, '') );
                if(marketcap>0)
                {
                    op_xby_market_cap_usd.val( parseInt(marketcap).toLocaleString() );
                    op_xby_market_price.html( (marketcap/xby_supply).toFixed(6) );
                }
            });

            //objs for cryto prediction
            var crypto_xby_market_price = $("#crypto_xby_market_price");
            var crypto_xby_market_cap = $("#crypto_xby_market_cap");
            var crypto_market_cap = $("#crypto_market_cap");

            $("input:radio[name=op_crypto_market_cap]").click(function() {
                var crypto_marketcap = $(this).attr('marketcap');
                if(crypto_marketcap>0)
                {
                    var possible_xby_marketcap = (crypto_marketcap*xby_actual_marketcap)/crypto_actual_marketcap;
                    crypto_market_cap.val( parseInt(crypto_marketcap).toLocaleString() );
                    crypto_market_cap.prop('disabled', true);
                    crypto_xby_market_cap.html( (possible_xby_marketcap).toLocaleString() );
                    crypto_xby_market_price.html( (possible_xby_marketcap/xby_supply).toFixed(6) );
                }
                else
                {
                    crypto_market_cap.prop('disabled', false);
                }
            });

            crypto_market_cap.keyup(function() {
                var crypto_marketcap = $(this).val();
                crypto_marketcap = parseInt( crypto_marketcap.replace(/\s/g, '') );
                if(crypto_marketcap>0)
                {
                    var possible_xby_marketcap = (crypto_marketcap*xby_actual_marketcap)/crypto_actual_marketcap;
                    crypto_market_cap.val( parseInt(crypto_marketcap).toLocaleString() );
                    crypto_xby_market_cap.html( (possible_xby_marketcap).toLocaleString() );
                    crypto_xby_market_price.html( (possible_xby_marketcap/xby_supply).toFixed(6) );
                }
            });

            $("#xby_possible_market_cap").keyup(calc_investment);
            $("#investment_num_tokens").keyup(calc_investment);
            $("#investment_price_tokens").keyup(calc_investment);

        });

        function calc_investment()
        {
            var xby_possible_market_cap = $("#xby_possible_market_cap");
            var investment_possible_value = $("#investment_possible_value");
            var investment_actual_value = $("#investment_actual_value");
            var investment_total_usd = $("#investment_total_usd");
            var investment_num_tokens = $("#investment_num_tokens");
            var investment_price_tokens = $("#investment_price_tokens");

            if(investment_num_tokens.val()>0 && investment_price_tokens.val()>0)
            {
                investment_total_usd.html( (parseInt(investment_num_tokens.val())*parseFloat(investment_price_tokens.val())).toFixed(3) );
                investment_actual_value.html( (parseInt(investment_num_tokens.val())*parseFloat(xby_actual_price_usd)).toFixed(3) );

                var marketcap = xby_possible_market_cap.val();
                marketcap = parseInt( marketcap.replace(/\s/g, '') );
                if(marketcap>0)
                {
                    xby_possible_market_cap.val( marketcap.toLocaleString() );
                    var price = (marketcap/xby_supply).toFixed(6)
                    investment_possible_value.html( parseInt(investment_num_tokens.val())*parseFloat(price) );
                }
            }
        }

        function clear()
        {
            $("input:radio[name=op_xby_market_cap]").prop('checked', false);
            $("input:radio[name=op_crypto_market_cap]").prop('checked', false);
            $("#op_xby_market_cap_usd").val("");
            $("#crypto_market_cap").val("");
            $("#xby_possible_market_cap").val("");
            $("#investment_num_tokens").val("");
            $("#investment_price_tokens").val("");
        }

    </script>
@endsection
