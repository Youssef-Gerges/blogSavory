@extends('layouts.public_layout')
@section('content')

                <!-- contact-form -->
                <section class="contact-form">

                    <h1>Contact </h1>
                    <p>
                        Welcome for contact us, if you have any question or want writing us or advertising here. Please kindly contact us by email <strong>info.technext@it</strong> or leave a reply here with form bellow. We will reply to you as soon as possible.
                    </p>
                    <form method="post" action="contact.php">

                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="Full Name">
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" id="email" required="required" placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <input name="website" type="url" class="form-control" id="subject" required="required" placeholder="Your Website">
                                </div>

                            </div>

                            <div class="col-md-8">
                                <textarea name="message" type="text" class="form-control" id="message" rows="8" required="required" placeholder="Type here message"></textarea>
                            </div>
                        </div>

                            <button type="submit" id="submit" name="submit" class="btn btn-contact">send message</button>

                    </form> <!-- form end -->
                </section> <!-- /.contact-form -->


@endsection
