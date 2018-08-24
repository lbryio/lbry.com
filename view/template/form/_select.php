<select name="<?php echo $name ?>">
  <?php foreach ($choices as $value => $label): ?>
    <option value="<?php echo $value ?>" <?php echo $selected == $value ? 'selected="selected"' : '' ?>>
      <?php echo $label ?>
    </option>
  <?php endforeach ?>
</select>