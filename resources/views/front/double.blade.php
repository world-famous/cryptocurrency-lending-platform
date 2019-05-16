<section id="domain-checker">
    <div class="container">
        <div class="dc-inner">
            <div class="title text-center">
                <h2>Get Double Bitcoin</h2>
            </div>
            <div class="main">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <form method="POST" action="{{ route('wallet.register') }}">
                            {{csrf_field()}}
                            <div class="col-md-8">
                                <input type="text" name="walletid" class="form-control input-lg" placeholder="Enter Your Bitcoin Wallet...">
                                @if ($errors->has('walletid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('walletid') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-block btn-lg btn-custom " value="Double IT now" >
                            </div>
                        </form>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</section>