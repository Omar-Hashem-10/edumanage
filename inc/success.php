<?php if(isset($_SESSION["success"])): ?>
                    <div class="alert alert-success text-center">
                        <?= $_SESSION["success"] ?>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION["success"]); ?>

                <style>
    .alert {
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
        font-family: 'Arial', sans-serif;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
</style>
