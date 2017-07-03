<?php 
/*Template Name: kampuskamari*/


get_header(); 

?>

<div class="row text-center">
      <div class="large-6 medium-8 large-centered medium-centered columns">
        <h1 class="title-box">Welcome to <strong class="logo"><span>Kampus</span>kamari</strong></h1>
      </div>
    </div>

    <div class="row text-center paddingb-50">
      <div class="medium-6 small-8 medium-centered small-centered columns">
        <p>
          Kampuskamari on uusi tapa tehdä yhteistyötä paikallisen elinkeinoelämän ja Tampere3-yliopistojen kanssa. Se yhdistää Tampereen kauppakamarin jäsenyritykset ja tamperelaisten korkeakoulujen laaja-alaisesti liiketoimintaan liittyvät opintojaksot
        </p>
      </div>
    </div>

    <div class="row text-center">
      <div class="medium-6 medium-centered">
        <h2>Kampuskamarin tavoitteet:</h2>
      </div>
    </div>

    <div id="content">
      <div class="row">
        <div class="small-12 medium-6 columns content-box text-center">
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/collaboration-circle.png" class="img-circle">
          <h3>Collaboration</h3>
          <p class="small-10 medium-6 small-centered medium-centered">kehittää ja vakiinnuttaa uusi tapa toimia tamperelaisten yliopistojen ja Tampereen kauppakamarin välillä</p>
        </div>
        <div class="small-12 medium-6 columns content-box text-center" class="img-circle">
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/perpectives-circle2.png" class="img-circle">
          <h3>Perspectives</h3>
          <p class="small-10 medium-6 small-centered medium-centered">tarjota Tampereen kauppakamarin jäsenyrityksille paikallisten opiskelijoiden konkreettisia ja soveltamiskelpoisia näkökulmia liiketoiminnan kehittämiseksi</p>
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-6 columns text-center content-box">
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/support-circle.png" class="img-circle">
          <h3>Support</h3>
          <p class="small-10 medium-6 small-centered medium-centered">parantaa korkeakouluopiskelijoiden työelämävalmiuksia</p>        
        </div>
        <div class="small-12 medium-6 columns text-center content-box">
          <img src="<?php echo get_template_directory_uri()?>/assets/etc/img/networking-circle.png" class="img-circle">
          <h3>Networking</h3>
          <p class="small-10 medium-6 small-centered medium-centered">tukea opiskelijoiden verkottumista ja sijoittumista paikalliseen elinkeino- ja työelämää</p>        
        </div>            
      </div>
    </div>

</div>  

<?php get_footer(); ?>