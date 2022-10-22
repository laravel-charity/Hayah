@extends('layouts.master')

@section('content')

<section class="volunteer-section section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h2 class="text-white mb-4">Volunteer</h2>


                <form class="custom-form volunteer-form mb-5 mb-lg-0" action="/volunteers" method="post" role="form">
                    @csrf
                    <h3 class="mb-4">Become a volunteer today</h3>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <input type="text" name="city" id="volunteer-name" class="form-control"
                                placeholder="city" required>


                        </div>


                        <div class="col-lg-6 col-12">
                            <input type="text" name="phone" id="volunteer-subject"
                                class="form-control" placeholder="phone" required>
                        </div>


                    </div>

                    <textarea name="description" rows="3" class="form-control" id="volunteer-message"
                        placeholder="Comment (Optional)"></textarea>

                    <button type="submit" class="form-control">Submit</button>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <img src="{{ asset('images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg') }}"
                    class="volunteer-image img-fluid" alt="">

                <div class="custom-block-body text-center">
                    <h4 class="text-white mt-lg-3 mb-lg-3">About Volunteering</h4>

                    <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm
                        tokito Professional charity theme based</p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
