<?php $attributes = array_merge($attributes ?? [], [
  'name' => $field,
  'id' => "{$field}_field",
  'type' => $type ?? 'text',
  'required' => (bool)($required ?? false),
  'value' => $value ?? null,
]) ?>
<div class="form-row <?php echo ($error ?? null) ? ' error' : '' ?>">
  <?php if ($label ?? null): ?>
    <label for="<?php echo $attributes['id'] ?>"><?php echo $label ?></label>
  <?php endif ?>

  <?php if ($error ?? null): ?>
    <div class="form-error"><?php echo $error ?></div>
  <?php endif ?>

  <?php echo View::renderTag('input', $attributes) ?>

  <?php if ($help ?? null): ?>
    <div class="meta"><?php echo $help ?></div>
  <?php endif ?>
</div>
