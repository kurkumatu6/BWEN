<div class="Admin-container">
    <div>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>
        <nav class="nav flex-column navvvv">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categoryAll" id="all" checked value="all">
                <label class="form-check-label" for="all">
                    Все товары
                </label>
            </div>

            <!-- фильтр по брендам -->
            <?php foreach ($brands as $brand) : ?>
                <div class="form-check aaa">
                    <input class="form-check-input" type="checkbox" name="category" id="<?= $brand->id ?>" value="<?= $brand->id ?>">
                    <label class="form-check-label" for="<?= $brand->id ?>">
                        <?= $brand->name ?>
                    </label>
                </div>

            <?php endforeach ?>
            <p class="count-products"></p>
        </nav>
        <button class="button" style="width: 100px;" for="image"><a href="/app/admin/tables/admin.add.models.php" style="color: black; text-decoration: none;">Добавить</a></button>
    </div>

    <div class="model-container-admin">

    </div>
</div>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadAdminModel.js"></script>
<script src="/assets/js/loadModel.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>