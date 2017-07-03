<?php 
/*Template Name: registration*/


get_header(); 
$ctr = 0;
?>

    <div class="row text-center">
      <div class="large-6 medium-8 large-centered medium-centered columns">
        <h1 class="title-box"><strong class="logo"><span>Kampus</span>kamari</strong></h1>
      </div>
    </div>

    <div class="row text-center paddingb-50">
      <div class="medium-8 small-8 medium-centered small-centered columns ">
        <h4 class="paddingb-50">
          Tällä sivulla voit selata Kampuskamari-yhteistyöhön kuuluvia kursseja ja ilmoittautua niille. Voit osallistua enintään 5 kurssille. 
        </h4>
        <h5>
          <strong>Kampuskamarin yhteistyömuotoja on 3 erilaista</strong>
        </h5>
        <div class="text-left">
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/form_Harjoitustyöt.png" class="float-left margin-10"><p><strong>Harjoitustyöt:</strong> Opiskelijaryhmä tulee toteuttamaan yritykseenne harjoitustyön opintojakson teemaan liittyen.</p>
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/form_Yritysvierailut.png" class="float-left margin-10"><p><strong>Yritysvierailut:</strong> Opintojaksolle toivotaan edustajia yrityksistä kertomaan vapaamuotoisesti opintojakson teemasta tai  opiskelijat tulevat vierailemaan yritykseenne.</p>
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/form_Valiokuntayhteistyö.png" class="float-left margin-10"><p><strong>Valiokuntayhteistyö:</strong> Jotkut opintojaksot ovat avoimia Tampereen kauppakamarin valiokuntien jäsenille, jolloin he voivat osallistua   mukaan opintojaksojen luennoille oman aikataulunsa puitteissa.</p>
        </div>
      </div>
    </div>

    <div class="row text-center">
      <div class="medium-6 medium-centered">
        <h2>Available courses:</h2>
      </div>
    </div>

    <?php
        if ( have_rows('kampuskamari_courses','option') ):
            while ( have_rows('kampuskamari_courses','option') ) : 
                the_row();
    ?> 

      <div id="course-list">
        <div class="row">
          <div class="medium-12 medium-centered">
            <ul class="accordion" data-accordion data-accordion data-allow-all-closed="true" data-multi-expand="true">
              <li class="accordion-item" data-accordion-item data-course-name="<?php the_sub_field('course_name') ?>">
                <!-- Accordion tab title -->
                <a href="#" class="accordion-title"><?php the_sub_field('course_name') ?></a>

                <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                <div class="accordion-content" data-tab-content>
                  <div class="row">
                    <div class="medium-9 columns main-info">
                        <strong>Description of collaboration</strong>
                        <p><?php the_sub_field('description_of_collaboration') ?></p>
                        <strong>Expectations</strong>
                        <p><?php the_sub_field('expectation') ?></p>
                        <strong>Description of course content</strong>
                        <p><?php the_sub_field('description_of_course_content') ?></p>
                    </div>
                    <div class="medium-3 columns misc-info">
                      <div>
                        <strong>Period</strong>
                        <div class="info">
                          <p>
                            <?php 
                              $periods = get_sub_field('period');
                              foreach( $periods as $period ): ?>
                                <span><?php echo $period ?></span>
                            <?php endforeach; ?>
                          </p>
                          <p class="paddingt-10"><?php the_sub_field('interval') ?></p>
                        </div>
                      </div>
                      <div>
                        <strong>Forms of collaboration</strong>
                        <div class="info">
                          <p>
                            <?php

                              // vars 
                              $forms = get_sub_field('forms_of_collaboration');


                              // check
                              if( $forms ): ?>
                                <?php foreach( $forms as $form ): ?>
                                  <img data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" title="<?php echo $form; ?>" id="icon-<?php echo $form; ?>" src="<?php echo get_template_directory_uri()?>/assets/etc/img/form_<?php echo $form; ?>.png">
                                <?php endforeach; ?>
                          </p>
                        </div>
                      </div>

                      <div>
                        <strong>Select for registration</strong>
                          <div class="info">
                            <?php /*if( $forms ): */?>
                              <?php foreach( $forms as $form ): ?>
                                <div class="reg-box">
                                  <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/form_<?php echo $form; ?>.png">
                                  <div class="switch tiny">
                                    <input class="switch-input register-switch" id="switch_<?php echo $ctr; ?>" data-form="<?php echo $form; ?>" type="checkbox" name="exampleSwitch">
                                    <label class="switch-paddle" for="switch_<?php echo $ctr; ?>">
                                      <span class="show-for-sr">register</span>
                                    </label>
                                  </div>
                                </div>
                                
                              <?php $ctr = $ctr + 1; endforeach; ?>
                            <?php endif; ?>                     
                          </div>
                      </div>

                      <div>
                        <strong>Responsible person</strong>
                        <div class="info">
                          <p><?php the_sub_field('responsible_person') ?></p>
                          <p><?php the_sub_field('responsible_person_mail') ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    <?php
            endwhile;
        endif;
    ?>

    <div class="row">
      <div class="small-12 small-center columns text-center">
        <button type="button" class="button" id="registerButton">Register for selected courses</button>
      </div>
    </div>
    <div class="row">
      <div class="medium-6 medium-offset-3 columns text-center">
        <div id="register-warning" class="alert warning hidden">
          <!--span class="closebtn">&times;</span--> 
          <div></div>
        </div>
      </div>
    </div>
</div>  

<?php include 'inc/modals.php';?>
<?php get_footer(); ?>