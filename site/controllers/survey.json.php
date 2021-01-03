<?php defined('_JEXEC') or die;

/**
 * (Site) Class ProgressToolControllerSurvey
 *
 * Handling JSON responses for AJAX requests client-side
 *
 * @package ProgressTool
 * @subpackage site
 * @since 0.1.7
 *
 * @author  Morgan Nolan <morgan.nolan@hotmail.com>
 * @link    https://github.com/morghayn
 */
class ProgressToolControllerSurvey extends JControllerLegacy
{
    /**
     * Returns JSON response for a survey selection.
     *
     * @since 0.1.7
     */
    public function surveySelect()
    {
        JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));

        $input = JFactory::getApplication()->input;
        $data = $input->get('data', array(), 'ARRAY');
        $projectID = $data['projectID'];
        $choiceID = $data['choiceID'];

        JLoader::register('Auth', JPATH_BASE . '/components/com_progresstool/helpers/Auth.php');
        Auth::authorize($projectID);

        $model = parent::getModel('survey');
        $status = $model->processSelection($projectID, $choiceID);
        echo new JResponseJson($status);
    }
}