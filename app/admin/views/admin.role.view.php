<div class="admin-autos-container">
    <div class="admin-autos">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>

        <nav class="nav flex-column navvvv">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categoryAll" id="all" checked value="all">
                <label class="form-check-label" for="all">
                    Все пользователи
                </label>
            </div>

            <!-- фильтр по пользователям -->
            <?php foreach ($roles as $role) : ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category" id="<?= $role->id ?>" value="<?= $role->id ?>">
                    <label class="form-check-label" for="<?= $role->id ?>">
                        <?= $role->name ?>
                    </label>
                </div>

            <?php endforeach ?>
            <p class="count-products"></p>
        </nav>
    </div>
    <div class="role-container-admin">

    </div>
</div>

<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadAdminUser.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>