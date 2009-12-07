<?
$providers = array(
  array(
    "name"    => "T-Mobile",
    "value"   => "@tmomail.net"
  ),
  array(
    "name"    => "Virgin Mobile",
    "value"   => "@vmobl.com"
  ),
  array(
    "name"    => "AT&amp;T / Cingular",
    "value"   => "@cingularme.com"
  ),
  array(
    "name"    => "Sprint",
    "value"   => "@messaging.sprintpcs.com"
  ),
  array(
    "name"    => "Verizon",
    "value"   => "@vtext.com"
  ),
  array(
    "name"    => "Nextel",
    "value"   => "@messaging.nextel.com"
  )
);
?>

<div class="wrap">
  <h2>SMS Comments</h2>
  <p>Just enter your phone number and select the proper service provider to begin receiving comments via SMS Messaging.</p>

  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Phone Number</th>
        <td><input type="text" name="sms_phone" value="<?php echo get_option('sms_phone'); ?>"/></td>
      </tr>
      <tr>
        <th scope="row">Provider</th>
        <td>
          <select name="sms_provider" id="provider">
            <?php foreach ($providers as $provider): ?>
              <option value="<?=$provider['value']?>" <? print (get_option('sms_provider') == $provider['value']) ? " selected=\"selected\"" : ""; ?>><?=$provider['name']?></option>
            <?php endforeach ?>
          </select>
        </td>
      </tr>
    </table>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="sms_phone,sms_provider" />

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Submit') ?>" />
    </p>

  </form>
</div>
