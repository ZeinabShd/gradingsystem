<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl">Enrollments</h2>
     <?php $__env->endSlot(); ?>

    <div class="p-6">
         <a href="<?php echo e(route('enrollment.create')); ?>" class="inline-block mb-4 bg-blue-600 text-white px-3 py-2 rounded">New Enrollment</a>
           
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Student ID</th>
                    <th class="p-2 border">Student</th>
                    <th class="p-2 border">Subject</th>
                    <th class="p-2 border">Progress</th>
                    <th class="p-2 border">Notes</th>
                    <th class="p-2 border">Last Score</th>
                    <th class="p-2 border">Last Date</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="p-2 border"><?php echo e($r->student_code); ?></td>
                        <td class="p-2 border"><?php echo e($r->student_name); ?></td>
                        <td class="p-2 border"><?php echo e($r->subject_name); ?></td>
                        <td class="p-2 border"><?php echo e($r->progress); ?></td>
                        <td class="p-2 border"><?php echo e($r->notes); ?></td>
                        <td class="p-2 border"><?php echo e($r->last_score ?? '—'); ?></td>
                        <td class="p-2 border"><?php echo e($r->last_date ?? '—'); ?></td>
                        <td class="p-2 border">
                        <a href="<?php echo e(route('submissions.create', ['enrollment' => $r->enrollment_id])); ?>"
       class="text-sm bg-green-600 text-white px-2 py-1 rounded">Add submission</a>
    </td>                
    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="p-4 text-center">No enrollments yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Zeinab\Desktop\grading\resources\views/enrollment/index.blade.php ENDPATH**/ ?>