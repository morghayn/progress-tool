<?php defined('_JEXEC') or die;

/**
 * (Site) Class ProgressToolViewProjectBoard
 *
 * View for front-end project board functionality.
 *
 * @package ProgressTool
 * @subpackage site
 * @since 0.5.5
 *
 * @author  Morgan Nolan <morgan.nolan@hotmail.com>
 * @link    https://github.com/morghayn
 */
class ProgressToolViewProjectBoard extends JViewLegacy
{
    /**
     * @var object list comprising of data pertaining to the project.
     * @var int position of the project on the project board.
     * @var object list of all inactive projects linked to a user.
     * @var object list of all approval questions.
     * @since 0.5.0
     */
    protected $project, $count, $selections, $approvalQuestions;

    /**
     * Renders an inactive or active project depending on it's activation status.
     *
     * @param null $tpl
     * @return mixed|void
     * @since 0.5.5
     */
    function display($tpl = null)
    {
        $input = JFactory::getApplication()->input;
        $projectID = $input->getInt('projectID', 0);
        $this->count = $input->getInt('count', 0);

        JLoader::register('Auth', JPATH_BASE . '/components/com_progresstool/helpers/Auth.php');
        Auth::authorize($projectID);

        $model = parent::getModel('projectboard');
        $this->project = $model->getProject($projectID);

        if ($this->project->activated == 1)
        {
            parent::display('active');
        }
        else
        {
            $this->selections = $model->getSelections(JFactory::getUser()->id);
            $this->approvalQuestions = $model->getApprovalQuestions();
            parent::display('inactive');
        }
    }
}