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
     <?php $__env->slot('header', null, []); ?> <h2 class="font-semibold text-xl">Add Submission</h2> <?php $__env->endSlot(); ?>

    <div class="p-6 max-w-xl space-y-4">
        <div class="border rounded p-3 bg-gray-50">
            <p><b>Student:</b> <?php echo e($enrollment->student->name); ?> (<?php echo e($enrollment->student->student_id); ?>)</p>
            <p><b>Subject:</b> <?php echo e($enrollment->subject->name); ?></p>
        </div>

        <form method="POST" action="<?php echo e(route('submissions.store')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="enrollment_id" value="<?php echo e($enrollment->id); ?>">

            <div>
                <label class="block mb-1">Score</label>
                <input type="number" step="0.01" name="score" class="w-full border rounded p-2" required>
                <?php $__errorArgs = ['score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-600 text-sm"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block mb-1">Passed?</label>
                <select name="is_pass" class="w-full border rounded p-2">
                    <option value="">—</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div>
                <label class="block mb-1">Date Submitted</label>
                <input type="date" name="date_submitted" class="w-full border rounded p-2" value="<?php echo e(now()->toDateString()); ?>">
            </div>

            <div class="flex gap-2">
                <button class="bg-green-600 text-white px-4 py-2 rounded">Save Submission</button>
                <a href="<?php echo e(route('enrollment.index')); ?>" class="px-4 py-2 border rounded">Cancel</a>
            </div>
        </form>
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
<?php endif; ?><?php /**PATH C:\Users\Zeinab\Desktop\grading\resources\views/submissions/create.blade.php ENDPATH**/ ?>