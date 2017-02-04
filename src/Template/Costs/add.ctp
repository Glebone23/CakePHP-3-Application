<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="categories large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Costs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="costs form large-9 medium-8 columns content">
    <?= $this->Form->create($cost) ?>
    <fieldset>
        <legend><?= __('Add Cost') ?></legend>

        <label><b>Categories <b style="color:darkred">*</b></b>
            <select name="category" id="category">
                <?php
                for($i = 0; $i < count($categories); $i++) {
                    echo '<option value="'.$categories[$i].'">'.$categories[$i].'</option>';
                }
                ?>
            </select>
        </label>
        <?= $this->Form->input('sum'); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
