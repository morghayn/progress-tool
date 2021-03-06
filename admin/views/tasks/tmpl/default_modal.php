<?php defined('_JEXEC') or die; ?>

<div id="adminModal" class="adminModal">
    <div class="amContent">
        <div class="heading">
            <h1>Select choice</h1>
            <span class="amClose">&times;</span>
        </div>
        <div id="amTable">
            <table>
                <thead>
                    <tr style="background-color: #f08080;">
                        <th>ID</th>
                        <th>QuestionID</th>
                        <th>Choice</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->choices as $choice): ?>
                        <?php $addChoiceID = 'a-c-' . $choice->id; ?>
                        <tr id="<?php echo $addChoiceID; ?>">
                            <td><?php echo $choice->id; ?></td>
                            <td><?php echo $choice->question_id; ?></td>
                            <td><?php echo $choice->choice; ?></td>
                            <td><?php echo $choice->weight; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>