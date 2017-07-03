<!--div class="ct-modal">
<div class="modal fade" id="modal-contact">
  <div class="modal-dialog">
    <div class="modal-content">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <div class="modal-header text-center text-light"><h1><?php _e( 'Contact Us', 'citytrack')?></h1></div>

      <div class="modal-body">
        <form id="contactform" method="POST" role="form">
          <div class="form-group">
            <label for="user-name" class="text-blue"><?php echo __("Name", "citytrack"); ?></label>
            <input type="text" class="form-control no-empty" id="user-name" name="user-name" placeholder="<?php echo __("Enter your name", "citytrack"); ?>">
          </div>

           <div class="form-group">
            <label for="user-email" class="text-blue"><?php echo __("E-mail", "citytrack"); ?></label>
            <input type="email" class="form-control no-empty" id="user-email" name="user-email" placeholder="<?php echo __("Enter your e-mail", "citytrack"); ?>">
          </div>

          <div class="form-group">
            <label for=subject" class="text-blue"><?php echo __("Subject", "citytrack"); ?></label>
            <input type="text" class="form-control no-empty" id="subject" name="subject" placeholder="<?php echo __("Enter subject", "citytrack"); ?>">
          </div>

          <div class="form-group">
            <label for="message" class="text-blue"><?php echo __("Message", "citytrack"); ?></label>
            <textarea id="message" name="message" class="form-control no-empty" rows="3"></textarea>
          </div>
          <div class="form-group">
            <input id="locale" class="hidden" type="text" name="locale" value="<?php echo get_locale(); ?>">
          </div>
          <div class="btnwrap text-right"> 
            <button id="contantform-send" type="submit" class="btn btn-blue sendbtn"><?php echo __("Send", "citytrack"); ?></button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal-attend">
  <div class="modal-dialog">
    <div class="modal-content">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <div class="modal-header text-center text-light"><h1></h1></div>

      <div class="modal-body">
        <p id="event-desc" class="text-light text-center"></p>
        <form id="attendform" method="" role="form">
          <div class="form-group">
            <label for="user-name" class="text-blue"><?php echo __("Name", "citytrack"); ?></label>
            <input type="text" class="form-control no-empty" id="user-name" name="user-name" placeholder="<?php echo __("Enter your name", "citytrack"); ?>">
          </div>

           <div class="form-group">
            <label for="user-email" class="text-blue"><?php echo __("E-mail", "citytrack"); ?></label>
            <input type="email" class="form-control no-empty" id="user-email" name="user-email" placeholder="<?php echo __("Enter your e-mail", "citytrack"); ?>"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
          </div>
          <div class="form-group">
            <input id="event-name" class="hidden" type="text" name="event-name">
            <input id="event-date" class="hidden" type="text" name="event-date">
            <input id="event-time" class="hidden" type="text" name="event-time">
            <input id="locale" class="hidden" type="text" name="locale" value="<?php echo get_locale(); ?>">
          </div>
          <div class="btnwrap text-right"> 
            <button id="attendform-send" type="submit" class="btn btn-blue sendbtn"><?php echo __("Attend", "citytrack"); ?></button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<div id="error-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <div class="modal-header text-center text-light"><h1><?php echo __("Sorry!", "citytrack"); ?></h1></div>
          <div class="modal-body text-center">
            <?php echo __("Something went wrong!", "citytrack"); ?>
          </div>
        </div>
    </div>
</div-->

<div id="error-reg-modal" class="reveal fade" data-reveal>
  <h2 class="text-center">Something went wrong!</h2>
  <h4 class="text-center">Please try again later.</h4>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div id="thanks-modal" class="reveal fade" data-reveal>
  <h2 class="text-center">Thank you!</h2>
  <h4 class="text-center">We received your registration.</h4>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="reveal" id="regModal" data-reveal>
      <h2 class="text-center">Registration</h2>
      <p class="lead">Selected courses:</p>
      <div id="selectedCourseList">
        
      </div>
      <form id="registrationForm" method="POST" role="form">
        <div class="row">
          <div class="medium-6 columns">
            <label>Name
              <input type="text" name="userName" placeholder="">
            </label>
          </div>
          <div class="medium-6 columns">
            <label>Company
              <input type="text" name="userCompany" placeholder="">
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-6 columns">
            <label>Phone
              <input type="text" name="userPhone" placeholder="">
            </label>
          </div>
          <div class="medium-6 columns">
            <label>E-mail
              <input type="text" name="userMail" placeholder="">
            </label>
          </div>
        </div>
        <div class="row">
          <div class="small-12 columns">
            <label>
              Do you have any question?
              <textarea rows="5" name="userComment"></textarea>
            </label>
          </div>
        </div>
        <div class="row text-right">
          <div class="small-12 columns">
            <button type="submit" class="button" id="registerSendButton">Send</button> 
          </div>
        </div>
      </form>

      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>

</div>