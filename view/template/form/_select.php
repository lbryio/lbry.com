<fieldset-section>
  <label for="<?php echo $name ?>"><?php echo $label ?></label>

  <select name="<?php echo $name ?>">
    <?php foreach ($choices as $value => $option): ?>
    <option value="<?php echo $value ?>" <?php echo $selected == $value ? 'selected="selected"' : '' ?>>
      <?php echo $option ?>
    </option>
    <?php endforeach ?>
  </select>
</fieldset-section>
