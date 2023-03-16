@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <h2  class="title justify-content-center ls-normal mb-4 mt-10 pt-15 ">
            Choisissez votre formule
        </h2>
        <div class="row mb-5">
            <div class="col-lg-4 col-md-4">
                <div class="card price_card">
                    <div class="header-credit" style="background: #00890a ">
                        <span class="price-credit">2 000 <sup>F CFA</sup></span>
                        <span class="name-credit">CORA</span>
                    </div>
                    <div class="pricing-body text-center">
                        <span class="sign">+</span>
                        <span class="bonus">1 000 </span>
                        <span class="indicator"><sup>F CFA</sup>&nbsp; en bonus </span>
                    </div>
                    <a href="#" class="pricing-btn btn " style="background: #00890a ">Sélectionner</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card price_card">
                    <div class="header-credit" style="background: #000 ">
                        <span class="price-credit">10 000  <sup>F CFA</sup></span>
                        <span class="name-credit">Wari</span>
                    </div>
                    <div class="pricing-body text-center">
                        <span class="sign">+</span>
                        <span class="bonus">5 500 </span>
                        <span class="indicator"><sup>F CFA</sup>&nbsp; en bonus </span>
                    </div>
                    <a href="#" class="pricing-btn btn " style="background: #00890a ">Sélectionner</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card price_card">
                    <div class="header-credit" style="background: #00890a ">
                        <span class="price-credit">25 000  <sup>F CFA</sup></span>
                        <span class="name-credit">SIKA</span>
                    </div>
                    <div class="pricing-body text-center">
                        <span class="sign">+</span>
                        <span class="bonus">15 000  </span>
                        <span class="indicator"><sup>F CFA</sup>&nbsp; en bonus </span>
                    </div>
                    <a href="#" class="pricing-btn btn " style="background: #00890a ">Sélectionner</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection