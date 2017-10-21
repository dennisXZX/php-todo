<?php require('partials/head.php'); ?>

    <h1>Current Todo List</h1>

    <ul>
        <?php foreach($tasks as $task) : ?>
            <li>
                <?php if ($task->isCompleted()) : ?>
                    <span class="strike"><?= $task->getDescription(); ?></span>
                <?php else : ?>
                    <?= $task->getDescription(); ?>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>

    <h1>Add Todo</h1>

    <form method="POST" action="/todos">
        <input name="description" type="text" />
        <button type="submit">Submit</button>
    </form>

<?php require('partials/footer.php'); ?>