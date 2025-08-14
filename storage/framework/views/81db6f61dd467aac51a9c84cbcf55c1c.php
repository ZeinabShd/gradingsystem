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
        <h2 class="font-semibold text-xl">Gradebook</h2>
     <?php $__env->endSlot(); ?>

    <div class="p-6 overflow-auto">
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border text-left">Student ID</th>
                    <th class="p-2 border text-left">Student</th>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="p-2 border text-center"><?php echo e($sub->name); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th class="p-2 border text-center">+ Subject</th>
                </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="p-2 border"><?php echo e($s->student_id); ?></td>
                    <td class="p-2 border"><?php echo e($s->name); ?></td>

                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $cell = $matrix[$s->id][$sub->id] ?? null;
                        ?>

                        <td class="p-2 border text-center">
                            <?php if($cell && $cell['eid']): ?>
                                
                                <div><?php echo e($cell['score'] !== null ? number_format($cell['score'], 2) : '—'); ?></div>
                                <a href="<?php echo e(route('submissions.create', ['enrollment' => $cell['eid']])); ?>"
                                   class="mt-1 inline-block text-xs bg-green-600 text-white px-2 py-1 rounded">
                                   Add mark
                                </a>
                            <?php else: ?>
                                
                                <a href="<?php echo e(route('enrollment.create', ['student' => $s->id, 'subject' => $sub->id])); ?>"
                                   class="inline-block text-xs bg-blue-600 text-white px-2 py-1 rounded">
                                   Enroll
                                </a>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <td class="p-2 border text-center">
                        
                        <a href="<?php echo e(route('enrollment.create', ['student' => $s->id])); ?>"
                           class="inline-block text-xs bg-indigo-600 text-white px-2 py-1 rounded">
                           Add Subject
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?><?php /**PATH C:\Users\Zeinab\Desktop\grading\resources\views/gradebook/index.blade.php ENDPATH**/ ?>