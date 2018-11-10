<?php echo Form::open(['url' => route('rooms.update',['id'=> $id]),
 'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']); ?>


<?php echo Form::text('name');; ?>

<?php echo Form::text('roomName');; ?>

<?php echo Form::radio('manager', true);; ?>

<?php echo Form::radio('manager', false);; ?>

<?php echo Form::radio('user', true);; ?>

<?php echo Form::radio('user', false);; ?>



    <input type="hidden" name="_method" value="PUT">

<?php echo Form::submit('Click Me!');; ?>

<?php echo Form::close(); ?>

<?php echo Form::open(['url' => route('rooms.destroy',['id'=> $id]),'method'=>'POST']); ?>

<?php echo e(method_field('DELETE')); ?>

        <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

        <?php echo Form::close(); ?>