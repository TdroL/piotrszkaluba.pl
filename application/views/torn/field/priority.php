<span>
<?php echo Form::radio($name.'-mod', 1, (bool) $_POST[$name.'-mod'], array('id' => $name.'--before')) ?>
<?php echo Form::label($name.'--before', __('Before')) ?>

<?php echo Form::radio($name.'-mod', 0, !$_POST[$name.'-mod'], array('id' => $name.'--after')) ?>
<?php echo Form::label($name.'--after', __('After')) ?>

<?php echo Form::select($name, $options, $value, $attributes + array('id' => $config->prefix.$name)); ?>
</span>