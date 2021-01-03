<?php defined('_JEXEC') or die;

/**
 * (Site) Class ProgressToolControllerTimelineRedirect
 *
 * Handles routing for timeline redirection
 *
 * @package ProgressTool
 * @subpackage admin
 * @since 0.5.0
 *
 * @author  Morgan Nolan <morgan.nolan@hotmail.com>
 * @link    https://github.com/morghayn
 */
class ProgressToolControllerTimelineRedirect extends JControllerLegacy
{
    public function redirect($key = null, $urlVar = null)
    {
        JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));

        $model = $this->getModel('timelineredirect');
        $input = JFactory::getApplication()->input;

        $categoryID = $input->getInt('categoryID', 0);
        $countryID = $input->getInt('countryID', 0);
        $projectID = $input->getInt('projectID', 0);

        JLoader::register('Auth', JPATH_BASE . '/components/com_progresstool/helpers/Auth.php');
        Auth::authorize($projectID);

        $categoryGroups = $model->getCategoryGroups($countryID, $projectID);
        $redirects = $model->getRedirects($categoryGroups);

        if (!empty($redirects[$categoryID]['redirect']))
        {
            JFactory::getApplication()->redirect($redirects[$categoryID]['redirect']);
        }
        else
        {
            JFactory::getApplication()->enqueueMessage('You currently are not on the timeline for this section.', 'error');
        }
    }
}