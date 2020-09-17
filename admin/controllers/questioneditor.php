<?php defined('_JEXEC') or die;

/**
 * (Admin) Class ProgressToolControllerQuestionEditor
 *
 * Controller for back-end question editor functionality.
 *
 * @package ProgressTool
 * @subpackage admin
 * @since 0.5.0
 *
 * @author  Morgan Nolan <morgan.nolan@hotmail.com>
 * @link    https://github.com/morghayn
 */
class ProgressToolControllerQuestionEditor extends JControllerLegacy
{
    public function updateQuestion()
    {
        //JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $model = $this->getModel('questionEditor');
        $app = JFactory::getApplication();
        $input = $app->input;
        $questionID = $input->getInt('questionID', 0);
        $question = $input->get('question', '', 'string');

        if ($model->updateQuestion($questionID, $question))
        {
            $app->enqueueMessage("Question updated successfully");
        }
        else
        {
            $app->enqueueMessage("Failed to update question");
        }

        $this->setRedirect('index.php?option=com_progresstool&view=questionEditor');
    }

    public function updateQuestionChoices()
    {
        //JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $model = $this->getModel('questionEditor');
        $app = JFactory::getApplication();
        $input = $app->input;
        $choices = $input->get('choices', array(), 'array');

        /*
        if ($model->updateChoices($choices))
        {
            $app->enqueueMessage("success");
        }
        else
        {
            $app->enqueueMessage("failure");
        }
        */

        $test = $model->updateChoices($choices);
        $app->enqueueMessage($test);
        $this->setRedirect('index.php?option=com_progresstool&view=questionEditor');
    }

    public function addChoice()
    {
        $model = $this->getModel('questionEditor');
        $app = JFactory::getApplication();
        $input = $app->input;
        $questionID = $input->getInt('questionID', 0);

        if($model->addNewChoice($questionID))
        {
            $app->enqueueMessage("Choice added");
        }
        else
        {
            $app->enqueueMessage("Failed to add choice");
        }

        $this->setRedirect('index.php?option=com_progresstool&view=questionEditor');
    }

    public function deleteChoice()
    {
        $model = $this->getModel('questionEditor');
        $app = JFactory::getApplication();
        $input = $app->input;
        $choiceID = $input->getInt('choiceID', 0);

        if($model->deleteChoice($choiceID))
        {
            $app->enqueueMessage("Choice deleted");
        }
        else
        {
            $app->enqueueMessage("Failed to delete choice");
        }

        $this->setRedirect('index.php?option=com_progresstool&view=questionEditor');
    }

    public function updateIcon()
    {
        $app = JFactory::getApplication();
        $app->enqueueMessage("updateIcon()");
        $this->setRedirect('index.php?option=com_progresstool&view=questionEditor');
    }

    public function removeIcon()
    {
        $model = $this->getModel('questionEditor');
        $app = JFactory::getApplication();
        $input = $app->input;
        //$questionID = $input->getInt('questionID', 0);

        /**
        if($model->addChoice($questionID))
        {
        $app->enqueueMessage("Choice added");
        }
        else
        {
        $app->enqueueMessage("Failed to add choice");
        }
         */

        $app->enqueueMessage("removeIcon()");
        $this->setRedirect('index.php?option=com_progresstool&view=questionEditor');
    }
}