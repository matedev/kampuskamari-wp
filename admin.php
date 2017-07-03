<?php
/*Template Name: admin*/

  get_header();
    $sql = "SELECT * FROM registrations ORDER BY user_name ASC";
    global $wpdb;
    $results = $wpdb->get_results($sql, OBJECT );
?>

<h1 class="text-center">Registered companies</h1>
<div class="row">
  <div class="medium-12 columns">
    <div id="registrations">
      <div class="table-responsive">     
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>E-mail</th>
              <th>Phone</th>
              <th>Company</th>
              <th>Course</th>
              <th>Collaboration</th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($results as &$item) {
            echo('<tr data-userid="'.$item->id.'">');
            echo('<td>'.$item->user_name.'</td>');
            echo('<td>'.$item->user_mail.'</td>');
            echo('<td>'.$item->user_phone.'</td>');
            echo('<td>'.$item->user_company.'</td>');
            echo('<td>'.$item->registered_course.'</td>');
            echo('<td>'.$item->collaboration.'</td>');
            echo('<td>'.$item->user_comment.'</td>');
          
            /*if($item->discussion_group>0){
              echo('<td><label><input type="checkbox" id="reg-user-group" checked></label></td>');
            }else{
              echo('<td><label><input type="checkbox" id="reg-user-group"></label></td>');
            }*/
            echo('</tr>');
          } ?>
          </tbody>
        </table>
      </div>

  </div>
</div>

</body>
</html>