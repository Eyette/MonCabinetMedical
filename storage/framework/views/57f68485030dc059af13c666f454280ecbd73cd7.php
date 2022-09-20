<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.View Prescription')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger">
         <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
      </div>
      <?php endif; ?>
      <?php if(session('success')): ?>
      <div class="alert alert-success">
         <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>
   </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="<?php echo e(url('prescription/pdf/'.$prescription->id)); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
          </div>
<div class="row justify-content-center">
   <div class="col-10">
      <div class="card shadow mb-4">
         <div class="card-body">
            <!-- ROW : Doctor informations -->
            <div class="row">
               <div class="col">
                  <?php echo clean(App\Setting::get_option('header_left')); ?>

               </div>
               <div class="col-md-3">
                  <p>Alger, <?php echo e(__('sentence.On')); ?> <?php echo e($prescription->created_at->format('d-m-Y')); ?></p>
               </div>
            </div>
            <!-- END ROW : Doctor informations -->
            <!-- ROW : Patient informations -->
            <div class="row">
               <div class="col">
                  <hr>
                  <p>
                     <b><?php echo e(__('sentence.Patient Name')); ?> :</b> <?php echo e($prescription->User->name); ?>

                     <?php if(isset($prescription->User->Patient->birthday)): ?>
                     - <b><?php echo e(__('sentence.Age')); ?> :</b> <?php echo e($prescription->User->Patient->birthday); ?> (<?php echo e(\Carbon\Carbon::parse($prescription->User->Patient->birthday)->age); ?> Years)
                     <?php endif; ?>
                     <?php if(isset($prescription->User->Patient->gender)): ?>
                     - <b><?php echo e(__('sentence.Gender')); ?> :</b> <?php echo e(__('sentence.'.$prescription->User->Patient->gender)); ?>

                     <?php endif; ?>
                     <?php if(isset($prescription->User->Patient->weight)): ?>
                     - <b><?php echo e(__('sentence.Patient Weight')); ?> :</b> <?php echo e($prescription->User->Patient->weight); ?> Kg
                     <?php endif; ?>
                     <?php if(isset($prescription->User->Patient->height)): ?>
                     - <b><?php echo e(__('sentence.Patient Height')); ?> :</b> <?php echo e($prescription->User->Patient->height); ?>

                     <?php endif; ?>
                  </p>
                  <hr>
               </div>
            </div>
            <!-- END ROW : Patient informations -->
            <?php if(count($prescription_drugs) > 0): ?>
            <!-- ROW : Drugs List -->
            <div class="row justify-content-center">
               <div class="col">
                  <?php $__currentLoopData = $prescription_drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($drug->type); ?> - <?php echo e($drug->Drug->trade_name); ?> <?php echo e($drug->strength); ?> - <?php echo e($drug->dose); ?> - <?php echo e($drug->duration); ?> <br> <?php echo e($drug->drug_advice); ?></li>
                     <?php if($loop->last): ?>
                        <div style="margin-bottom: 150px;"></div>
                        <hr>
                      <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
               </div>
            </div>
            <?php endif; ?>
            <?php if(count($prescription_tests) > 0): ?>
            <!-- ROW : Tests List -->
            <div class="row justify-content-center">
               <div class="col">
                  <strong><u><?php echo e(__('sentence.Test to do')); ?> </u></strong><br><br>
                  <?php $__currentLoopData = $prescription_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($test->Test->test_name); ?> <?php if(empty(!$test->description)): ?> - <?php echo e($test->description); ?> <?php endif; ?></li>
                     <?php if($loop->last): ?>
                        <div style="margin-bottom: 150px;"></div>
                        <hr>
                      <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <hr>
               </div>
            </div>
            <!-- END ROW : Tests List -->
            <?php endif; ?>
            <!-- ROW : Footer informations -->
            <div class="row">
               <div class="col">
                  <p class="font-size-12"><?php echo clean(App\Setting::get_option('footer_left')); ?></p>
               </div>
               <div class="col">
                  <p class="float-right font-size-12"><?php echo clean(App\Setting::get_option('footer_right')); ?></p>
               </div>
            </div>
            <!-- END ROW : Footer informations -->
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<style type="text/css">
   p, u, li {
      color: #444444 !important; 
   }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctorino\v2\resources\views/prescription/view.blade.php ENDPATH**/ ?>