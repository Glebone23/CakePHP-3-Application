
<nav class="categories large-2 medium-3 columns" id="actions-sidebar" style="border-right: 1px solid gray; position: relative;">
    <ul class="cat-side side-nav" style="position: fixed;">
        <li class="heading">Categories</li>
        <?php for($i = 0; $i < count($categories); $i++): ?>
            <a href="#<?= $categories[$i] ?>"><?= $categories[$i] ?></a><br/>
        <?php endfor; ?>
    </ul>
</nav>

<div class="costs form large-9 medium-8 columns content">
    <?php for($i = 0; $i < count($categories); $i++): ?>
        <a id="<?= $categories[$i] ?>"></a>
        <?= '<h2 id="'.$categories[$i].'">'.$categories[$i].'</h2>' ?>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($costs as $cost): ?>
                <?php if($categories[$i] == $cost->category): ?>
                <tr>
                    <td><?= $this->Number->format($cost->id) ?></td>
                    <td><?= h($cost->category) ?></td>
                    <td><?= $this->Number->format($cost->sum) ?></td>
                    <td><?= h($cost->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cost->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cost->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id)]) ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endfor; ?>
</div>
