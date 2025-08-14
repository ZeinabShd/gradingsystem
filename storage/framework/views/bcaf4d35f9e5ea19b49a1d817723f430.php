
    <form action="<?php echo e(url('op/calculate')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="number1">Number 1:</label>
        <input type="number" name="number1" id="number1" step="any" required>
        <br>
        <label for="number2">Number 2:</label>
        <input type="number" name="number2" id="number2" step="any" required>
        <br>
        <button type="submit" name="operation" value="sum">Calculate Sum</button>
        <button type="submit" name="operation" value="sub">Calculate Subtraction</button>
    </form>

   
    <?php if(isset($result)): ?>
    <h1>The result is: <?php echo e($result); ?></h1>
<?php endif; ?><?php /**PATH C:\Users\Zeinab\Desktop\grading\resources\views/operation.blade.php ENDPATH**/ ?>