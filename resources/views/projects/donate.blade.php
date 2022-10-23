@extends('layouts.master')
@section('content')
<main>

    <section class="donate-section">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mx-auto">
                    <form class="custom-form donate-form" action="donateTo/{{$event->id}}" method="post" role="form">
                        @csrf
                        <h3 class="mb-4">Make a donation</h3>

                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h5 class="mb-3">{{$event->name}}</h5>
                            </div>
                            <hr>

                            <div class="col-lg-12 col-12">
                                <h5 class="mt-2 mb-3">Select an amount</h5>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault1"
                                        value="10">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        10 Jd
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault2"
                                        value="15">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        15 Jd
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault3"
                                        value="20">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        20 Jd
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault4"
                                        value="30">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        30 Jd
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault5"
                                        value="40">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        40 Jd
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault6"
                                        value="50">
                                    <label class="form-check-label" for="flexRadioDefault6">
                                        50 Jd
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 form-check-group">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Jd</span>

                                    <input type="text" class="form-control" placeholder="Custom amount"
                                        aria-label="Username" aria-describedby="basic-addon1" name="amount_text">
                                </div>
                            </div>
                            @error('amount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="col-lg-12 col-12">
                                <h5 class="mt-1">Personal Info</h5>
                            </div>

                            <div class="col-lg-6 col-12 mt-2">
                                <input type="text" name="name" id="donation-name" class="form-control"
                                    @if(Auth::check()) value="{{auth()->user()->name}}" @endif placeholder="Your name"
                                    required>
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="col-lg-6 col-12 mt-2">
                                <input type="email" name="email" id="donation-email" pattern="[^ @]*@[^ @]*"
                                    class="form-control" @if(Auth::check()) value="{{auth()->user()->email}}" @endif
                                    placeholder="Your email" required>
                            </div>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <input type="hidden" name="project_id" value="{{$event->id}}">
                            <input type="hidden" name="user_id" @if(Auth::check()) value="{{auth()->user()->id}}"
                                @endif>

                            <div class="col-lg-12 col-12">
                                <h5 class="mt-4 pt-1">Choose Payment</h5>
                            </div>

                            <div class="col-lg-12 col-12 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DonationPayment"
                                        id="flexRadioDefault9">
                                    <label class="form-check-label" for="flexRadioDefault9">
                                        <i class="bi-credit-card custom-icon ms-1"></i>
                                        Debit or Credit card
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DonationPayment"
                                        id="flexRadioDefault10">
                                    <label class="form-check-label" for="flexRadioDefault10">
                                        <i class="bi-paypal custom-icon ms-1"></i>
                                        Paypal
                                    </label>
                                </div>

                                <button type="submit" class="form-control mt-4">Submit Donation</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
