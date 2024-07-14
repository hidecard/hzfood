<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-danger" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                        <a class="nav-link text-light" href="<?php echo e(route('admin')); ?>">Admin Account</a>
                        <a class="nav-link text-light" href="<?php echo e(route('admin_user')); ?>">Customer Account</a>
                        <hr>
                        <a class="nav-link text-light" href="<?php echo e(route('admin_category')); ?>">Category</a>
                        <a class="nav-link text-light" href="<?php echo e(route('admin_item')); ?>">Item</a>
                        <a class="nav-link text-light" href="<?php echo e(route('item_list')); ?>">Item List</a>
                        <a class="nav-link text-light" href="<?php echo e(route('order_list')); ?>">Order List</a>
                        <a class="nav-link text-light" href="<?php echo e(route('sales.report')); ?>">Sales Report</a>
                        <a class="nav-link text-light" href="<?php echo e(route('message_list')); ?>">Message List</a>

            </div>
        </div>
        <div class="sb-sidenav-footer text-light">
            <div class="small text-light">Logged in as:</div>
            Admin : Hz Food
        </div>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\hz_food_shop\resources\views/admin/part/side_nav.blade.php ENDPATH**/ ?>