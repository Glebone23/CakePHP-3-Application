<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cost'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="costs index large-9 medium-8 columns content">
    <?php for($i = 0; $i < count($dates); $i++): ?>
        <?= '<h2>'.$dates[$i].'</h2>' ?>
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
        <?php if($dates[$i] == date_create($cost->created)->Format('Y-m-d')): ?>
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