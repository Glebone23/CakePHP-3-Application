<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Costs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="costs form large-9 medium-8 columns content">
    <?= $this->Form->create($cost) ?>
    <fieldset>
        <legend><?= __('Edit Cost') ?></legend>
        <?php
            echo $this->Form->input('category');
            echo $this->Form->input('sum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
