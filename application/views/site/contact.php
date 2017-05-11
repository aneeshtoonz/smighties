<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="text-center">

                <div class="col-lg-10 nofloats inline text-left contact-wrapper mt-xxxlg">

                    <div class="title">
                        <h1 class="mb-md">Contact Us</h1>
                        <h2 class="visible-lg visible-md">Please get your parent’s permission before submitting your message</h2>
                    </div>

                    <div class="clearfix"></div>

                    <form action="" name="contactfrm" id="contactfrm" method="post">

                        <div class="row">

                            <div class="col-lg-12 mt-lg">

                                <div class="row">

                                  <div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
                                     <input type="text" class="form-control <?php echo (form_error('name')) ? 'form-error' : ''?>" name="name" id="name" placeholder="Your Name"/>
                                     <input type="email" class="form-control <?php echo (form_error('email')) ? 'form-error' : ''?>" name="email" id="email" placeholder="Email Address"/>
                                     <input type="text" class="form-control <?php echo (form_error('subject')) ? 'form-error' : ''?>" name="subject" id="subject" placeholder="Subject"/>
                                  </div>

                                  <div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
                                     <textarea class="form-control <?php echo (form_error('message')) ? 'form-error' : ''?>" name="message" id="message" placeholder="Message"></textarea>
                                  </div>

                                  <div class="col-lg-10 col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="button-bubble">
                                        <span class="left"></span>
                                        <span class="middle">Send Message</span>
                                        <span class="right"></span>
                                    </button>
                                  </div>

                                  <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>
